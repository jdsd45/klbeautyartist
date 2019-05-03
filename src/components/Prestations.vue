<template>
    <div>
        <PrestationsMenu
        v-bind:currentcategory="currentcategory"
        v-on:updatecategorie="updatecategorie"
        ></PrestationsMenu>
        <PrestationsItems 
        id="cont-prestations"
        v-bind:currentcategory="currentcategory"
        ></PrestationsItems>
    </div>
</template>

<script>
import PrestationsMenu from '@/components/PrestationsMenu'
import PrestationsItems from '@/components/PrestationsItems'
import prestations from '@/assets/prestations.json'
export default {
    name: 'Prestations',
    data () {
        return {
            currentcategory: 'Maquillage semi-permanent'
        }
    },
    components: {
        PrestationsMenu,
        PrestationsItems
    },
    methods: {
        updatecategorie: function(newVal) {
            this.currentcategory = newVal
            console.log('updateCurrentCat')
        }       
    }
}
</script>

<style>
/*     #cont-prestations {
        padding-left:10px;
        padding-right:10px;
    } */
</style>
