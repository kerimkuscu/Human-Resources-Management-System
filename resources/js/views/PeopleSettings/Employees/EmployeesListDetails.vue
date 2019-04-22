<template>

    <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>

                    <button @click="goBack" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" style="overflow: auto">
                    <div>

                        <div class="loading" v-if="loading">
                            Loading...
                        </div>

                        <table v-if="employee" class="table clean-table">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ employee.name }}</td>
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td>{{ employee.nationality }}</td>
                            </tr>
                            <tr>
                                <th>Birthday</th>
                                <td>{{ employee.birthday }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ employee.gender }}</td>
                            </tr>
                            <tr>
                                <th>Marital Status</th>
                                <td>{{ employee.marital_status }}</td>
                            </tr>
                            <tr>
                                <th>Driver Licence</th>
                                <td>{{ employee.driver_license }}</td>
                            </tr>
                            <tr>
                                <th>Employment Status</th>
                                <td>{{ employee.employment_status }}</td>
                            </tr>
                            <tr>
                                <th>Job Title</th>
                                <td>{{ employee.job_title }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ employee.address }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ employee.city }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ employee.country }}</td>
                            </tr>
                            <tr>
                                <th>Province</th>
                                <td>{{ employee.province }}</td>
                            </tr>
                            <tr>
                                <th>Postal Code</th>
                                <td>{{ employee.postal_code }}</td>
                            </tr>
                            <tr>
                                <th>Home Phone</th>
                                <td>{{ employee.home_phone }}</td>
                            </tr>
                            <tr>
                                <th>Mobile Phone</th>
                                <td>{{ employee.mobile_phone }}</td>
                            </tr>
                            <tr>
                                <th>Work Phone</th>
                                <td>{{ employee.work_phone }}</td>
                            </tr>
                            <tr>
                                <th>Emergency Contact</th>
                                <td>{{ employee.emergency_contact }}</td>
                            </tr>
                            <tr>
                                <th>Work Email</th>
                                <td>{{ employee.work_email }}</td>
                            </tr>
                            <tr>
                                <th>Private Email</th>
                                <td>{{ employee.private_email }}</td>
                            </tr>
                            <tr>
                                <th>Joined Date</th>
                                <td>{{ employee.joined_date }}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>{{ employee.department }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" @click="goBack"><i class="fas fa-times"></i> Close</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                employee: null,
                error: null,
            };
        },

        created() {
            this.getData();
        },

        methods: {
            getData() {
                this.error = this.employee = null;

                this.loading = true;
                this.$http
                    .get('/api/users/employees/' + this.$route.params.id)
                    .then(response => {
                        this.employee = response.data.data
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            },

            goBack() {
                this.$router.push('/peoples/employees');
            },
        }
    }
</script>