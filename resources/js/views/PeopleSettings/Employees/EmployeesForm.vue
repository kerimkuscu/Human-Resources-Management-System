<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog modal-lg" role="document">
      <form autocomplete="off" @submit.prevent="submit">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Employees Form
            </h5>

            <button type="button" class="close" aria-label="Close" @click="cancelForm">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body" style="overflow: auto">
            <div>
              <div v-if="loading" class="loading">
                {{ $t('genaral.loading') }}
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="name">Name Surname</label>
                <div class="col-7">
                  <input id="name" v-model="form.name" class="form-control" :class="{'is-invalid': form.errors.has('name')}" type="text" placeholder="Name Surname">
                  <span class="invalid-feedback">{{ form.errors.first('name') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="nationality">Nationality</label>
                <div class="col-7">
                  <select id="nationality" v-model="form.nationality" class="form-control" :class="{'is-invalid': form.errors.has('nationality')}">
                    <option v-for="option in nationality" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('nationality') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="birthday">Date Of Birth</label>
                <div class="col-7">
                  <input id="birthday" v-model="form.birthday" class="form-control" :class="{'is-invalid': form.errors.has('birthday')}" type="date">
                  <span class="invalid-feedback">{{ form.errors.first('birthday') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="gender">Gender</label>
                <div class="col-7">
                  <select id="gender" v-model="form.gender" class="form-control" :class="{'is-invalid': form.errors.has('gender')}">
                    <option v-for="option in genderOptions" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('gender') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="marital-status">Marital Status</label>
                <div class="col-7">
                  <select id="marital-status" v-model="form.marital_status" class="form-control" :class="{'is-invalid': form.errors.has('marital_status')}">
                    <option v-for="option in maritalStatusOptions" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('marital_status') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="driver-license">Driver License</label>
                <div class="col-7">
                  <select id="driver-license" v-model="form.driver_license" class="form-control" :class="{'is-invalid': form.errors.has('driver_license')}">
                    <option v-for="option in driverLicenseOptions" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('driver_license') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="employment-status">Employment Status</label>
                <div class="col-7">
                  <select id="employment-status" v-model="form.employment_status" class="form-control" :class="{'is-invalid': form.errors.has('employment_status')}">
                    <option v-for="option in employmentStatusOptions" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('employment_status') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="job-title">Job Title</label>
                <div class="col-7">
                  <input id="job-title" v-model="form.job_title" class="form-control" :class="{'is-invalid': form.errors.has('job_title')}" type="text" placeholder="Job Title">
                  <span class="invalid-feedback">{{ form.errors.first('job_title') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="city">City</label>
                <div class="col-7">
                  <input id="city" v-model="form.city" class="form-control" :class="{'is-invalid': form.errors.has('city')}" type="text" placeholder="City">
                  <span class="invalid-feedback">{{ form.errors.first('city') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="address">Address</label>
                <div class="col-7">
                  <textarea id="address" v-model="form.address" class="form-control" :class="{'is-invalid' : form.errors.has('address')}" rows="3" placeholder="Address" />
                  <span class="invalid-feedback">{{ form.errors.first('address') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="country">Country</label>
                <div class="col-7">
                  <select id="country" v-model="form.country" class="form-control" :class="{'is-invalid': form.errors.has('country')}">
                    <option v-for="option in country" :key="option.text" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select>
                  <span class="invalid-feedback">{{ form.errors.first('country') }}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-5 col-form-label" for="province">Province</label>
                <div class="col-7">
                  <input id="province" v-model="form.province" class="form-control" :class="{'is-invalid': form.errors.has('province')}" type="text" placeholder="Province">
                  <span class="invalid-feedback">{{ form.errors.first('province') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="postal-code">Postal Code</label>
                <div class="col-7">
                  <input id="postal-code" v-model="form.postal_code" class="form-control" :class="{'is-invalid': form.errors.has('postal_code')}" type="text" placeholder="Postal Code">
                  <span class="invalid-feedback">{{ form.errors.first('postal_code') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="home-phone">Home Phone</label>
                <div class="col-7">
                  <input id="home-phone" v-model="form.home_phone" class="form-control" :class="{'is-invalid': form.errors.has('home_phone')}" type="phone" placeholder="Home Phone">
                  <span class="invalid-feedback">{{ form.errors.first('home_phone') }}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-5 col-form-label" for="mobile-phone">Mobile Phone</label>
                <div class="col-7">
                  <input id="mobile-phone" v-model="form.mobile_phone" class="form-control" :class="{'is-invalid': form.errors.has('mobile_phone')}" type="phone" placeholder="Mobile Phone">
                  <span class="invalid-feedback">{{ form.errors.first('mobile_phone') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="work-phone">Work Phone</label>
                <div class="col-7">
                  <input id="work-phone" v-model="form.work_phone" class="form-control" :class="{'is-invalid': form.errors.has('work_phone')}" type="phone" placeholder="Work Phone">
                  <span class="invalid-feedback">{{ form.errors.first('work_phone') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="emergency-contact">Emergency Contact</label>
                <div class="col-7">
                  <input id="emergency-contact" v-model="form.emergency_contact" class="form-control" :class="{'is-invalid': form.errors.has('emergency_contact')}" type="phone" placeholder="Emergency Contact">
                  <span class="invalid-feedback">{{ form.errors.first('emergency_contact') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="work-email">Work Email</label>
                <div class="col-7">
                  <input id="work-email" v-model="form.work_email" class="form-control" :class="{'is-invalid': form.errors.has('work_email')}" type="email" placeholder="Work Email">
                  <span class="invalid-feedback">{{ form.errors.first('work_email') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label" for="private-email">Private Email</label>
                <div class="col-7">
                  <input id="private-email" v-model="form.private_email" class="form-control" :class="{'is-invalid': form.errors.has('private_email')}" type="email" placeholder="Private Email">
                  <span class="invalid-feedback">{{ form.errors.first('private_email') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="joined-date">Joined Date</label>
                <div class="col-7">
                  <input id="joined-date" v-model="form.joined_date" class="form-control" :class="{'is-invalid': form.errors.has('joined_date')}" type="date">
                  <span class="invalid-feedback">{{ form.errors.first('joined_date') }}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-5 col-form-label required" for="department">Department</label>
                <div class="col-7">
                  <input id="department" v-model="form.department" class="form-control" :class="{'is-invalid': form.errors.has('department')}" type="text" placeholder="Department">
                  <span class="invalid-feedback">{{ form.errors.first('department') }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <div class="float-right">
              <button type="submit" class="btn btn-outline-secondary" @click="cancelForm">
                <i class="fas fa-times" /> {{ $t('general.cancel') }}
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save" /> {{ $t('general.save') }}
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
    import Nationality from '../../../mixins/nationality';
    import Country from '../../../mixins/country';

    export default {

        mixins: [
            Nationality,
            Country
        ],

        data: () => ({
            loading: false,
            editingId: false,

            genderOptions: [
                {value: null, text: '(Selected Gender)'},
                {value: 'Male', text: 'Male'},
                {value: 'Female', text: 'Female'}],

            maritalStatusOptions: [
                {value: null, text: '(Selected Marital Status)'},
                {value: 'Married', text: 'Married'},
                {value: 'Single', text: 'Single'},
                {value: 'Divorced', text: 'Divorced'},
                {value: 'Widowed', text: 'Widowed'},
                {value: 'Other', text: 'Other'}],

            driverLicenseOptions: [
                {value: null, text: '(Selected Driver License)'},
                {value: 'Yes', text: 'Yes'},
                {value: 'No', text: 'No'}],

            employmentStatusOptions: [
                {value: null, text: '(Selected Employment Status)'},
                {value: 'Full Time Contract', text: 'Full Time Contract'},
                {value: 'Full Time Internship', text: 'Full Time Internship'},
                {value: 'Full Time Permanent', text: 'Full Time Permanent'},
                {value: 'Part Time Contract', text: 'Part Time Contract'},
                {value: 'Part Time Internship', text: 'Part Time Internship'},
                {value: 'Part Time Permanent', text: 'Part Time Permanent'}],

            form: new Form({
                name: null,
                nationality: null,
                birthday: null,
                gender: null,
                marital_status: null,
                driver_license: null,
                employment_status: null,
                job_title: null,
                address: null,
                city: null,
                country: null,
                province: null,
                postal_code: null,
                home_phone: null,
                mobile_phone: null,
                work_phone: null,
                emergency_contact: null,
                work_email: null,
                private_email: null,
                joined_date: null,
                department: null
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
                const response = await this.$http.get('/api/users/employees/' + id);

                this.form.populate(response.data.data);
            },

            async submit() {

                this.editingId
                    ? await this.form.put('/api/users/employees/' + this.editingId)
                    : await this.form.post('/api/users/employees');

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/peoples/employees');
            },

            reloadForm() {
                this.$router.go('/peoples/employees');
            }
        }
    }
</script>
