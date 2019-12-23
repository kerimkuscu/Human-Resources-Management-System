<template>
  <div>
    <hr>

    <router-link :to="{ name:'applicants.candidates-form' }">
      <button type="button" class="btn btn-success btn-sm float-right" data-tooltip="true" title="Candidates Form">
        <i class="fas fa-plus" />
      </button>
    </router-link>

    <h4 class="card-title">
      {{ $t('candidates.candidate_list') }}
    </h4>

    <hr>

    <data-grid ref="dataGrid" url="/api/users/candidates" element-id="candidates" :headers="headers">
      <template #item.actions="{ item }">
        <div class="dropdown dropleft">
          <a href="#" role="button" data-toggle="dropdown" aria-expanded="true" class="btn btn-secondary btn-sm dropdown-toggle">
            <i class="fas fa-ellipsis-v fa-fw" />
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <router-link :to="{name:'applicants.candidates-edit', params: {id: item.id} }" class="dropdown-item">
              <i class="fas fa-pen fa-fw" /> {{ $t('general.edit') }}
            </router-link>

            <router-link :to="{name:'applicants.candidates-delete', params: {id: item.id} }" class="dropdown-item text-danger btn-delete">
              <i class="fas fa-trash fa-fw" /> {{ $t('general.delete') }}
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

        data: (self = this) => ({
            headers: [
                {text: self.$i18n.t('form.name'), value: 'name', width: '200px', sortable: false},
                {text: self.$i18n.t('form.phone'), value: 'phone', width: '200px', sortable: false},
                {text: self.$i18n.t('form.email'), value: 'email', width: '200px', sortable: false},
                {text: self.$i18n.t('form.job_title'), value: 'job_title', width: '200px', sortable: false},
                {text: self.$i18n.t('form.department'), value: 'department', width: '200px', sortable: false},
                {text: '', value: 'actions', width: '40px', sortable: false},
            ]
        }),
    }
</script>
