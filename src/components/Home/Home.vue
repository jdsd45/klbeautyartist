<template>
    <div>
        <CarouselHome></CarouselHome>
        <div id="separateurHome" class="container"></div>
        <div class="container-fluid">
            <Bloc2Home></Bloc2Home>
        </div>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel'
import CarouselHome from '@/components/Home/CarouselHome.vue'
import Bloc2Home from '@/components/Home/Bloc2Home.vue'

export default {
    name: 'Home', 
    components: {
        Carousel,
        Slide,
        CarouselHome,
        Bloc2Home
    }
}
</script>

<style>
    #separateurHome {
        height:50px;
    }
</style>
