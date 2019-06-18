<template>
    <div id="map">
    </div>                                               
</template>

<script>
export default {
    name: 'Carte',
    data: function() {
        return {
            lat : 48.902799,
            lon : 2.155457,
            macarte : null
        }
    },
    mounted: function() {
        this.macarte = L.map('map').setView([this.lat, this.lon], 11);
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
    height: 300px;
}
</style>

