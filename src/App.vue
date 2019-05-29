<template>

<div id="app">
    <Menu></Menu>
    <div class="" id="main-content">
        <router-view></router-view>
    </div>
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
    }, 
    methods : {
        setHeightFooter () {
            let heightFooter = document.getElementById('footer').offsetHeight;
            let main = document.getElementById('main-content');
            main.style.paddingBottom = heightFooter + "px";
        }
    },
    mounted: function() {
        this.setHeightFooter();
        window.onresize = this.setHeightFooter;
    }
}
</script>

<style>

#main-content {
    margin-top:56px;
    padding:0;  
    overflow-x: hidden;
}

p, span, li {
    font-family: 'Source Sans Pro', sans-serif;

}

h1, h2, h3, h4, h5 {
    font-family: 'Open Sans', sans-serif;
    color: #C5A164;
}

html, body {
    height: 100%;
}

#app {
    position: relative;
    min-height: 100%;
}


</style>
