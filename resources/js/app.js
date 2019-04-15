
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import router from './router'
import App from './components/App'
import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI);

// set language to EN
import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

locale.use(lang);

// import DataTables and DataTablesServer together
import VueDataTables from 'vue-data-tables'
Vue.use(VueDataTables);

import VueAuth from '@websanova/vue-auth';

Vue.axios = window.axios;

Vue.use(VueAuth, {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
    loginData: {url: '/api/auth/login', method: 'POST', redirect: '', fetchUser: true},
});

Vue.use(VueSidebarMenu);

Vue.prototype.$http = window.axios;

new Vue({
    router,
    ...App
});