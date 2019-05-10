<template>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img :src="donnees.lien_img" alt="Photographie de Keslène DENIS" id="img-keslene">
            </div>
            <div class="col-md-7">
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
    #img-keslene{
        max-width:100%;
    }
</style>


