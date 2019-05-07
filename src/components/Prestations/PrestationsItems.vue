<template>
    <div id="list-prestations" class="row">
        <div class="col-md-4 cont-prestation"
            v-for="prestation in prestationsFiltrees"
            v-bind:id="'prestation-' + prestation.id"
            v-bind:key="prestation.id">
            <h3>{{ prestation.titre }} </h3>
            <div class="row">
                <div class="col-md">
                    <div class="cont-prest-img">
                        <img class="img-prestations" 
                        :src="prestation.lien_img">
                    </div>
                </div>
                <div class="col-md">
                    <div class="cont-prest-infos">
                        <span>Prix: {{ prestation.prix }} $ </span>
                    </div>
                    <div class="cont-prest-infos">
                        <span>Temps: {{ prestation.temps }}</span>
                    </div>
                </div>
            </div>
            <p>{{ prestation.detail }}</p>
        </div>
    </div>
</template>

<script>
import prestations from '@/assets/prestations.json'
export default {
    name: 'PrestationsItems',
    props: ['currentcategory'],    
    data () {
        return {
            prestations: prestations,
            currentCata: this.currentcategory
        }
    },
    methods: {
        selectInCategories: function(prestation) {
            return prestation.categorie == this.currentcategory
        }
    },
    computed : {
        prestationsFiltrees: function(prestations) {
            return this.prestations.filter(this.selectInCategories)
        }
    }                                
}
</script>

<style>
    .cont-prest-img {
        text-align:left;
    }
    .cont-prest-infos {
        text-align: left;
    }
    .img-prestations {
        max-width:100%;
    }
</style>


