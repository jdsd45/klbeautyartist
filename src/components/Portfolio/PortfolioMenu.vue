<template>
    <div id="portfolio-dossier-cont">
        <div class="portfolio-dossier-cont-img"
            v-for="album in albums"
            v-bind:key="album.id">
            <router-link :to="'/portfolio/'+album.url">
                <div class="portfolio-dossier-txt">
                    {{ album.titre }} 
                </div>
                <img class="portfolio-dossier-img" 
                    :src="album.lien_img" 
                    :style="{height: heightContImgPortfolio}"
                    :alt="'Photographie de couverture de l\'album '+album.titre">
            </router-link>         
        </div>
    </div>
</template>

<script>
export default {
    name: 'PortfolioMenu',
    props: ['albums'],
    data() {
        return {
            heightContImgPortfolio: '20vh'
        }
    },
    methods: {
        setHeightContImgPortfolio () {
            let height;
            if(window.outerWidth > 991.98 && document.getElementById('portfolio-dossier-cont') != null) {
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
        z-index: 1000;
    } 

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
