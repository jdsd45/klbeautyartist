import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Prestations from '@/components/Prestations'
import Contact from '@/components/Contact'
import Keslene from '@/components/Keslene'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
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
  ]
})
