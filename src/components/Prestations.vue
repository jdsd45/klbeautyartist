<template>
    <div>
        <PrestationsMenu></PrestationsMenu>
        <div>
            <!-- <p>cat niveau parent : {{ curentcat }}</p> -->
        </div>
        <PrestationsItems></PrestationsItems>
    </div>
</template>

<script>
import PrestationsMenu from '@/components/PrestationsMenu'
import PrestationsItems from '@/components/PrestationsItems'
import prestations from '@/assets/prestations.json'
export default {
    name: 'Prestations',
    data() {
        return {
            currentcat: ''
        }
    },
    components: {
        PrestationsMenu,
        PrestationsItems
    },
    methods: {
        updatecategorie(val) {
            console.log('updateCurrentCat')
        }       
    }
}
</script>

<style>

</style>
