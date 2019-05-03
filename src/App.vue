<template>
    <div id="app">
        <div>
            <Menu></Menu>
        </div>
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
  margin-top:56px;
  padding:0;  
  overflow-x: hidden;
}

.push {
  height:50px
}

#app {

}

#cont-prestations, #cont-contact {
    padding-left:8px;
    padding-right:8px;
}
</style>
