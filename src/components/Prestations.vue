<template>
    <div>
        <PrestationsMenu
        v-bind:currentcategory="currentcategory"
        v-on:updatecategorie="updatecategorie"
        ></PrestationsMenu>
        <PrestationsItems
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

</style>
