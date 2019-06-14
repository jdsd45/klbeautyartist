<template>
    <div class="container" id="cont-contact">
        <div class="row" id="">
            <div class="col-md-12" v-if="content != null">
                <h2>Me contacter</h2>
                <div class="row">
                    <div class="col-md-6" id="carte">
                        <Carte></Carte>
                    </div>
                    <div class="col-md-6" id="contact_haut_droite">
                        <p v-for="(paragraphe, index) in splitParagraphes(content.content_1)" v-bind:key="index">
                            {{ paragraphe }}
                        </p>                        
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-7" id="contact_bas_gauche">
                        <p v-for="(paragraphe, index) in splitParagraphes(content.content_2)" v-bind:key="index">
                            {{ paragraphe }}
                        </p>   
                    </div>
                    <div class="col-md-5">
                        <img :src="content.lien_img" alt="Photographie du salon où je réalise mes prestations" id="img-salon">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2>Formulaire de contact</h2>
                <FormContact></FormContact>
            </div>
        </div>
    </div>
</template>

<script>
import Carte from '@/components/Contact/Carte'
import FormContact from '@/components/Contact/FormContact'

export default {
    name: 'Contact',
    data() {
        return {
            content : null
        }
    },
    components: {
        Carte, 
        FormContact
    },
    created: function() {
        document.title = 'A propos de Keslène DENIS'
        axios
            .get('http://localhost/projet-keslene/src/back-php/index.php?q=contact')
            //.get('back-php/index.php?q=contact')
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

#img-salon {
    max-width:100%;
}

#cont-contact {
    padding-bottom: 10px;
}

</style>

