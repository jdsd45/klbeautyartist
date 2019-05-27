<template>
    <div id="bloc-2-Home" class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-4 home-cont-item"
                    v-for="content in homeContent"
                    :key="content.id"
                    :id="'home-cont' + content.id"
                >
                <router-link :to="'/prestations/'+content.url" class="rubrique-home">
                    <img class="img-home-bloc2 rounded mx-auto d-block" :src="content.lien_img">
                    <h2 class="rubrique-titre"> {{ content.titre }} </h2>
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
            homeContent: null
        }
    },
    created: function() {
        axios
            .get('static/home_content.json')
            .then(response => (this.homeContent = response.data))        
    }
}
</script>

<style>
    .img-home-bloc2 + h2{
        text-align: center;
        color: black;
        text-decoration:none;
    }

    .img-home-bloc2 {
        max-width: 100%;
    }

    .rubrique-home h2{
        color: #C5A164;
        font-size: 1.5rem;
    }

    .rubrique-home:hover h2{
        color: #A164C5;
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
