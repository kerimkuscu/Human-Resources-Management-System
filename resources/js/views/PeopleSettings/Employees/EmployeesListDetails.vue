<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            {{ $t('employees.user_details') }}
          </h5>

          <button type="button" class="close" aria-label="Close" @click="goBack">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body" style="overflow: auto">
          <div>
            <div v-if="loading" class="loading">
              {{ $t('genaral.loading') }}
            </div>

            <table v-if="employee" class="table clean-table">
              <tbody>
                <tr>
                  <th>{{ $t('form.name') }}</th>
                  <td>{{ employee.name }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.nationality') }}</th>
                  <td>{{ employee.nationality }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.date_of_birth') }}</th>
                  <td>{{ employee.birthday }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.gender') }}</th>
                  <td>{{ employee.gender }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.marital_status') }}</th>
                  <td>{{ employee.marital_status }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.driver_license') }}</th>
                  <td>{{ employee.driver_license }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.employment_status') }}</th>
                  <td>{{ employee.employment_status }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.job_title') }}</th>
                  <td>{{ employee.job_title }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.address') }}</th>
                  <td>{{ employee.address }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.city') }}</th>
                  <td>{{ employee.city }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.country') }}</th>
                  <td>{{ employee.country }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.province') }}</th>
                  <td>{{ employee.province }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.postal_code') }}</th>
                  <td>{{ employee.postal_code }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.home_phone') }}</th>
                  <td>{{ employee.home_phone }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.mobile_phone') }}</th>
                  <td>{{ employee.mobile_phone }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.work_phone') }}</th>
                  <td>{{ employee.work_phone }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.emergency_contact') }}</th>
                  <td>{{ employee.emergency_contact }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.work_email') }}</th>
                  <td>{{ employee.work_email }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.private_email') }}</th>
                  <td>{{ employee.private_email }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.joined_date') }}</th>
                  <td>{{ employee.joined_date }}</td>
                </tr>
                <tr>
                  <th>{{ $t('form.department') }}</th>
                  <td>{{ employee.department }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-outline-secondary" type="button" @click="goBack">
            <i class="fas fa-times" /> {{ $t('general.close') }}
          </button>
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
