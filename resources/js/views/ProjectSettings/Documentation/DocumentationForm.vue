<template>
    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Documentation Form</h5>

                        <button @click="cancelForm" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" style="overflow: auto">
                        <div>

                            <div class="loading" v-if="loading">
                                Loading...
                            </div>



                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-outline-secondary" @click="cancelForm"><i class="fas fa-times"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
    import Form from 'form-backend-validation';

    export default {

        data: () => ({
            loading: false,
            editingId: false,

            form: new Form({

            })
        }),

        mounted() {
            if (this.$route.params.id) {
                this.editingId = this.$route.params.id;

                this.fetch(this.editingId);
            }
        },

        methods: {
            async fetch(id) {
                const response = await this.$http.get('/api/users/documentation/' + id);

                this.form.populate(response.data.data);
            },

            async submit() {

                const response = this.editingId
                    ? await this.form.put('/api/users/documentation/' + this.editingId)
                    : await this.form.post('/api/users/documentation');

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/documentation/documentation');
            },

            reloadForm() {
                this.$router.go('/documentation/documentation');
            },
        }
    }
</script>