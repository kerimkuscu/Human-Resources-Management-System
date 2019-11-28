<template>
  <div>
    <div v-if="loading" class="loading">
      Loading...
    </div>

    <div v-if="errors" class="error">
      {{ errors }}
    </div>

    <hr>

    <router-link :to="{ name:'applicants.candidates-form' }">
      <button type="button" class="btn btn-success btn-sm float-right" data-tooltip="true" title="Candidates Form">
        <i class="fas fa-plus" />
      </button>
    </router-link>

    <h4 class="card-title">
      Candidates List
    </h4>

    <hr>

    <div>
      <data-tables-server :data="items" :total="total" :pagination-props="{ background: true, pageSizes: [5, 10, 20] }" :action-col="actionCol">
        <el-table-column v-for="title in titles" :key="title.label" :prop="title.prop" :label="title.label" />
      </data-tables-server>
    </div>

    <router-view />
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
                        self.$router.push({name: 'applicants.candidates-edit', params: {id: row.id}})
                    }
                }, {
                    props: {
                        type: 'danger',
                        icon: 'fas fa-trash',
                        size: 'mini',
                    },
                    handler: (row) => {
                        self.$router.push({name: 'applicants.candidates-delete', params: {id: row.id}})
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

                this.$http.get('/api/users/candidates')
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

                this.$http.get('/api/users/candidates-title')
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