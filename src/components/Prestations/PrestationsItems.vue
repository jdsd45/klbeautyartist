<template>
    <div id="list-prestations" class="row">
        <div class="col-md-12 cont-prestation"
            v-for="(prestation, index) in prestationsFiltrees"
            v-bind:id="'prestation-' + index"
            v-bind:key="index">
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
    computed : {
        prestationsFiltrees: function() {
            if(this.prestations != null) return this.prestations.filter(this.selectInCategories)
        }          
    },   
    created: function() {
        axios
            .get(process.env.BASE_URL + 'index.php?q=prestations')
            .then(response => (this.prestations = response.data))
    },                             
    methods: {
        selectInCategories: function(prestation) {
            return prestation.categorie == this.currentcategory
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
        color: var(--dore);
        margin-right: 20px;
    }

    .cont-prestation {
        text-align:center;
    }

    .cont-prest-infos {
        text-align: left;
    }
 
    .img-prestations {
        width:100%;
        max-height: 400px;
        object-fit: cover;
    } 

</style>


