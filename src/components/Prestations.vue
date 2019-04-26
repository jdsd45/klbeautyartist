<template>
    <div id="list-prestations">
        <div v-bind:id="'prestation-' + prestation.id"
            v-for="prestation in prestations"
            v-bind:key="prestation.id">
            <h3>{{ prestation.titre }} </h3>
            <span>Prix: {{ prestation.prix }} $ </span>
            <span>Temps: {{ prestation.temps }}</span>
            <p>{{ prestation.detail }}</p>
        </div>
    </div>
</template>

<script>
import prestations from '@/assets/prestations.json'
export default {
    name: 'Prestations',
    data () {
        return {
            prestations: prestations
        }
    }                                                
}
</script>

<style>

</style>


