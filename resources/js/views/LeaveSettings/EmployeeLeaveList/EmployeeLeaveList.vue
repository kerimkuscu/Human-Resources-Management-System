<template>
    <div>

        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="errors" class="error">
            {{ errors }}
        </div>

        <hr>

        <router-link :to="{ name:'leaves.form' }">
            <button type="button" class="btn btn-success btn-sm float-right" data-tooltip="true" title="Leaves Form"><i class="fas fa-plus"></i></button>
        </router-link>

        <h4 class="card-title">Employee Leave List</h4>

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
            items: null,
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
                        self.$router.push({name: 'leaves.edit', params: {id: row.id}})
                    }
                }]
            }
        }),

        mounted() {
            this.fetch();
            this.getTitles();
        },

        methods: {
            leavesForm() {
                this.$router.push('/leaves/form');
            },

            fetch() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/leaves')
                    .then(response => {
                        this.items = response.data.data;
                        this.total = this.items.length;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            },

            getTitles() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/leaves-title')
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