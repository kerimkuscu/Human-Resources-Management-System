<template>
    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Users Role Form</h5>

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
                                <label class="col-3 col-form-label required" for="users-role">Users Role</label>
                                <div class="col-9">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('users_role')}" type="text" id="users-role" v-model="form.users_role" placeholder="Users Role">
                                    <span class="invalid-feedback">{{ form.errors.first('users_role') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-outline-secondary" @click="cancelForm">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
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

            form: new Form({
               users_role: '',
            })
        }),

        methods: {

            async submit() {
                this.form.post('/api/users/roles');

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/users/role');
            },

            reloadForm() {
                this.$router.go('/users/role');
            }
        }
    }
</script>