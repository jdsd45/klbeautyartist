<template>
    <div>
        <PrestationsMenu
            v-bind:currentcategory="currentcategory"
            v-bind:categories="categories"
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
            currentcategory: '',
            categories: null
        }
    },
    components: {
        PrestationsMenu,
        PrestationsItems
    },
    async created() {
        try {
            let response = await axios.get('http://localhost/projet-keslene/src/back-php/index.php?q=categories')
            //let response = await axios.get('back-php/index.php?q=categories')
            this.categories = response.data

            let route = this.$route.params.categorie;
            if(this.$route.params.categorie) {
                this.categories.forEach(element => {
                    if(element.url == this.$route.params.categorie) {
                        this.currentcategory = element.nom
                    }
                });
            } else {
                this.currentcategory = this.categories[0].nom
            }
        } catch (error) {

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
