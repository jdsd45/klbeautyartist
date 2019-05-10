import Vue from 'vue'
import Router from 'vue-router'
import VueCarousel from 'vue-carousel'
import Home from '@/components/Home/Home'
import Prestations from '@/components//Prestations/Prestations'
import Contact from '@/components/Contact/Contact'
import Keslene from '@/components/Keslene'

Vue.use(VueCarousel)
Vue.use(Router)

export default new Router({
  mode:'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/prestations/*',
      name: 'Prestations/*',
      component: Prestations
    },
    {
      path: '/prestations',
      name: 'Prestations',
      component: Prestations
    },
    {
      path: '/contact',
      name: 'Contact',
      component: Contact
    },
    {
      path: '/keslene',
      name: 'Keslene',
      component: Keslene    
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  }
})
