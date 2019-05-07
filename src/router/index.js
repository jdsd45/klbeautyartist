import Vue from 'vue'
import Router from 'vue-router'
<<<<<<< HEAD
import Home from '@/components/Home'
import Prestations from '@/components/Prestations'
import Contact from '@/components/Contact'
=======
import VueCarousel from 'vue-carousel'
import Home from '@/components/Home/Home'
import Prestations from '@/components//Prestations/Prestations'
import Contact from '@/components/Contact/Contact'
>>>>>>> master
import Keslene from '@/components/Keslene'

Vue.use(VueCarousel)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
<<<<<<< HEAD
=======
    },
    {
      path: '/prestations/*',
      name: 'Prestations',
      component: Prestations
>>>>>>> master
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
