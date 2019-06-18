<template>
    <div>
        <PrestationsMenu
            v-bind:currentcategory="currentcategory"
            v-bind:categories="categories"
            v-on:updatecategory="updatecategory">
            </PrestationsMenu>
        <div class="container" id="cont-prestations">
            <PrestationsItems id="cont-prestation" v-bind:currentcategory="currentcategory"></PrestationsItems>
        </div>
    </div>
</template>

<script>
import PrestationsMenu from '@/components/Prestations/PrestationsMenu'
import PrestationsItems from '@/components/Prestations/PrestationsItems'
export default {
    name: 'Prestations',
    data () {
        return {
            currentcategory: null,
            categories: null
        }
    },
    components: {
        PrestationsMenu,
        PrestationsItems
    },    
    async created() {
        document.title = 'Prestations : maquillage professionnel, semi-permanent, cils'
        let response = await axios.get(process.env.BASE_URL + 'index.php?q=categories')
        this.categories = response.data
        let route = this.$route.params.categorie;
        if(route) {
            this.categories.forEach(e => {
                if(e.url == route) {
                    this.currentcategory = e.titre
                }
            });
        } else {
            this.currentcategory = this.categories[0].titre
        }
    },
    methods: {
        updatecategory: function(newVal) {
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
