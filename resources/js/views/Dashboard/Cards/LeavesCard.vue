<template>
  <div>
    <div class="card text-center card-border">
      <div class="card-body">
        <h5 class="card-title title-color">
          <i class="fas fa-calendar-alt" /> {{ $t('card.leavel') }}
        </h5>
        <h3 class="card-text">
          {{ items.length }} {{ $t('card.upcoming') }}
        </h3>
      </div>
    </div>
    <div class="card-footer text-center card-border" style="border-top:0">
      <router-link :to="{ name:'leaves.leave-type'}">
          {{ $t('card.leave_management') }} <i class="fas fa-arrow-circle-right" />
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
            this.allLeaves();
        },

        methods: {
            allLeaves() {
                this.$http.get('/api/users/leaves')
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
