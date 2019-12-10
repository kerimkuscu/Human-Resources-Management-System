<template>
  <div class="users">
    <hr>

    <h4 class="card-title">
      User List
    </h4>

    <hr>

    <data-grid ref="dataGrid" url="/api/users" element-id="users" :headers="headers">
      <template #item.actions="{ item }">
        <div class="dropdown dropleft">
          <a href="#" role="button" data-toggle="dropdown" aria-expanded="true" class="btn btn-secondary btn-sm dropdown-toggle">
            <i class="fas fa-ellipsis-v fa-fw" />
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <router-link :to="{name:'user.user-role-form', params: {id: item.id} }" class="dropdown-item">
              <i class="fas fa-user-lock" /> Details
            </router-link>
          </div>
        </div>
      </template>
    </data-grid>

    <router-view />
  </div>
</template>

<script>
    import DataGrid from '../../../datagrid/datagrid';

    export default {
        components: {
            DataGrid
        },

        data: () => ({
            headers: [
                {text: 'Name', value: 'name', sortable: false},
                {text: 'Email', value: 'email', width: '200px', sortable: false},
                {text: 'Role', value: 'role_id', width: '200px', sortable: false},
                {text: '', value: 'actions', width: '40px', sortable: false},
            ]
        }),
    }
</script>
