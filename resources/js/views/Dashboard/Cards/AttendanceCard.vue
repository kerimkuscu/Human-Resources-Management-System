<template>
    <div>
        <div class="card text-center card-border">
            <div class="card-body">
                <h5 class="card-title title-color"><i class="far fa-clock"></i> Attendance</h5>
                <h4 class="card-text">{{ items.length }} Entries Last Week</h4>
            </div>
        </div>
        <div class="card-footer text-center card-border" style="border-top:0">
            <router-link :to="{ name:'leaves.leave-type'}">Monitor Attendance <i class="fas fa-arrow-circle-right"></i></router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            items: [],
        }),

        methods: {
            allAttendance() {
                this.$http.get('/api/users/attendance')
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
            this.allAttendance();
        }
    }
</script>