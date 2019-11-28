<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <form autocomplete="off" @submit.prevent="submit">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Employee Leave Form
            </h5>

            <button type="button" class="close" aria-label="Close" @click="cancelForm">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div>
              <div v-if="loading" class="loading">
                Loading...
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label required" for="type">Type</label>
                <div class="col-9">
                  <select id="type" v-model="form.leave_type_id" class="form-control" :class="{'is-invalid' : form.errors.has('leave_type_id')}">
                    <option value="null">
                      (Choose)
                    </option>
                    <option v-for="option in leave_type_options" :key="option.text" :value="option.id">
                      {{ option.leave_type }}
                    </option>
                  </select>

                  <span class="invalid-feedback">{{ form.errors.first('leave_type_id') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label for="start-date" class="col-3 col-form-label required">Start Date</label>
                <div class="col-9">
                  <input id="start-date" v-model="form.started_at" class="form-control" :class="{'is-invalid': form.errors.has('started_at')}" type="date">
                  <span class="invalid-feedback">{{ form.errors.first('started_at') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label for="end-date" class="col-3 col-form-label required">End Date</label>
                <div class="col-9">
                  <input id="end-date" v-model="form.ended_at" class="form-control" :class="{'is-invalid' : form.errors.has('ended_at')}" type="date">
                  <span class="invalid-feedback">{{ form.errors.first('ended_at') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label required" for="description">Description</label>
                <div class="col-9">
                  <textarea id="description" v-model="form.description" class="form-control" :class="{'is-invalid' : form.errors.has('description')}" rows="3" placeholder="Description" />
                  <span class="invalid-feedback">{{ form.errors.first('description') }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="float-right">
              <button type="submit" class="btn btn-outline-secondary" @click="cancelForm">
                <i class="fas fa-times" /> Cancel
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save" /> Save
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
            leave_type_options: [],

            loading: false,
            editingId: false,

            form: new Form({
                leave_type_id: null,
                started_at: new Date().toISOString().slice(0, 10),
                ended_at: new Date(new Date().setDate(new Date().getDate() + 2)).toISOString().slice(0, 10),
                description: '',
            })
        }),

        mounted() {
            if (this.$route.params.id) {
                this.editingId = this.$route.params.id;

                this.fetch(this.editingId);
            }

            this.leaveType();
        },

        methods: {
            async fetch(id) {
                const response = await this.$http.get('/api/users/leaves/' + id);

                this.form.populate(response.data.data);
            },

            async submit() {

                this.editingId
                    ? await this.form.put('/api/users/leaves/' + this.editingId)
                    : await this.form.post('/api/users/leaves');

                this.cancelForm();

                this.reloadForm();
            },

            leaveType() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/leave-type')
                    .then(response => {
                        this.leave_type_options = response.data.data;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                });
            },

            cancelForm() {
                this.$router.push('/leaves/employee-list');
            },

            reloadForm() {
                this.$router.go('/leaves/employee-list');
            }
        }
    }
</script>
