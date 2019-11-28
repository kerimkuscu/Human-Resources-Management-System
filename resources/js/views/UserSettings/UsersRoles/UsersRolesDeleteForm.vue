<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Confirm Deleting
          </h5>

          <button type="button" class="close" aria-label="Close" @click="cancelForm">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div>
            <p>Are you sure you want to delete this item ?</p>
          </div>
        </div>

        <div class="modal-footer">
          <div class="float-right">
            <button type="button" class="btn btn-outline-secondary" @click="cancelForm">
              <i class="fas fa-times" /> Cancel
            </button>
            <button type="button" class="btn btn-danger" @click="deleteForm">
              <i class="fas fa-trash" /> Delete
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {

        data:() => ({
            deletingId: '',
        }),

        mounted() {
            this.deletingId = this.$route.params.id;
        },

        methods: {

            deleteForm() {
                this.$http.delete('/api/users/roles/' + this.deletingId);

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/users/role');
            },

            reloadForm() {
                this.$router.go('/users/role');
            }
        }
    }
</script>