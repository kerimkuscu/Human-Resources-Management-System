<template>
    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog modal-lg" role="document">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Employees Form</h5>

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
                                <label class="col-5 col-form-label required" for="name">Name Surname</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('name')}" type="text" id="name" v-model="form.name" placeholder="Name Surname">
                                    <span class="invalid-feedback">{{ form.errors.first('name') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="nationality">Nationality</label>
                                <div class="col-7">
                                    <select id="nationality" v-model="form.nationality" class="form-control" :class="{'is-invalid': form.errors.has('nationality')}">
                                        <option v-for="option in nationality" v-bind:value="option.value">
                                            {{ option.text }}
                                        </option>
                                    </select>
                                    <span class="invalid-feedback">{{ form.errors.first('nationality') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label required" for="birthday">Date Of Birth</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('birthday')}" type="date" id="birthday" v-model="form.birthday">
                                    <span class="invalid-feedback">{{ form.errors.first('birthday') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="gender">Gender</label>
                                <div class="col-7">
                                    <select id="gender" v-model="form.gender" class="form-control" :class="{'is-invalid': form.errors.has('gender')}">
                                        <option v-for="option in genderOptions" v-bind:value="option.value">
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
                                        <option v-for="option in maritalStatusOptions" v-bind:value="option.value">
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
                                        <option v-for="option in driverLicenseOptions" v-bind:value="option.value">
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
                                        <option v-for="option in employmentStatusOptions" v-bind:value="option.value">
                                            {{ option.text }}
                                        </option>
                                    </select>
                                    <span class="invalid-feedback">{{ form.errors.first('employment_status') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label required" for="job-title">Job Title</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('job_title')}" type="text" id="job-title" v-model="form.job_title" placeholder="Job Title">
                                    <span class="invalid-feedback">{{ form.errors.first('job_title') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="city">City</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('city')}" type="text" id="city" v-model="form.city" placeholder="City">
                                    <span class="invalid-feedback">{{ form.errors.first('city') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="address">Address</label>
                                <div class="col-7">
                                    <textarea class="form-control" :class="{'is-invalid' : form.errors.has('address')}" id="address" rows="3" v-model="form.address" placeholder="Address"></textarea>
                                    <span class="invalid-feedback">{{ form.errors.first('address')}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="country">Country</label>
                                <div class="col-7">
                                    <select id="country" v-model="form.country" class="form-control" :class="{'is-invalid': form.errors.has('country')}">
                                        <option v-for="option in country" v-bind:value="option.value">
                                            {{ option.text }}
                                        </option>
                                    </select>
                                    <span class="invalid-feedback">{{ form.errors.first('country') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="province">Province</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('province')}" type="text" id="province" v-model="form.province" placeholder="Province">
                                    <span class="invalid-feedback">{{ form.errors.first('province') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="postal-code">Postal Code</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('postal_code')}" type="text" id="postal-code" v-model="form.postal_code" placeholder="Postal Code">
                                    <span class="invalid-feedback">{{ form.errors.first('postal_code') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="home-phone">Home Phone</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('home_phone')}" type="phone" id="home-phone" v-model="form.home_phone" placeholder="Home Phone">
                                    <span class="invalid-feedback">{{ form.errors.first('home_phone') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="mobile-phone">Mobile Phone</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('mobile_phone')}" type="phone" id="mobile-phone" v-model="form.mobile_phone" placeholder="Mobile Phone">
                                    <span class="invalid-feedback">{{ form.errors.first('mobile_phone') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="work-phone">Work Phone</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('work_phone')}" type="phone" id="work-phone" v-model="form.work_phone" placeholder="Work Phone">
                                    <span class="invalid-feedback">{{ form.errors.first('work_phone') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label required" for="emergency-contact">Emergency Contact</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('emergency_contact')}" type="phone" id="emergency-contact" v-model="form.emergency_contact" placeholder="Emergency Contact">
                                    <span class="invalid-feedback">{{ form.errors.first('emergency_contact') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="work-email">Work Email</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('work_email')}" type="email" id="work-email" v-model="form.work_email" placeholder="Work Email">
                                    <span class="invalid-feedback">{{ form.errors.first('work_email') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label" for="private-email">Private Email</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('private_email')}" type="email" id="private-email" v-model="form.private_email" placeholder="Private Email">
                                    <span class="invalid-feedback">{{ form.errors.first('private_email') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label required" for="joined-date">Joined Date</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('joined_date')}" type="date" id="joined-date" v-model="form.joined_date">
                                    <span class="invalid-feedback">{{ form.errors.first('joined_date') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 col-form-label required" for="department">Department</label>
                                <div class="col-7">
                                    <input class="form-control" :class="{'is-invalid': form.errors.has('department')}" type="text" id="department" v-model="form.department" placeholder="Department">
                                    <span class="invalid-feedback">{{ form.errors.first('department') }}</span>
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

                const response = this.editingId
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