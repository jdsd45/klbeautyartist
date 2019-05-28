<template>

<form action="" v-on:submit.prevent="onSubmit" id="contact-form">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nom" v-model="form.nom" required>
            </div>
                <div class="col">
            <input type="text" class="form-control" placeholder="Prénom" v-model="form.prenom" required>
            </div>
        </div>
    </div> 
    <div class="form-group">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Téléphone" v-model="form.telephone">
            </div>
                <div class="col">
            <input type="email" class="form-control" placeholder="Email" v-model="form.email" required>
            </div>
        </div>  
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <textarea class="form-control" id="champ_message" placeholder="Votre message" rows="" v-model="form.message" required></textarea>
            </div>
        </div>                                             
    </div>
    <div>
        <button type="submit" class="btn btn-dark" id="btn_valider" >Envoyer</button>
    </div>
</form>

</template>

<script>
export default {
    name: 'FormContact',
    data () {
        return {
            form: {
                prenom: '',
                nom: '',
                telephone: '',
                email: '',
                message: ''
            }
        }
    },
    mounted() {
        let champ_message = document.getElementById('champ_message');
        if(window.screen.width < 576) {
            champ_message.rows = "6"
        } else {
            champ_message.rows = "10"
        }
    },
    methods: {
        onSubmit: function() {
            console.log('sendForm');
            this.postForm();
        },
        postForm: function(){
            console.log('postForm');
             axios({
                method:'post',
                url: 'back-php/index.php',
                data: this.form
            })
                .then(function(response){
                    console.log('reponse : ');
                    console.log(response.data);
                })
                .catch(function(error){
                    console.log('error');
                })             
        }
    }
}
</script>

<style>


</style>

