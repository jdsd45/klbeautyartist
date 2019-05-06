<template>

<form action="">
    <div class="form-group">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name">
            </div>
                <div class="col">
            <input type="text" class="form-control" placeholder="Last name">
            </div>
        </div>
    </div> 
    <div class="form-group">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name">
            </div>
                <div class="col">
            <input type="text" class="form-control" placeholder="Last name">
            </div>
        </div>  
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <textarea class="form-control" id="champ_message" placeholder="Votre message" rows="12"></textarea>
            </div>
        </div>                                             
    </div>
    <div>
        <button type="button" class="btn btn-dark" id="btn_valider">Envoyer</button>
    </div>
</form>

</template>

<script>
export default {
    name: 'FormContact'
}
</script>

<style>

</style>

