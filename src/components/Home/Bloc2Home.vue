<template>
    <div id="bloc-2-Home" class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-4 home-cont-item"
                    v-for="content in homeContent"
                    :key="content.id"
                    :id="'home-cont' + content.id"
                >
                <router-link :to="'/prestations/'+content.url">
                    <img class="img-home-bloc2 rounded mx-auto d-block" :src="content.lien_img">
                    <h2 class=""> {{ content.titre }} </h2>
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
            .get(this.$store.state.baseUrl + 'static/home_content.json')
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
</style>
