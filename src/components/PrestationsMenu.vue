<template>
    <div id="prestationsMenu">
        <ul id='list-cat-prestations'>
            <li class="item-cat-prestations" 
            v-for="(categorie, index) in categories"
            v-bind:categorie="categorie"
            v-bind:index="index"
            v-bind:key="index"
            v-bind:class="{ catSelected: currentCat === categorie.name }"
            v-on:click.stop="display(index)">
                {{categorie.name}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'PrestationsMenu',
    data () {
        return {
            categories: [
                {name: 'Maquillage semi-permanent'}, 
                {name: 'Maquillage professionnel'}, 
                {name: 'Beauté des cils'}
            ],
            currentCat: false
        }
    },
    methods: {
        display: function(i) {
            this.currentCat = this.categories[i].name
        }
    }
}
</script>

<style>
#list-cat-prestations {
    list-style-type: none;
    width: 100%;
    text-align: center;
    padding-left: 0;
    padding-right: 0;
    }

.item-cat-prestations {
    display: inline;
    text-align: center;
    padding-left: 5%;
    padding-right: 5%;  
    white-space: nowrap;  
    padding-top: 10px;
    padding-bottom: 10px;
    }

.catSelected {
    border-bottom: 3px solid red;
}
</style>
