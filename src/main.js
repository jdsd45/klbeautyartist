// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Menu from '@/components/Menu'
import Footer from '@/components/Footer'
import router from './router'

import Vuex from 'vuex'

Vue.use(Vuex)

Vue.config.productionTip = false

/* eslint-disable no-new */
const store = new Vuex.Store({
    state: {
      count: 54
    },
    mutations: {
      increment (state) {
        state.count++
      }
    }
  })

new Vue({
  el: '#app',
  store,
  router,
  components: { App, Menu, Footer },
  template: '<App/>'
})



