<template>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Keslène</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <router-link to="/"><a class="nav-link">Accueil</a></router-link>
            </li>
            <li class="nav-item">
                <router-link to="/prestations"><a class="nav-link">Prestations</a></router-link>
            </li>
            <li class="nav-item">
                <router-link to="/contact"><a class="nav-link">Me contacter</a></router-link>
            </li>
            <li class="nav-item">
                <router-link to="/keslene"><a class="nav-link">A propos</a></router-link>
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
