<template>
    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Project Form</h5>

                        <button @click="cancelForm" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" style="overflow: auto">
                        <div>

                            <div class="loading" v-if="loading">
                                Loading...
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label required" for="project-name">Name</label>
                                <div class="col-9">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('project_name')}" type="text" id="project-name" v-model="form.project_name"
                                           placeholder="Project Name">
                                    <span class="invalid-feedback">{{ form.errors.first('project_name') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label required" for="details">Details</label>
                                <div class="col-9">
                                    <textarea class="form-control" :class="{'is-invalid' : form.errors.has('details')}" id="details" rows="3" v-model="form.details" placeholder="Details"></textarea>
                                    <span class="invalid-feedback">{{ form.errors.first('details')}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label required" for="status">Status</label>
                                <div class="col-9">
                                    <select id="status" v-model="form.status" class="form-control" :class="{'is-invalid': form.errors.has('status')}">
                                        <option v-for="option in statusOptions" v-bind:value="option.value">
                                            {{ option.text }}
                                        </option>
                                    </select>
                                    <span class="invalid-feedback">{{ form.errors.first('status') }}</span>
                                </div>
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

            statusOptions: [
                {value: null, text: '(Selected Status)'},
                {value: 'Active', text: 'Active'},
                {value: 'Passive', text: 'Passive'}],

            form: new Form({
                project_name: null,
                details: null,
                status: null,
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
                const response = await this.$http.get('/api/users/project/' + id);

                this.form.populate(response.data.data);
            },

            async submit() {

                const response = this.editingId
                    ? await this.form.put('/api/users/project/' + this.editingId)
                    : await this.form.post('/api/users/project');

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/project/project');
            },

            reloadForm() {
                this.$router.go('/project/project');
            },
        }
    }
</script>