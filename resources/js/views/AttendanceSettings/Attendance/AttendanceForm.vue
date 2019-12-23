<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <form autocomplete="off" @submit.prevent="submit">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              {{ $t('attendance.attendance_form') }}
            </h5>

            <button type="button" class="close" aria-label="Close" @click="cancelForm">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body" style="overflow: auto">
            <div>
              <div v-if="loading" class="loading">
                {{ $t('genaral.loading') }}
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="employee">{{ $t('form.employee') }}</label>
                <div class="col-8">
                  <select id="employee" v-model="form.employee_id" class="form-control" :class="{'is-invalid' : form.errors.has('employee_id')}">
                    <option value="null">
                      (Choose)
                    </option>
                    <option v-for="option in employees" :key="option.id" :value="option.id">
                      {{ option.name }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('employee_id') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="time-in-date">{{ $t('form.time_im_date') }}</label>
                <div class="col-8">
                  <input id="time-in-date" v-model="form.time_in_date" class="form-control" :class="{'is-invalid': form.errors.has('time_in_date')}" type="date">
                  <span class="invalid-feedback">{{ form.errors.first('time_in_date') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="time-in-time-hour">{{ $t('form.time_in_time') }}</label>
                <div class="col-4">
                  <input id="time-in-time-hour" v-model="form.time_in_time_hour" class="form-control" :class="{'is-invalid': form.errors.has('time_in_time_hour')}" type="number" max="24" min="0" placeholder="Hour">
                  <span class="invalid-feedback">{{ form.errors.first('time_in_time_hour') }}</span>
                </div>
                <div class="col-4">
                  <input v-model="form.time_in_time_minute" class="form-control" :class="{'is-invalid': form.errors.has('time_in_time_minute')}" type="number" max="60" min="0" placeholder="Minute">
                  <span class="invalid-feedback">{{ form.errors.first('time_in_time_minute') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="time-out-date">{{ $t('form.time_out_date') }}</label>
                <div class="col-8">
                  <input id="time-out-date" v-model="form.time_out_date" class="form-control" :class="{'is-invalid': form.errors.has('time_out_date')}" type="date">
                  <span class="invalid-feedback">{{ form.errors.first('time_out_date') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="time-out-time-hour">{{ $t('form.time_out_time') }}</label>
                <div class="col-4">
                  <input id="time-out-time-hour" v-model="form.time_out_time_hour" class="form-control" :class="{'is-invalid': form.errors.has('time_out_time_hour')}" type="number" max="24" min="0" placeholder="Hour">
                  <span class="invalid-feedback">{{ form.errors.first('time_out_time_hour') }}</span>
                </div>
                <div class="col-4">
                  <input v-model="form.time_out_time_minute" class="form-control" :class="{'is-invalid': form.errors.has('time_out_time_minute')}" type="number" max="60" min="0" placeholder="Minute">
                  <span class="invalid-feedback">{{ form.errors.first('time_out_time_minute') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label" for="note">{{ $t('form.note') }}</label>
                <div class="col-8">
                  <textarea id="note" v-model="form.note" class="form-control" :class="{'is-invalid' : form.errors.has('note')}" rows="3" placeholder="Note" />
                  <span class="invalid-feedback">{{ form.errors.first('note') }}</span>
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
            employees: [],

            form: new Form({
                employee_id: null,
                time_in_date: null,
                time_in_time_hour: null,
                time_in_time_minute: null,
                time_out_date: null,
                time_out_time_hour: null,
                time_out_time_minute: null,
                note: null,

            })
        }),

        mounted() {
            if (this.$route.params.id) {
                this.editingId = this.$route.params.id;

                this.fetch(this.editingId);
            }

            this.employeeForm();
        },

        methods: {
            async fetch(id) {
                const response = await this.$http.get('/api/users/attendance/' + id);

                this.form.populate(response.data.data);
            },

            async submit() {

                this.editingId
                    ? await this.form.put('/api/users/attendance/' + this.editingId)
                    : await this.form.post('/api/users/attendance');

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/attendance/attendance');
            },

            reloadForm() {
                this.$router.go('/attendance/attendance');
            },

            employeeForm() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/employees')
                    .then(response => {
                        this.employees = response.data.data;
                        console.log(this.employees);
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                });
            }
        }
    }
</script>
