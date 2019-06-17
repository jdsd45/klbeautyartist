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
            <div class="col">
                <textarea class="form-control" id="champ_message" placeholder="Votre message" rows="" v-model="form.message" required></textarea>
            </div>
        </div>                                             
    </div>
    <hr>
    <div id="cont-btn-submit">
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
            champ_message.rows = "8"
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
                url: process.env.BASE_URL + 'index.php',
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

#btn_valider{
    background-color: #C5A164;
    border: none;
    width:50%;
    box-shadow: inset 0 0 2px black;
}

#btn_valider:hover{
    background-color: rgb(169,169,169);
    box-shadow: inset 0 0 2px black;

}

#cont-btn-submit {
    margin-top: 30px;
    text-align: center;
}

</style>

