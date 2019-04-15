<template>
    <div>
        <div class="card text-center card-border">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">{{ items.length }} Users</p>
            </div>
        </div>
        <div class="card-footer text-center card-border" style="border-top:0">
            <router-link :to="{ name:'user.list'}">Manage Users <i class="fas fa-arrow-circle-right"></i></router-link>
        </div>
    </div>
</template>

<script>
    export default {

        data: () => ({
            items: [],
        }),

        methods: {
            allUsers() {
                this.$http.get('/api/users/')
                    .then(response => {
                        this.items = response.data.data;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            }
        },

        created() {
            this.allUsers();
        }
    }
</script>