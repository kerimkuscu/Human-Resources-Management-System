<template>

    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Details</h5>

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
                                <label class="col-3 col-form-label" for="users-name">Name</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" id="users-name" v-model="user.name" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label" for="users-email">Email</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" id="users-email" v-model="user.email" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label required" for="type">Role</label>
                                <div class="col-9">
                                    <select class="form-control" :class="{'is-invalid' : form.errors.has('role_id')}" id="type" v-model="form.role_id">
                                        <option value="null">(Choose)</option>
                                        <option v-for="option in roles" v-bind:value="option.id">
                                            {{ option.users_role }}
                                        </option>
                                    </select>

                                    <span class="invalid-feedback">{{ form.errors.first('role_id')}}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" @click="cancelForm">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</template>

<script>

    import Form from 'form-backend-validation';

    export default {

        components: {
            Form
        },

        data() {
            return {
                loading: false,
                user: [],
                error: null,
                roles: [],

                form: new Form({
                    role_id: null,
                })
            };
        },

        mounted() {
            this.roleForm();
        },

        methods: {
            getData() {
                this.error = this.user = null;

                this.loading = true;
                this.$http
                    .get('/api/users/' + this.$route.params.id)
                    .then(response => {
                        this.user = response.data.data;
                        console.log(this.user);
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            },

            async submit() {
                this.form.put('/api/users/' + this.user.id);

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/users/list');
            },

            reloadForm() {
                this.$router.go('/users/list');
            },

            roleForm() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/roles')
                    .then(response => {
                        this.roles = response.data.data;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                });
            }
        },

        created() {
            this.getData();
        },
    }
</script>