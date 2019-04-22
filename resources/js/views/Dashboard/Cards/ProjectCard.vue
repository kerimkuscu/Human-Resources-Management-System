<template>
    <div>
        <div class="card text-center card-border">
            <div class="card-body">
                <h5 class="card-title title-color"><i class="fas fa-project-diagram"></i> Project</h5>
                <h4 class="card-text">{{ items.length }} Active Project</h4>
            </div>
        </div>
        <div class="card-footer text-center card-border" style="border-top:0">
            <router-link :to="{ name:'project.project-list'}">Update / Client Project <i class="fas fa-arrow-circle-right"></i></router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            items: [],
        }),

        methods: {
            allProject() {
                this.$http.get('/api/users/project')
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
            this.allProject();
        }
    }
</script>