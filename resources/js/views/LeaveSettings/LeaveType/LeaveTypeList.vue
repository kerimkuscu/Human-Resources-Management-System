<template>
    <div>

        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="errors" class="error">
            {{ errors }}
        </div>

        <hr>

        <router-link :to="{ name:'leaves.leave-type-form' }">
            <button type="button" class="btn btn-success btn-sm float-right" data-tooltip="true" title="Leave Type Form"><i class="fas fa-plus"></i></button>
        </router-link>

        <h4 class="card-title">Leave Type</h4>

        <hr>

        <div>
            <data-tables-server :data="items" :total="total" :pagination-props="{ background: true, pageSizes: [5, 10, 20] }" :action-col="actionCol">
                <el-table-column v-for="title in titles" :prop="title.prop" :label="title.label" :key="title.label"></el-table-column>
            </data-tables-server>
        </div>

        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data: (self = this) => ({
            loading: false,
            items: [],
            errors: null,
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
                        icon: 'fas fa-edit',
                        size: 'mini',
                    },
                    handler: (row) => {
                        self.$router.push({name: 'leaves.leave-type-edit', params: {id: row.id}})
                    }
                }, {
                    props: {
                        type: 'danger',
                        icon: 'fas fa-trash',
                        size: 'mini',
                    },
                    handler: (row) => {
                        self.$router.push({name: 'leaves.leave-type-delete', params: {id: row.id}})
                    }
                }]
            }
        }),

        mounted() {
            this.fetch();
            this.getTitles();
        },

        methods: {

            fetch() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/leave-type')
                    .then(response => {
                        this.items = response.data.data;
                        this.total = this.items.length;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                });
            },

            getTitles() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/leave-type-title')
                    .then(response => {
                        this.titles = response.data;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                });
            }
        },
    }
</script>