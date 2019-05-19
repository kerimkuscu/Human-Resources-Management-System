<template>
    <div>
        <div class="card text-center card-border">
            <div class="card-body">
                <h5 class="card-title title-color"><i class="fas fa-users"></i> People</h5>
                <h3 class="card-text">{{ items.length }} Employees</h3>
            </div>
        </div>
        <div class="card-footer text-center card-border" style="border-top:0">
            <router-link :to="{ name:'peoples.employees'}">Manage Employees <i class="fas fa-arrow-circle-right"></i></router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            items: [],
        }),

        methods: {
            allPeoples() {
                this.$http.get('/api/users/employees')
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
            this.allPeoples();
        }
    }
</script>