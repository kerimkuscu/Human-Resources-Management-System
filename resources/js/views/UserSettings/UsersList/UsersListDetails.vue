<template>

    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>

                    <button @click="goBack" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div>

                        <div class="loading" v-if="loading">
                            Loading...
                        </div>

                        <table v-if="user" class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" @click="goBack">Close</button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                user: null,
                error: null,
            };
        },

        created() {
            this.getData();
        },

        methods: {
            getData() {
                this.error = this.user = null;

                this.loading = true;
                this.$http
                    .get('/api/users/' + this.$route.params.id)
                    .then(response => {
                        this.user = response.data.data
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            },

            goBack() {
                this.$router.push('/users/list');
            },
        }
    }
</script>