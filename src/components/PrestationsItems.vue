<template>
    <div id="list-prestations" class="row">
        <div class="col-md-4 cont-prestation"
            v-bind:id="'prestation-' + prestation.id"
            v-for="prestation in prestationsFiltrees"
            v-bind:key="prestation.id">
            <h3>{{ prestation.titre }} </h3>
            <h4>categorie : {{ currentcat }} </h4>
            <div class="row">
                <div class="col-md">
                    <div class="cont-prest-img">
                        <img src="https://via.placeholder.com/400" class="img-prestations">
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
    data () {
        return {
            prestations: prestations,
            currentCata: 'Maquillage professionnel'
        }
    },
    props: ['currentcat'],    
    methods: {
        selectInCategories: function(prestation) {
            return prestation.categorie == this.currentCata
        }
    },
    computed : {
        prestationsFiltrees: function(prestations) {
            return this.prestations.filter(this.selectInCategories)
        }
    },
    mounted() {
        //console.log('test 3')
        //console.log(this.currentcat)
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


