<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <form autocomplete="off" @submit.prevent="submit">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Candidate Form
            </h5>

            <button type="button" class="close" aria-label="Close" @click="cancelForm">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div>
              <div v-if="loading" class="loading">
                Loading...
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="name">Name</label>
                <div class="col-8">
                  <input id="name" v-model="form.name" class="form-control" :class="{'is-invalid': form.errors.has('name')}" type="text">
                  <span class="invalid-feedback">{{ form.errors.first('name') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label" for="gender">Gender</label>
                <div class="col-8">
                  <select id="gender" v-model="form.gender" class="form-control" :class="{'is-invalid': form.errors.has('gender')}">
                    <option v-for="option in genderOptions" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('gender') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label" for="city">City</label>
                <div class="col-8">
                  <input id="city" v-model="form.city" class="form-control" :class="{'is-invalid': form.errors.has('city')}" type="text" placeholder="City">
                  <span class="invalid-feedback">{{ form.errors.first('city') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label" for="country">Country</label>
                <div class="col-8">
                  <select id="country" v-model="form.country" class="form-control" :class="{'is-invalid': form.errors.has('country')}">
                    <option v-for="option in country" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('country') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="phone">Phone</label>
                <div class="col-8">
                  <input id="phone" v-model="form.phone" class="form-control" :class="{'is-invalid': form.errors.has('phone')}" type="phone" placeholder="Phone Number">
                  <span class="invalid-feedback">{{ form.errors.first('phone') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label" for="email">Email</label>
                <div class="col-8">
                  <input id="email" v-model="form.email" class="form-control" :class="{'is-invalid': form.errors.has('email')}" type="email" placeholder="Email Address">
                  <span class="invalid-feedback">{{ form.errors.first('email') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="job-title">Job Title</label>
                <div class="col-8">
                  <input id="job-title" v-model="form.job_title" class="form-control" :class="{'is-invalid': form.errors.has('job_title')}" type="text" placeholder="Job Title">
                  <span class="invalid-feedback">{{ form.errors.first('job_title') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label required" for="department">Department</label>
                <div class="col-8">
                  <input id="department" v-model="form.department" class="form-control" :class="{'is-invalid': form.errors.has('department')}" type="text" placeholder="Department">
                  <span class="invalid-feedback">{{ form.errors.first('department') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-4 col-form-label" for="description">Description</label>
                <div class="col-8">
                  <textarea id="description" v-model="form.description" class="form-control" :class="{'is-invalid' : form.errors.has('description')}" rows="3" placeholder="Description" />
                  <span class="invalid-feedback">{{ form.errors.first('description') }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="float-right">
              <button type="submit" class="btn btn-outline-secondary" @click="cancelForm">
                <i class="fas fa-times" /> Cancel
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save" /> Save
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
    import Form from 'form-backend-validation';
    import Country from '../../../mixins/country';

    export default {

        mixins: [Country],

        data: () => ({
            loading: false,
            editingId: false,
            candidates: [],
            genderOptions: [
                {value: null, text: '(Selected Gender)'},
                {value: 'Male', text: 'Male'},
                {value: 'Female', text: 'Female'}],

            form: new Form({
                name: null,
                gender: null,
                city: null,
                country: null,
                phone: null,
                email: null,
                job_title: null,
                department: null,
                description: null,
            })
        }),

        mounted() {
            if (this.$route.params.id) {
                this.editingId = this.$route.params.id;

                this.fetch(this.editingId);
            }

            this.employeeForm();
        },

        methods: {
            async fetch(id) {
                const response = await this.$http.get('/api/users/candidates/' + id);

                this.form.populate(response.data.data);
            },

            async submit() {

                this.editingId
                    ? await this.form.put('/api/users/candidates/' + this.editingId)
                    : await this.form.post('/api/users/candidates');

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/applicants/candidates');
            },

            reloadForm() {
                this.$router.go('/applicants/candidates');
            },

            employeeForm() {
                this.error = this.items = null;

                this.loading = true;

                this.$http.get('/api/users/candidates')
                    .then(response => {
                        this.candidates = response.data.data;
                        console.log(this.candidates);
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                });
            }
        }
    }
</script>
