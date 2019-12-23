<template>
  <div style="margin-top: 10px">
    <div class="card-title d-inline">
      <router-link :to="{ name:'leaves.form' }">
        <button type="button" class="btn btn-success btn-sm float-right" data-tooltip="true" title="Leaves Form">
          <i class="fas fa-plus" />
        </button>
      </router-link>

      <h4>
        Employee Leave List
      </h4>
    </div>

    <hr>

    <data-grid ref="dataGrid" url="/api/users/leaves" element-id="employees" :headers="headers">
      <template #item.actions="{ item }">
        <div class="dropdown dropleft">
          <a href="#" role="button" data-toggle="dropdown" aria-expanded="true" class="btn btn-secondary btn-sm dropdown-toggle">
            <i class="fas fa-ellipsis-v fa-fw" />
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <router-link :to="{name:'leaves.edit', params: {id: item.id} }" class="dropdown-item">
              <i class="fas fa-pen fa-fw" /> {{ $t('general.edit') }}
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
                {text: 'Leave Type', value: 'leave_type_name', width: '200px', sortable: false},
                {text: 'Start Time', value: 'started_at', width: '200px', sortable: false},
                {text: 'End Time', value: 'ended_at', width: '200px', sortable: false},
                {text: 'Description', value: 'description', sortable: false},
                {text: '', value: 'actions', width: '40px', sortable: false},
            ]

        }),
    }
</script>
