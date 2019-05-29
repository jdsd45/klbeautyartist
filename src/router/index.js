import Vue from 'vue'
import Router from 'vue-router'
import VueCarousel from 'vue-carousel'
import Home from '@/components/Home/Home'
import Prestations from '@/components//Prestations/Prestations'
import Contact from '@/components/Contact/Contact'
import About from '@/components/About'
import Portfolio from '@/components/Portfolio/Portfolio'
import PortfolioAlbum from '@/components/Portfolio/PortfolioAlbum'

Vue.use(VueCarousel)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/prestations/:categorie',
      name: 'Prestation-Categorie',
      component: Prestations
    },
    {
      path: '/prestations',
      name: 'Prestations',
      component: Prestations
    },
    {
      path: '/portfolio',
      name: 'Portfolio',
      component: Portfolio
    },
    {
      path: '/portfolio/:album',
      name: 'Portfolio-Album',
      component: PortfolioAlbum
    },
    {
      path: '/contact',
      name: 'Contact',
      component: Contact
    },
    {
      path: '/About',
      name: 'About',
      component: About    
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  }
})
