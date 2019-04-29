import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Prestations from '@/components/Prestations'
import Contact from '@/components/Contact'
import Keslene from '@/components/Keslene'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
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
