<template>
    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Attendance Form</h5>

                        <button @click="cancelForm" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" style="overflow: auto">
                        <div>

                            <div class="loading" v-if="loading">
                                Loading...
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label required" for="employee">Employee</label>
                                <div class="col-8">
                                    <select class="form-control" :class="{'is-invalid' : form.errors.has('employee_id')}" id="employee" v-model="form.employee_id">
                                        <option value="null">(Choose)</option>
                                        <option v-for="option in employees" v-bind:value="option.id">
                                            {{ option.name }}
                                        </option>
                                    </select>
                                    <span class="invalid-feedback">{{ form.errors.first('employee_id') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label required" for="time-in-date">Time In Date</label>
                                <div class="col-8">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('time_in_date')}" type="date" id="time-in-date" v-model="form.time_in_date">
                                    <span class="invalid-feedback">{{ form.errors.first('time_in_date') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label required" for="time-in-time-hour">Time In Time</label>
                                <div class="col-4">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('time_in_time_hour')}" type="number" max="24" min="0" id="time-in-time-hour" placeholder="Hour" v-model="form.time_in_time_hour">
                                    <span class="invalid-feedback">{{ form.errors.first('time_in_time_hour') }}</span>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('time_in_time_minute')}" type="number" max="60" min="0" placeholder="Minute" v-model="form.time_in_time_minute">
                                    <span class="invalid-feedback">{{ form.errors.first('time_in_time_minute') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label required" for="time-out-date">Time Out Date</label>
                                <div class="col-8">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('time_out_date')}" type="date" id="time-out-date" v-model="form.time_out_date">
                                    <span class="invalid-feedback">{{ form.errors.first('time_out_date') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label required" for="time-out-time-hour">Time Out Time</label>
                                <div class="col-4">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('time_out_time_hour')}" type="number" max="24" min="0" id="time-out-time-hour" placeholder="Hour" v-model="form.time_out_time_hour">
                                    <span class="invalid-feedback">{{ form.errors.first('time_out_time_hour') }}</span>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('time_out_time_minute')}" type="number" max="60" min="0" placeholder="Minute" v-model="form.time_out_time_minute">
                                    <span class="invalid-feedback">{{ form.errors.first('time_out_time_minute') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="note">Note</label>
                                <div class="col-8">
                                    <textarea class="form-control" :class="{'is-invalid' : form.errors.has('note')}" id="note" rows="3" v-model="form.note" placeholder="Note"></textarea>
                                    <span class="invalid-feedback">{{ form.errors.first('note')}}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-outline-secondary" @click="cancelForm"><i class="fas fa-times"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
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

                const response = this.editingId
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