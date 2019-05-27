<template>
    <div>
        <carousel 
            :perPage="1"
            :perPageCustom="[[1024,2]]"
            :paginationEnabled="true"
            :paginationSize="15"
            :paginationActiveColor="'#C5A164'"
            :paginationPosition="'bottom-overlay'"
            >
            <slide class="slide-carousel-home">
                <img src="https://picsum.photos/id/10/800/400" alt="">
            </slide>
            <slide class="slide-carousel-home">
                <img src="https://picsum.photos/id/30/800/400" alt="">
            </slide>
            <slide class="slide-carousel-home">
                <img src="https://picsum.photos/id/40/800/400" alt="">
            </slide>
            <slide class="slide-carousel-home">
                <img src="https://picsum.photos/id/20/800/400" alt="">
            </slide>
            <slide class="slide-carousel-home">
                <img src="https://picsum.photos/id/50/800/400" alt="">
            </slide>
        </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel'
export default {
    name: 'CarouselHome', 
}
</script>

<style>
    .slide-carousel-home {
        text-align: center;
    }
    .slide-carousel-home img {
        width:100%; 
        height:40vh;
        object-fit: cover;
    }


</style>
