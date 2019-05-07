<template>

<form action="" v-on:submit.prevent="onSubmit">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nom" v-model="form.nom">
            </div>
                <div class="col">
            <input type="text" class="form-control" placeholder="Prénom" v-model="form.prenom">
            </div>
        </div>
    </div> 
    <div class="form-group">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Téléphone" v-model="form.telephone">
            </div>
                <div class="col">
            <input type="email" class="form-control" placeholder="Email" v-model="form.email">
            </div>
        </div>  
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <textarea class="form-control" id="champ_message" placeholder="Votre message" rows="12" v-model="form.message"></textarea>
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
    methods: {
        onSubmit: function() {
            console.log('sendForm');
            let json = JSON.stringify(this.form);
            this.postForm();
        },
        postForm: function(){
            let json = JSON.stringify(this.form);
            axios.post('back-php/message_controler.php', {
                dataForm: json
            })
                .then(function(response){
                    console.log('reponse!');
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

