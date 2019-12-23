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
import VueI18n from 'vue-i18n'

Vue.use(VueI18n);

const tr = require('./lang/tr');
const en = require('./lang/en');

const translationMessages = {
    en,
    tr,
};

let userLang = navigator.language || navigator.userLanguage;

if (userLang !== 'en' && userLang !== 'tr') userLang = null;

let locale = 'en';

const i18n = new VueI18n({
    locale,
    messages: translationMessages,
});

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
    i18n,
    ...App
});
