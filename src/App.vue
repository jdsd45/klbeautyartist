<template>

<div id="app">
    <Menu></Menu>
    <div class="" id="main-content">
        <router-view></router-view>
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
    margin-top:56px;
    padding:0;  
    overflow-x: hidden;
/*     position:relative;
    min-height:100%;  */
}

.push {
    height:130px
}


p, span, li {
    font-family: 'Source Sans Pro', sans-serif;

}

h1, h2, h3, h4, h5 {
    font-family: 'Open Sans', sans-serif;
    color: #C5A164;
}

html {
  height: 100%;
}

body {
  min-height: 100%;
  margin: 0;
  padding: 0;
  position: relative;
}



</style>
