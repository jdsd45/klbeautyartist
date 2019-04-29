<template>
    <div id="map">
        <p>voici la carte!!!</p>
    </div>                                               
</template>

<script>
export default {
    name: 'Carte',
    data: function() {
        return {
            lat : 47.471134,
            lon : -0.551890,
            macarte : null
        }
    },
    mounted: function() {
        this.macarte = L.map('map').setView([this.lat, this.lon], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(this.macarte);
        let marker = L.marker([this.lat, this.lon]).addTo(this.macarte);
    }    
}

</script>

<style>
#map {
    height: 400px;
}
</style>

