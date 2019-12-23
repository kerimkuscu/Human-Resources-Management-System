<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            {{ $t('user_list.user_details') }}
          </h5>

          <button type="button" class="close" aria-label="Close" @click="goBack">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div>
            <div v-if="loading" class="loading">
              {{ $t('genaral.loading') }}
            </div>

            <table v-if="user" class="table">
              <thead>
                <tr>
                  <th>{{ $t('form.name') }}</th>
                  <th>{{ $t('form.email') }}</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>{{ user.name }}</td>
                  <td>{{ user.email }}</td>
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
                user: null,
                error: null,
            };
        },

        created() {
            this.getData();
        },

        methods: {
            getData() {
                this.error = this.user = null;

                this.loading = true;
                this.$http
                    .get('/api/users/' + this.$route.params.id)
                    .then(response => {
                        this.user = response.data.data
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            },

            goBack() {
                this.$router.push('/users/list');
            },
        }
    }
</script>
