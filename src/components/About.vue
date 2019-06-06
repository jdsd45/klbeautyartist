<template>
    <div class="container">
        <h2>Keslène DENIS</h2>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img :src="content.lien_img" alt="Photographie de Keslène DENIS" id="img-keslene">
            </div>
            <div class="col-md-7 about-par">
                <p v-for="(paragraphe, index) in splitParagraphes(content.content)" v-bind:key="index">
                    {{ paragraphe }}
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
            content: ''
        }
    },
    created: function() {
        axios
            //.get('http://localhost/projet-keslene/src/back-php/index.php?q=about')
            .get('back-php/index.php?q=about')
            .then(response => (this.content = response.data))
   },
    methods: {
        splitParagraphes : function(content) {
            return content.split('\n')
        }   
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


