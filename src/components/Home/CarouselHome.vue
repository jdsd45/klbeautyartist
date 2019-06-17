<template>
    <div>
        <carousel 
            :perPage="1"
            :perPageCustom="[[1024,2]]"
            :paginationEnabled="true"
            :paginationSize="13"
            :paginationActiveColor="'#C5A164'"
            :paginationPosition="'bottom-overlay'"
            >
            <slide class="slide-carousel-home"
                v-for="(photo, index) in photosCarousel"
                :key="index">
                <img :src="photo.lien_img">
            </slide>
        </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel'
export default {
    name: 'CarouselHome', 
    data() {
        return {
            photosCarousel: null
        }
    },
    created: function() {
        axios
            .get(process.env.BASE_URL + 'index.php?q=carousel')
            //.get('back-php/index.php?q=categories')
            .then(response => (this.photosCarousel = response.data))
    },       
}
</script>

<style>
    .slide-carousel-home {
        text-align: center;
    }
    .slide-carousel-home img {
        width:100%; 
        height:50vh;
        object-fit: cover;
    }


</style>
