<template>
    <div id="app">
        <div>
            <Menu></Menu>
        </div>
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
    height:50px
}

/* body {
    background-color: #D9AA8F;
} */

#app {

}

p, span, li {
    font-family: 'Source Sans Pro', sans-serif;

}

h1, h2, h3, h4, h5 {
    font-family: 'Open Sans', sans-serif;
    color: #C5A164;
}



</style>
