<template>
    <div class="container">
        <h2>Keslène DENIS</h2>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img :src="donnees.lien_img" alt="Photographie de Keslène DENIS" id="img-keslene">
            </div>
            <div class="col-md-7 about-par">
                <p v-for="content in donnees.contents" v-bind:key="content.index">
                    {{ content }}
                </p>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'About',
    data() {
        return {
            donnees: ''
        }
    },
    created: function() {
        axios
            .get('static/a-propos_content.json')
            .then(response => (this.donnees = response.data))
   }                                             
}
</script>

<style>

@media(min-width:767px){
    .about-par {
        line-height: 150%;
        padding-left: 10%;
    }
    .about-par {
        margin-bottom:15px;
    }    
}

@media(min-width:1200px){
    .about-par {
        line-height: 180%;
    }
}    

    #img-keslene{
        max-width:100%;
    }
</style>


