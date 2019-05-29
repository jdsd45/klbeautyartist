<template>
    <div>
        <h2>{{ this.titre_album }} </h2>
        <div id="album-cont">
            <div v-for="photo in photosAlbum" v-bind:key="photo.id" class="album-img-cont"> 
                <img :src="photo.lien_img" :alt="photo.titre" class="album-img">
                <div class="album-img-txt"> {{ photo.titre}} </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PortfolioAlbum',
    data () {
        return {
            album: this.$route.params.album, 
            photos: null
        }
    },
    computed: {
        photosAlbum: function() {
            if(this.photos != null) return this.photos.filter(photo => photo.album == this.album) 
        },
        titre_album: function() {
            const titres = {"maquillage-mariee":"Maquillage mariée", "maquillage-mode":"Maquillage mode", "maquillage-evenementiel": "Maquillage évènementiel"};
            return titres[this.album]
        }
    },
    created: function() {
        axios
            .get('/static/portfolio.json')
            .then(response => (this.photos = response.data))
    }     
}
</script>

<style>

#album-cont {
    display:flex;
    flex-wrap: wrap;
    padding: 0;
    margin: 0;
    width:110%;
}

.album-img-cont {
    position: relative;
}

.album-img {
    object-fit: cover;
}

.album-img-txt {
    position: absolute;
    padding-left: 2px;
    padding-right: 2px;
    width:100%;
    height:30%;
    top:0%;
    z-index: 1000;
    text-align: center;
    visibility: hidden;
    background-color: rgb(255, 255, 255, 0);
    transition-property: top, background-color;
    transition-duration: 0.4s;   
}

.album-img-cont:hover .album-img-txt{
    top:70%;
    background-color: rgb(255, 255, 255, 0.6);    
    visibility: visible;
}



@media(max-width: 767.98px) {
    .album-img {
        width: calc(100vw);
        height: 60vh;
    }
    .album-img-txt {
        font-size:1.3rem;
    }    
}

@media(min-width: 768px) and (max-width: 991.98px) {
    .album-img {
        width: calc(100vw / 2);
        height: 50vh;
    }
    .album-img-txt {
        font-size:1.2rem;
    }    
}

@media (min-width: 992px) and (max-width: 1199.98px) {
    .album-img {
        width: calc(100vw / 3);
        height: 40vh;
    }
    .album-img-txt {
        font-size:1.2rem;
    }    
}

@media(min-width:1200px){
    .album-img {
        width: calc(100vw / 4);
        height: 50vh;
    }
    .album-img-txt {
        font-size:1.4rem;
    }
}


</style>
