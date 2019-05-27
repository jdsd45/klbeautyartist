import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store ({
    state: {
        baseUrl: process.env.BASE_URL
    },
    mutations: {},
    actions: {}
})    
