<template>
  <div>
    <div class="card text-center card-border">
      <div class="card-body">
        <h5 class="card-title title-color">
          <i class="fas fa-users" /> {{ $t('card.people') }}
        </h5>
        <h3 class="card-text">
          {{ items.length }} {{ $t('card.employees') }}
        </h3>
      </div>
    </div>
    <div class="card-footer text-center card-border" style="border-top:0">
      <router-link :to="{ name:'peoples.employees'}">
          {{ $t('card.manage_employees') }} <i class="fas fa-arrow-circle-right" />
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
            this.allPeoples();
        },

        methods: {
            allPeoples() {
                this.$http.get('/api/users/employees')
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
