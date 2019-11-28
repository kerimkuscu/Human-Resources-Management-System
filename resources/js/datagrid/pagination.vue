<template>
  <nav class="v-data-table-pagination">
    <span class="rows-per-page">
      Rows per page
      <select v-model="pagination.per_page" class="form-control form-control-sm">
        <option v-for="num in perPageOptions" :key="'per-page-' + num" :value="num">
          {{ num }}
        </option>
      </select>
    </span>

    <span class="records-summary">
      {{ pagination.from }} - {{ pagination.to }} of {{ pagination.total }}
    </span>

    <span v-if="pagination.last_page > 1" class="float-right">
      <span class="pagination prev-page" :class="{ 'disabled' : pagination.current_page <= 1 }">
        <a v-if="pagination.current_page <= 1">
          <span aria-hidden="true"><i class="fas fa-chevron-left" /></span>
        </a>

        <a v-if="pagination.current_page > 1 " href="#" @click.prevent="changePage(pagination.current_page - 1)">
          <span aria-hidden="true"><i class="fas fa-chevron-left" /></span>
        </a>
      </span>

      <span v-if="showPageCount">
        <input v-model="pagination.current_page" :max="pagination.last_page" min="1" type="number"> / {{ pagination.last_page }}
      </span>

      <span class="pagination next-page" :class="{ 'disabled' : pagination.current_page === pagination.last_page || pagination.last_page === 0 }">
        <a v-if="pagination.current_page === pagination.last_page || pagination.last_page === 0">
          <span aria-hidden="true"><i class="fas fa-chevron-right" /></span>
        </a>

        <a v-if="pagination.current_page < pagination.last_page" href="#" @click.prevent="changePage(pagination.current_page + 1)">
          <span aria-hidden="true"><i class="fas fa-chevron-right" /></span>
        </a>
      </span>
    </span>
  </nav>
</template>

<script>
  import _ from 'lodash';

  export default {
    props: {
      pagination: {
        type: Object,
        required: true
      },
      callback: {
        type: Function,
        required: true
      },
      showPageCount: {
        type: Boolean,
        default: false
      }
    },

    data: () => ({
      callbackFunction: null,
      perPageOptions: [
        25, 50, 100
      ]
    }),

    watch: {
      'pagination.current_page'(newVal, oldVal) {
        if (+newVal !== +oldVal) {
          this.callbackFunction();
        }
      },
      'pagination.per_page'(newVal, oldVal) {
        if (+newVal !== +oldVal) {
          this.callbackFunction();
        }
      }
    },

    mounted() {
      this.callbackFunction = _.debounce(this.callback, 250);
    },

    methods: {
      changePage(page) {
        if (this.pagination.current_page === page) {
          return;
        }

        this.$set(this.pagination, 'current_page', page);
      }
    }
  };
</script>
