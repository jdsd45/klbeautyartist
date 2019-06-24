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
                    <img class="img-home-bloc2 rounded mx-auto d-block" :src="categorie.lien_img" :alt="'Photographie de la catégorie '+categorie.titre">
                    <h2 class="rubrique-titre"> {{ categorie.titre }} </h2>
                </router-link>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
<iframe id="video-fb" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fklbeautyartist%2Fvideos%2F322605641766144%2F&show_text=0&width=476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
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
            .get(process.env.BASE_URL + 'index.php?q=categories')
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
/*         width: 35vh; */
        width:100%;
        height: 30vh;
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

    #video-fb {
        max-width: 100%;
        height: 300px;
    }

</style>
