<template>
  <div>
    <div class="users_role">
      <hr>

      <h4 class="card-title">
        {{ $t('user_list.user_roles') }}
      </h4>

      <hr>

      <data-grid ref="dataGrid" url="/api/users/roles" element-id="users-roles" :headers="headers">
        <template #item.actions="{ item }">
          <div class="dropdown dropleft">
            <a href="#" role="button" data-toggle="dropdown" aria-expanded="true" class="btn btn-secondary btn-sm dropdown-toggle">
              <i class="fas fa-ellipsis-v fa-fw" />
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <router-link :to="{name:'user.role-delete', params: {id: item.id} }" class="dropdown-item text-danger btn-delete">
                <i class="fas fa-trash" /> {{ $t('general.delete') }}
              </router-link>
            </div>
          </div>
        </template>
      </data-grid>

      <router-view />
    </div>
  </div>
</template>

<script>
    import DataGrid from '../../../datagrid/datagrid';

    export default {
        components: {
          DataGrid
        },

        data: (self = this) => ({
            headers: [
                {text: self.$i18n.t('form.role_name'), value: 'users_role', sortable: false},
                {text: '', value: 'actions', width: '40px', sortable: false},
            ]

        }),
    }
</script>
