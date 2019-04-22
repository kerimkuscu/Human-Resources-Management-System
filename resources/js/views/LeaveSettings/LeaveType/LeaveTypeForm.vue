<template>
    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Leave Type Form</h5>

                        <button @click="cancelForm" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div>

                            <div class="loading" v-if="loading">
                                Loading...
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label required" for="leave-type">Leave Type</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('leave_type')}" type="text" id="leave-type" v-model="form.leave_type" placeholder="Leave Type">
                                    <span class="invalid-feedback">{{ form.errors.first('leave_type') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label required" for="leaves-per-day">Leaves Per Day <i class="fas fa-question-circle" data-tooltip="true" title="This is the number of leave days that can be applied by an employee per year (or the current leave period). If the leave period is less than a Year this is the number of leaves for the leave period."></i></label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('leaves_per_day')}" type="number" min="0" id="leaves-per-day" v-model="form.leaves_per_day">
                                    <span class="invalid-feedback">{{ form.errors.first('leaves_per_day') }}</span>
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

                const response = this.editingId
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