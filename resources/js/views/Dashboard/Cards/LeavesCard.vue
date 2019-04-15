<template>
    <div>
        <div class="card text-center card-border">
            <div class="card-body">
                <h5 class="card-title">Leaves</h5>
                <p class="card-text">{{ items.length }} Upcoming</p>
            </div>
        </div>
        <div class="card-footer text-center card-border" style="border-top:0">
            <router-link :to="{ name:'leaves.leave-type'}">Leave Management <i class="fas fa-arrow-circle-right"></i></router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            items: [],
        }),

        methods: {
        allLeaves() {
            this.$http.get('/api/users/leaves')
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
            this.allLeaves();
        }
    }
</script>