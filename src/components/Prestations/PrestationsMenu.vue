<template>
    <div id="prestationsMenu">
        <ul id='list-cat-prestations'>
            <li class="item-cat-prestations" 
            v-for="(categorie, index) in categories"
            v-bind:categorie="categorie"
            v-bind:index="index"
            v-bind:key="index"
            v-bind:class="{ catSelected: currentcategory === categorie.titre }"
            v-on:click="$emit('updatecategory', categorie.titre)">
                {{categorie.titre}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'PrestationsMenu',
    props: ['currentcategory', 'categories'],
}
</script>

<style>
#list-cat-prestations {
    list-style-type: none;
    width: 100%;
    text-align: center;
    padding-left: 0;
    padding-right: 0;
    padding-top: 15px;
    padding-bottom: 15px;
    margin-bottom:0;
    white-space: nowrap;  
    overflow-x: auto;
    cursor: pointer;
    user-select: none;
    background-color: #F1F1F1;
    }

.item-cat-prestations {
    display: inline;
    text-align: center;
    padding-left: 3%;
    padding-right: 3%;  
    padding-bottom: 8px;
    padding-top: 8px;
    background-color: var(--dore);
    border-radius: 5px;
    margin-right:6px;
    margin-left: 6px;
    color:white;
    box-shadow: inset 0 0 3px white;
    }

.catSelected {
    background-color: white;
    border-bottom: 3px solid var(--dore);  
    color: var(--dore);
    box-shadow: inset 0 0 5px var(--dore);
    }

.item-cat-prestations:not(.catSelected):hover {
    border-bottom: 3px solid var(--dore);  
    background-color: #EDCF9C;
    }
</style>
