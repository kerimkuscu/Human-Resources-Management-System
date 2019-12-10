<template>
  <div>
    <hr>

    <router-link :to="{ name:'leaves.leave-type-form' }">
      <button type="button" class="btn btn-success btn-sm float-right" data-tooltip="true" title="Leave Type Form">
        <i class="fas fa-plus" />
      </button>
    </router-link>

    <h4 class="card-title">
      Leave Type
    </h4>

    <hr>

    <data-grid ref="dataGrid" url="/api/users/leave-type" element-id="leave-type" :headers="headers">
      <template #item.actions="{ item }">
        <div class="dropdown dropleft">
          <a href="#" role="button" data-toggle="dropdown" aria-expanded="true" class="btn btn-secondary btn-sm dropdown-toggle">
            <i class="fas fa-ellipsis-v fa-fw" />
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <router-link :to="{name:'leaves.leave-type-edit', params: {id: item.id} }" class="dropdown-item">
              <i class="fas fa-pen fa-fw" /> Edit
            </router-link>

            <router-link :to="{name:'leaves.leave-type-edit', params: {id: item.id} }" class="dropdown-item text-danger btn-delete">
              <i class="fas fa-trash" /> Delete
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
                {text: 'Leave Type', value: 'leave_type', sortable: false},
                {text: 'Leave Per Day', value: 'leaves_per_day', width: '200px', sortable: false},
                {text: '', value: 'actions', width: '40px', sortable: false},
            ]

        }),
    }
</script>
