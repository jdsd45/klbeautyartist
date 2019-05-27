<template>

<nav class="navbar navbar-expand-lg fixed-top" id="menu">
    <a class="navbar-brand" href="#">Keslène</a>
    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">   

        </span>
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
                <router-link to="/about"><a class="nav-link">A propos</a></router-link>
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


#menu {
    background-color : black;
}
.nav-item a, .navbar-brand {
    color: #C5A164;
}

.nav-item a:hover, .navbar-brand:hover {
    text-decoration: none;
    color: white;
}

.custom-toggler.navbar-toggler {
    border: none;
}

.custom-toggler .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
}
</style>
