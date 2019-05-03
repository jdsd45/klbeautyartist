<template>
    <div>
        <CarouselHome></CarouselHome>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel'
import CarouselHome from '@/components/CarouselHome.vue'

export default {
    name: 'Home',
    components: {
        Carousel,
        Slide,
        CarouselHome
    }    
}
</script>

<style>

</style>
