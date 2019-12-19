<template>
  <div class="dropdown dropleft">
    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="true">
      <i class="fas fa-ellipsis-v fa-fw" />
    </a>

    <div class="dropdown-menu dropdown-menu-right">
      <a v-for="(item, index) in items" :key="index" :href="item.url" class="dropdown-item" :class="{ 'text-danger': item.type === 'delete' }"
         @click.prevent="handleClick(item)"
      >
        <i :class="item.icon" class="fas fa-pen fa-fw" /> {{ item.text }}
      </a>
    </div>
  </div>
</template>

<script>
    import * as bootbox from 'bootbox';

    export default {
        props: {
            items: {
                type: Array,
                required: true
            },
        },

        methods: {
          handleClick(item) {

            if (item.type === 'delete') {
              this.showDeleteModal(item);

              return ;
            }

            window.location.href = item.url;
          },

            showDeleteModal(item) {
                bootbox.confirm({
                    message: this.$i18n.t('general.are_you_sure_you_want_to_delete'),
                    className: 'modal-danger',
                    buttons: {
                        confirm: {
                            label: this.$i18n.t('general.delete'),
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: this.$i18n.t('general.dont_delete'),
                            className: 'btn-secondary-outline'
                        }
                    },
                    callback: result => this.destroy(item, result),
                });
            },

            async destroy(item, result) {
                if (!result) {
                    return;
                }

                await this.$http.delete(item.url);

                this.$emit('deleted', item);
            },
        }
    };
</script>
