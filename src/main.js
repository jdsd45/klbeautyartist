// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Menu from '@/components/Menu'
import Footer from '@/components/Footer'
import router from './router'
import store from '@/components/Store'
import axiosApi from 'axios'

Vue.config.productionTip = false

/* eslint-disable no-new */

const axios = axiosApi.create({
/*     baseURL: process.env.BASE_URL,
    headers: {"Access-Control-Allow-Origin": "*"},
    withCredentials: true */
});

//Use the window object to make it available globally.
window.axios = axios;

new Vue({
    el: '#app',
    store,
    router,
    components: { App, Menu, Footer },
    template: '<App/>'
})

$('.nav-link').on('click', function() {
    $('.navbar-collapse').collapse('hide');
});