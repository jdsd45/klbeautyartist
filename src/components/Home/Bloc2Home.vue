<template>
    <div id="bloc-2-Home" class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm home-cont-item"
                    v-for="categorie in categoriesPrestations"
                    :key="categorie.id"
                    :id="'home-cont' + categorie.id"
                >
                <router-link :to="'/prestations/'+categorie.url" class="rubrique-home">
                    <img class="img-home-bloc2 rounded mx-auto d-block" :src="categorie.lien_img">
                    <h2 class="rubrique-titre"> {{ categorie.titre }} </h2>
                </router-link>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
</template>

<script>
export default {
    name: 'Bloc2Home',
    data() {
        return {
            categoriesPrestations: null
        }
    },
    created: function() {
        axios
            .get('http://localhost/projet-keslene/src/back-php/index.php?q=categories')
            //.get('back-php/index.php?q=categories')
            .then(response => (this.categoriesPrestations = response.data))
    },     
}
</script>

<style>
    .img-home-bloc2 + h2{
        text-align: center;
        color: black;
        text-decoration:none;
    }

    .img-home-bloc2 {
        width: 35vh;
        height: 28vh;
        object-fit: cover;
    }

    .rubrique-home h2{
        color: #C5A164;
        font-size: 1.5rem;
    }

    .rubrique-home:hover h2{
        color: black;
    }

    .rubrique-home:hover{
        text-decoration:none;
    }

    .img-home-bloc2 {
        opacity: 0.9;
        filter: grayscale(100%);
    }

    .rubrique-home:hover .img-home-bloc2 {
        opacity: 1;
        filter: grayscale(0%);
    }

</style>
