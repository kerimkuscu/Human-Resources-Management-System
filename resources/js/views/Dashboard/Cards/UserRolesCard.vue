<template>
  <div>
    <div class="card text-center card-border">
      <div class="card-body">
        <h5 class="card-title title-color">
          <i class="fas fa-lock" /> User Roles
        </h5>
        <h3 class="card-text">
          {{ items.length }} Roles
        </h3>
      </div>
    </div>
    <div class="card-footer text-center card-border" style="border-top:0">
      <router-link :to="{ name:'user.role'}">
        Manage Roles <i class="fas fa-arrow-circle-right" />
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
            this.allRoles();
        },

        methods: {
            allRoles() {
                this.$http.get('/api/users/roles')
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