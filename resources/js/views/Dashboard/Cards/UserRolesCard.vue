<template>
    <div>
        <div class="card text-center card-border">
            <div class="card-body">
                <h5 class="card-title title-color"><i class="fas fa-lock"></i> User Roles</h5>
                <h4 class="card-text">{{ items.length }} Roles</h4>
            </div>
        </div>
        <div class="card-footer text-center card-border" style="border-top:0">
            <router-link :to="{ name:'user.role'}">Manage Roles <i class="fas fa-arrow-circle-right"></i></router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            items: [],
        }),

        methods: {
            allRoles() {
                this.$http.get('/api/users/roles')
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
            this.allRoles();
        }
    }
</script>