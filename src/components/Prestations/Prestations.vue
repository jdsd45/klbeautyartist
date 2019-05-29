<template>
    <div>
        <PrestationsMenu
            v-bind:currentcategory="currentcategory"
            v-on:updatecategorie="updatecategorie"
            >
            </PrestationsMenu>
        <div class="container" id="cont-prestations">
            <PrestationsItems 
            id="cont-prestation"
            v-bind:currentcategory="currentcategory"
            ></PrestationsItems>
        </div>
    </div>
</template>

<script>
import PrestationsMenu from '@/components/Prestations/PrestationsMenu'
import PrestationsItems from '@/components/Prestations/PrestationsItems'
//import prestations from '@/assets/prestations.json'
export default {
    name: 'Prestations',
    data () {
        return {
            currentcategory: ''
        }
    },
    components: {
        PrestationsMenu,
        PrestationsItems
    },
    created: function() {
        switch (this.$route.params.categorie) {
            case 'maquillage-semi-permanent':
                this.currentcategory = 'Maquillage semi-permanent';
            break;
            case 'maquillage-professionnel':
                this.currentcategory = 'Maquillage professionnel';
            break;
            case 'beaute-cils':
                this.currentcategory = 'Beauté des cils';
            break;
            default:
                this.currentcategory = 'Maquillage semi-permanent'
            break;
        }
    },
    methods: {
        updatecategorie: function(newVal) {
            this.currentcategory = newVal
        }                
    }
}
</script>

<style>

#cont-prestations {
    padding-bottom: 10px;
}

</style>
