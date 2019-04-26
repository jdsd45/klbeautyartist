<template>
  <div id="app">
    <div>
      <Menu></Menu>
    </div>
    <img src="./assets/logo.png">
    <router-view/>
  </div>
</template>

<script>
import Menu from '@/components/Menu'
export default {
  name: 'App',
  components: {
    'Menu' : Menu
  }
}
</script>

<style>
#app {
/*   font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px; */
}
</style>
