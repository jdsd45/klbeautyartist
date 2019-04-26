<template>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Keslène</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" v-on:click.prevent="open('accueil')">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Prestations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Me contacter</a>
            </li>

        </ul>
    </div>
</nav>

</template>

<script>
export default {
    name: 'Menu'
}
</script>

<style>

</style>
