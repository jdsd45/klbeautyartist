<template>

    <div class="portfolio-dossier-cont">
        <div class="portfolio-dossier-cont-img"
            v-for="dossier in dossiers"
            v-bind:key="dossier.id">
            <div class="portfolio-dossier-txt">
                {{ dossier.titre }} 
            </div>
            <img class="portfolio-dossier-img" v-bind:src="dossier.lien_img">
        </div>
    </div>

</template>

<script>
export default {
    name: 'PortfolioMenu',
    data() {
        return {
            dossiers: null
        }
    },
    created: function() {
        axios
            .get('/static/portfolio-dossier.json')
            .then(response => (this.dossiers = response.data))
    },    
}
</script>

<style>

    .portfolio-dossier-cont {
        display: flex;
    }

    .portfolio-dossier-cont-img {
        position:relative;
    }

    .portfolio-dossier-img {
        object-fit: cover;
        filter: grayscale(100%);
        transition-property: filter;
        transition-duration: 0.7s;        
    }

    .portfolio-dossier-txt {
        color:white;;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        text-align: center;
        opacity: 0;
        transition-property: opacity;
        transition-duration: 0.7s;
        z-index: 1000;

    } 

    .portfolio-dossier-cont-img:hover .portfolio-dossier-txt {
        opacity: 1;
    }

    .portfolio-dossier-cont-img:hover .portfolio-dossier-img {
        filter: grayscale(0%);
    }

@media(max-width:767px){
    .portfolio-dossier-cont {
        flex-direction: column;

    }    

    .portfolio-dossier-txt { 
        width: 100%;
        font-size: 1.2rem;
    }
    .portfolio-dossier-img {
        height: 50vh;    
        width: 100vw;
    }
}
@media(min-width:767.1px){
    .portfolio-dossier-txt { 
        width:60%;
        font-size: 2rem;
    }
    .portfolio-dossier-img {
        height: calc(100vh - 38px - 56px);   
        width: calc(100vw / 3);

    }    
}



</style>
