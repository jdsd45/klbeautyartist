<template>
    <div>
        <CarouselHome></CarouselHome>
        <div id="separateurHome" class="container"></div>
        <div class="container-fluid">
            <Bloc2Home
            v-bind:baseurl="baseurl"
            ></Bloc2Home>
        </div>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel'
import CarouselHome from '@/components/Home/CarouselHome.vue'
import Bloc2Home from '@/components/Home/Bloc2Home.vue'

export default {
    name: 'Home',
    props: ['baseurl'],
/*     data() {
        return {
            baseurl: 'lorem ipsum'
        }
    },  */   
    components: {
        Carousel,
        Slide,
        CarouselHome,
        Bloc2Home
    },
    mounted: function() {
        console.log('composant parent : ' + this.baseurl)
    }    
}
</script>

<style>
    #separateurHome {
        height:50px;
    }
</style>
