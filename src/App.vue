<template>
  <div id="app">
    <div>
      <Menu></Menu>
    </div>
   <!--  <img src="./assets/logo.png"> -->
    <div class="container-fluid" id="main-content">
      <router-view/>
    </div>
    <div class="push"></div>
    <Footer></Footer>
  </div>
</template>

<script>
import Menu from '@/components/Menu'
import Footer from '@/components/Footer'
export default {
  name: 'App',
  components: {
    'Menu' : Menu,
    'Footer' : Footer
  }
}
</script>

<style>

#main-content {
  margin-top:10px;
}

.push {
  height:60px
}
#app {
/*   font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px; */
}
</style>
