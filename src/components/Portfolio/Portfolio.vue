<template>
    <div id="portfolio-cont">
        <div class="container-fluid">
            <h2>Maquillage beauté</h2>
        </div>
        <PortfolioMenu v-bind:albums="albums"></PortfolioMenu>
    </div>
</template>

<script>
import PortfolioMenu from '@/components/Portfolio/PortfolioMenu'
export default {
    name: 'Portfolio',
    components: {
        PortfolioMenu
    },
    data () {
        return {
            albums: null 
        }
    },
    created() {
        document.title = 'Mon Portfolio'
        axios
            .get(process.env.BASE_URL + 'index.php?q=albums')
            .then(response => (this.albums = response.data))        
    },    
}
</script>

<style>


</style>


