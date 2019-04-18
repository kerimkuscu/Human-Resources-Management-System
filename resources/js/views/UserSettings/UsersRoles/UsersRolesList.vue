<template>
    <div>
        <div class="users_role">
            <div class="loading" v-if="loading">
                Loading...
            </div>

            <div v-if="error" class="error">
                {{ error }}
            </div>

            <hr>

            <router-link :to="{ name:'user.role-form' }">
                <button type="button" class="btn btn-success btn-sm float-right" data-tooltip="true" title="Users Role Form"><i class="fas fa-plus"></i></button>
            </router-link>

            <h4 class="card-title">User Roles</h4>

            <hr>

            <div>
                <data-tables-server :data="users_role" :total="total" :pagination-props="{ background: true, pageSizes: [5, 10, 20] }" :action-col="actionCol">
                    <el-table-column v-for="title in titles" :prop="title.prop" :label="title.label" :key="title.label"></el-table-column>
                </data-tables-server>
            </div>

            <router-view></router-view>

        </div>
    </div>
</template>

<script>
    export default {
        data(self = this) {
            return {
                loading: false,
                users_role: null,
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
                            type: 'danger',
                            icon: 'fas fa-trash',
                            size: 'mini',
                        },
                        handler: (row) => {
                            self.$router.push({name: 'user.role-delete', params: {id: row.id}})
                        }
                    }]
                }
            };
        },
        mounted() {
            this.getAll();
            this.getTitles();
        },
        methods: {
            getAll() {
                this.error = this.users_role = null;

                this.loading = true;
                this.$http
                    .get('/api/users/roles')
                    .then(response => {
                        this.users_role = response.data.data;
                        this.total = this.users_role.length;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            },

            getTitles() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/roles-title')
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