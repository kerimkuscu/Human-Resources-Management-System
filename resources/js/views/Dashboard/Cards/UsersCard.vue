<template>
  <div>
    <div class="card text-center card-border">
      <div class="card-body">
        <h5 class="card-title title-color">
          <i class="fas fa-user-plus" /> {{ $t('card.users') }}
        </h5>
        <h3 class="card-text">
          {{ items.length }} {{ $t('card.users') }}
        </h3>
      </div>
    </div>
    <div class="card-footer text-center card-border" style="border-top:0">
      <router-link :to="{ name:'user.list'}">
          {{ $t('card.manage_users') }} <i class="fas fa-arrow-circle-right" />
      </router-link>
    </div>
  </div>
</template>

<script>
    export default {

        data: () => ({
            items: [],
        }),

        created() {
            this.allUsers();
        },

        methods: {
            allUsers() {
                this.$http.get('/api/users/')
                    .then(response => {
                        this.items = response.data.data;
                    }).catch(error => {
                    this.error = error.response.data.message || error.message;
                }).finally(() => {
                    this.loading = false;
                })
            }
        }
    }
</script>
