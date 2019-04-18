<template>
    <div class="users">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <hr>

        <h4 class="card-title">User List</h4>

        <hr>

        <div>
            <data-tables-server :data="users" :total="total" :pagination-props="{ background: true, pageSizes: [5, 10, 20] }" :action-col="actionCol">
                <el-table-column v-for="title in titles" :prop="title.prop" :label="title.label" :key="title.label"></el-table-column>
            </data-tables-server>
        </div>

        <router-view></router-view>

    </div>
</template>

<script>
    export default {
        data(self=this) {
            return {
                loading: false,
                users: null,
                error: null,
                total: null,

                titles: [],

                actionCol: {
                    label: 'Actions',
                    props: {
                        align: 'center',
                    },
                    buttons: [{
                        props: {
                            type: 'primary',
                            icon: 'fas fa-user-lock',
                            size: 'mini',
                        },
                        handler: (row) => {
                            self.$router.push({name: 'user.user-role-form', params: {id: row.id}})
                        }
                    }]
                }
            };
        },
        created() {
            this.getAll();
            this.getTitles();
        },
        methods: {
            getAll() {
                this.error = this.users = null;

                this.loading = true;
                this.$http
                    .get('/api/users')
                    .then(response => {
                        this.users = response.data.data;
                        this.total = this.users.length;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            },

            getTitles() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users-title/')
                    .then(response => {
                        this.titles = response.data;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                });
            }
        }
    }
</script>