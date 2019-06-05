<template>
    <div id="list-prestations" class="row">
        <div class="col-md-12 cont-prestation"
            v-for="prestation in prestationsFiltrees"
            v-bind:id="'prestation-' + prestation.id"
            v-bind:key="prestation.id">
            <hr>
            <h3 class="prest-titre">{{ prestation.titre }} </h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="cont-prest-img">
                        <img class="img-prestations" 
                        :src="prestation.lien_img">
                    </div>
                </div>
                <div class="col-md-6 cont-prest-infos">
                    <div>
                        <div class="infos-gen">
                            <span class="infos-prix">
                                {{ prestation.prix }} €
                            </span>
                            <span class="infos-temps">
                                {{ prestation.temps }}
                            </span>
                        </div>
                        <p class="prest-detail">
                            {{ prestation.detail }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PrestationsItems',
    props: ['currentcategory'],       
    data () {
        return {
            prestations: null
        }
    },
    methods: {
        selectInCategories: function(prestation) {
            return prestation.categorie == this.currentcategory
        },

    },
/*     created: function() {
        axios
            .get('/static/prestations.json')
            .then(response => (this.prestations = response.data))
    }, */
    created: function() {
        axios
            .get('http://localhost/projet-keslene/src/back-php/index.php?q=prestations')
            .then(response => (this.prestations = response.data))
    }, 
    computed : {
        prestationsFiltrees: function() {
            if(this.prestations != null) return this.prestations.filter(this.selectInCategories)
        }
    }                                
}
</script>

<style>

@media(min-width:767px){
    .prest-detail {
        line-height: 150%;
        padding-top:2%;
        padding-bottom:10%;
        padding-right: 10%;
    }
    .prest-titre {
        margin-bottom:15px;
    }    
}

@media(min-width:1200px){
    .prest-detail {
        line-height: 200%;
    }
}

    .infos-prix, .infos-temps {
        font-size: 1.7rem;
        color: #C5A164;
        margin-right: 20px;
    }

    .cont-prestation {
        text-align:center;
    }

    .cont-prest-infos {
        text-align: left;
    }


 
    .img-prestations {
        max-width:100%;
/*         object-fit: cover; */
    } 

</style>


