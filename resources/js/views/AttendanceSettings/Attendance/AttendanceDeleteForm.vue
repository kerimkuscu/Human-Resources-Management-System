<template>
  <div class="modal fade show docked docked-right" tabindex="-1" role="dialog" style="display: block">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            {{ $t('general.confirm_deleting') }}
          </h5>

          <button type="button" class="close" aria-label="Close" @click="cancelForm">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div>
            <p>{{ $t('general.are_you_sure_you_want_to_delete_this_item') }}</p>
          </div>
        </div>

        <div class="modal-footer">
          <div class="float-right">
            <button type="button" class="btn btn-outline-secondary" @click="cancelForm">
              <i class="fas fa-times" /> {{ $t('general.cancel') }}
            </button>
            <button type="button" class="btn btn-danger" @click="deleteForm">
              <i class="fas fa-trash" /> {{ $t('general.delete') }}
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
                this.$http.delete('/api/users/attendance/' + this.deletingId);

                this.cancelForm();

                this.reloadForm();
            },

            cancelForm() {
                this.$router.push('/attendance/attendance');
            },

            reloadForm() {
                this.$router.go('/attendance/attendance');
            }
        }
    }
</script>
