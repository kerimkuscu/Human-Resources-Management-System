<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <form autocomplete="off" @submit.prevent="submit">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Leave Type Form
            </h5>

            <button type="button" class="close" aria-label="Close" @click="cancelForm">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div>
              <div v-if="loading" class="loading">
                {{ $t('genaral.loading') }}
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="leave-type">Leave Type</label>
                <div class="col-7">
                  <input id="leave-type" v-model="form.leave_type" class="form-control" :class="{'is-invalid': form.errors.has('leave_type')}" type="text" placeholder="Leave Type">
                  <span class="invalid-feedback">{{ form.errors.first('leave_type') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="leaves-per-day">Leaves Per Day <i class="fas fa-question-circle" data-tooltip="true" title="This is the number of leave days that can be applied by an employee per year (or the current leave period). If the leave period is less than a Year this is the number of leaves for the leave period." /></label>
                <div class="col-7">
                  <input id="leaves-per-day" v-model="form.leaves_per_day" class="form-control" :class="{'is-invalid': form.errors.has('leaves_per_day')}" type="number" min="0">
                  <span class="invalid-feedback">{{ form.errors.first('leaves_per_day') }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="float-right">
              <button type="submit" class="btn btn-outline-secondary" @click="cancelForm">
                <i class="fas fa-times" /> {{ $t('general.cancel') }}
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save" /> {{ $t('general.save') }}
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
    import Form from 'form-backend-validation';

    export default {

        data: () => ({
            loading: false,
            editingId: false,

            form: new Form({
                leave_type: null,
                leaves_per_day: 0,

            })
        }),

        mounted() {
            if (this.$route.params.id) {
                this.editingId = this.$route.params.id;

                this.fetch(this.editingId);
            }
        },

        methods: {
            async fetch(id) {
                const response = await this.$http.get('/api/users/leave-type/' + id);

                this.form.populate(response.data.data);
            },

            async submit() {

                this.editingId
                    ? await this.form.put('/api/users/leave-type/' + this.editingId)
                    : await this.form.post('/api/users/leave-type');

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/leaves/types');
            },

            reloadForm() {
                this.$router.go('/leaves/types');
            }
        }
    }
</script>
