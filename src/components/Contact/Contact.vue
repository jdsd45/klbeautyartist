<template>
    <div class="container">
        <div class="row" id="cont-contact">
            <div class="col-md-12" v-if="donnees != null">
                <h2>Me contacter</h2>
                <div class="row">
                    <div class="col-md-6" id="carte">
                        <Carte></Carte>
                    </div>
                    <div class="col-md-6" id="contact_haut_droite">
                        <p v-for="content in donnees.contents.haut_droite" :key="content.index">
        
                            {{ content }}
                        </p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-7" id="contact_bas_gauche">
                        <p v-for="content in donnees.contents.bas_gauche" :key="content.index"> 
                            {{ content }}
                        </p>
                    </div>
                    <div class="col-md-5">
                        <img :src="donnees.lien_img" alt="Photographie du salon où je réalise mes prestations" id="img-salon">
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
            donnees : null
        }
    },
    components: {
        Carte, 
        FormContact
    },
    created: function() {
        axios
            .get('static/contact_content.json')
            .then(response => (this.donnees = response.data))
    }
}
</script>


<style>

#img-salon {
    max-width:100%;
}

</style>

