<template>

    <div id="portfolio-dossier-cont">
        <div class="portfolio-dossier-cont-img"
            v-for="dossier in dossiers"
            v-bind:key="dossier.id">
            <router-link :to="'/portfolio/'+dossier.link">
                <div class="portfolio-dossier-txt">
                    {{ dossier.titre }} 
                </div>
                <img class="portfolio-dossier-img" 
                    v-bind:src="dossier.lien_img" 
                    v-bind:style="{height: heightContImgPortfolio}">
            </router-link>         
        </div>
    </div>

  <!--   <router-link :to="'/prestations/'+content.url" class="rubrique-home">
        <img class="img-home-bloc2 rounded mx-auto d-block" :src="content.lien_img">
        <h2 class="rubrique-titre"> {{ content.titre }} </h2>
    </router-link>   -->  

</template>

<script>
export default {
    name: 'PortfolioMenu',
    data() {
        return {
            dossiers: null,
            heightContImgPortfolio: '20vh'
        }
    },
    methods: {
        setHeightContImgPortfolio () {
            let height;
            if(window.outerWidth > 991.98) {
                let heightMenu = document.getElementById('menu').offsetHeight;
                let heightTitre = document.getElementById('portfolio-dossier-cont').previousElementSibling.offsetHeight;
                height = "calc(100vh - " + (heightMenu + heightTitre) + "px)"
            } else {
                height = "60vh";
            }
            this.heightContImgPortfolio = height;
        }
    },
    mounted: function (){
        this.setHeightContImgPortfolio();
        window.addEventListener('resize', () => {
            this.setHeightContImgPortfolio();
        })
    },
    created: function() {
        axios
            .get('/static/portfolio-dossier.json')
            .then(response => (this.dossiers = response.data))
    } 
}
</script>

<style>

    #portfolio-dossier-cont {
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
/*         opacity: 0;
        transition-property: opacity;
        transition-duration: 0.7s; */
        z-index: 1000;
    } 

/*     .portfolio-dossier-cont-img:hover .portfolio-dossier-txt {
        opacity: 1;
    } */

    .portfolio-dossier-cont-img:hover .portfolio-dossier-img {
        filter: grayscale(0%);
    }

@media(max-width:991.98px){
    #portfolio-dossier-cont {
        flex-direction: column;
    }    

    .portfolio-dossier-txt { 
        width: 100%;
        font-size: 2.2rem;
    }
    .portfolio-dossier-img {
/*         height: 50vh;     */
        width: 100vw;
    }
}
@media(min-width:992px){
    .portfolio-dossier-txt { 
        width:60%;
        font-size: 2rem;
    }
    .portfolio-dossier-img {
        width: calc(100vw / 3);

    }    
}



</style>
