<template>
  <div class="v-data-table">
    <slot v-if="slowRequest" name="loader.text">
      <div class="alert loader text-center">
        <div class="loader-text">
          Slow Request
        </div>
      </div>
    </slot>

    <div class="v-data-table-wrapper">
      <table class="table clean-table">
        <thead>
          <tr>
            <th v-if="showSelect" width="10">
              <input id="v-data-table-select-all" v-model="allChecked" type="checkbox" @click="changeAllChecked">
            </th>
            <th v-for="header in headers" :key="header.value" :data-column="header.value" :class="getClassList(header)" :width="getWidth(header)" role="columnheader" scope="col" @click="sortData($event, header)">
              {{ header.text }}
              <span v-if="header.sortable" class="sortIcon" :class="sortClass(header)">
                <!--                <span class="fas fa-sort" />-->
                <!--                <span class="fas fa-caret-up" />-->
                <!--                <span class="fas fa-caret-down" />-->
              </span>
            </th>
          </tr>
        </thead>

        <tbody>
          <slot v-if="loading" name="loader.animation">
            <div class="loader">
              <div class="line" />
              <div class="subline inc" />
              <div class="subline dec" />
            </div>
          </slot>

          <slot v-if="hasData" name="body" :items="items">
            <slot v-for="(item, index) in items" name="item" :item="item">
              <tr :key="index">
                <td v-if="showSelect">
                  <input v-model="selectedValues" type="checkbox" :value="item[itemKey]" @change="changeSelectValue">
                </td>
                <td v-for="header in headers" :key="header.value" :class="getCellClassList(header)">
                  <slot :name="'item.' + header.value" :item="item">
                    {{ item[header.value] }}
                  </slot>
                </td>
              </tr>
            </slot>
          </slot>

          <slot v-if="!hasData && !loading" name="nodata">
            <tr>
              <td :colspan="headers.length">
                <div class="alert text-center">
                  No Data
                </div>
              </td>
            </tr>
          </slot>
        </tbody>
      </table>
    </div>

    <div v-if="hasData" class="v-data-table-footer">
      <slot name="footer">
        <pagination :pagination="pagination" :callback="fetch" />
      </slot>
    </div>
  </div>
</template>

<script>
  import _ from 'lodash';
  import pagination from './pagination';

  let counter = 0;

  export default {
    components: {
      pagination
    },

    props: {
      init: {
        type: Boolean,
        default: true,
      },

      headers: {
        type: Array,
        default: () => []
      },

      itemKey: {
        type: String,
        default: () => 'id'
      },

      showSelect: {
        type: Boolean,
        default: false
      },

      url: {
        type: String,
        default: '/'
      },

      params: {
        type: Object,
        default: () => {}
      },

      elementId: {
        type: String,
        default: () => {
          counter += 1;
          return `data_grid_${counter}`;
        }
      },

      slowRequestMs: {
        type: Number,
        default: 300
      }
    },

    data: () => ({
      items:[],

      allChecked: false,

      selectedValues: [],

      pagination: {
        total: 0,
        per_page: 25,    // required
        current_page: 1, // required
        last_page: 0,    // required
        from: 1,
        to: 0
      },

      sortField: null,
      sortType: 'asc',
      loading: true,
      slowRequest: true,
    }),

    computed: {
      orderDirection() {
        return this.sortType === 'asc' ? '' : '-';
      },

      hasData() {
        return this.items.length;
      }
    },

    watch: {
      allChecked(newValue) {
        if (newValue) {
          this.selectedValues = this.items.map(item => item[this.itemKey]);
        } else {
          this.selectedValues = [];
        }
      },

      params: {
        handler() {
          this.fetch();
        },
        deep: true
      }
    },

    mounted() {
      this.$on('fetch', this.fetch);

      this.sortData = _.debounce(this.sortData, 300);

      if (window.localStorage.getItem(this.elementId + '_order_data')) {
        let orderData = JSON.parse(window.localStorage.getItem(this.elementId + '_order_data'));
        this.sortField = orderData.column;
        this.sortType = orderData.dir;
      }

      if (this.init) this.fetch();
    },

    methods: {
      async fetch() {
        let data = {
          per_page: this.pagination.per_page,
          page: this.pagination.current_page
        };

        if (this.sortField) {
          data['sort'] = this.orderDirection + this.sortField;
        }

        Object.assign(data, this.params);

        this.loading = true;
        let slowQueryTimer = window.setTimeout(() => {
          this.slowRequest = true;
        }, this.slowRequestMs);

        const response = await this.$http.get(this.url, {params: data});

        window.clearTimeout(slowQueryTimer);
        this.slowRequest = false;
        this.loading = false;

        this.items = response.data.data;

        this.pagination = response.data.meta;
      },

      changeSelectValue() {
        let elem = document.getElementById('v-data-table-select-all');

        if (this.selectedValues.length > 0 && this.selectedValues.length !== this.items.length) {
          elem.indeterminate = true;
        } else if (this.selectedValues.length > 0 && this.selectedValues.length === this.items.length) {
          elem.indeterminate = false;
        } else {
          elem.indeterminate = false;
        }
        this.$emit('input', this.selectedValues);
      },

      changeAllChecked(e) {
        let elem = e.target;
        if (this.selectedValues.length > 0 && this.selectedValues.length !== this.items.length) {
          this.allChecked = false;
          this.selectedValues = [];
          elem.checked = false;
          elem.indeterminate = false;
        }
      },

      getClassList(item) {
        const classes = ['column'];

        classes.push(`text-${item.align || 'left'}`);

        if (Array.isArray(item.class)) {
          classes.push(...item.class)
        } else if (item.class) {
          classes.push(item.class)
        }

        if (item.sortable) {
          classes.push('sortable');
          classes.push(this.sortClass(item));
        }

        return classes;
      },

      getCellClassList(item) {
        return item.align ? `text-${item.align}` : null;
      },

      getWidth(item) {
        return item.width || null;
      },

      sortData(e, item) {
        if (!item.sortable || !this.hasData || this.loading) {
          return false;
        }

        if (this.sortField === item.value) {
          this.sortType = this.sortType === 'asc' ? 'desc' : 'asc';
        } else {
          this.sortField = item.value;
          this.sortType = 'asc';
        }

        let orderData = JSON.stringify({column: this.sortField, dir: this.sortType});
        window.localStorage.setItem(this.elementId + '_order_data', orderData);

        if (e.ctrlKey) {
          this.sortType = 'desc';
          this.sortField = null;
          window.localStorage.removeItem(this.elementId + '_order_data');
        }

        this.fetch();
      },

      sortClass(item) {
        if (this.sortField !== item.value) {
          return false;
        }

        return this.sortType;
      }
    }
  }
</script>
