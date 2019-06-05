<template>
    <div id="prestationsMenu">
        <ul id='list-cat-prestations'>
            <li class="item-cat-prestations" 
            v-for="(categorie, index) in categories"
            v-bind:categorie="categorie"
            v-bind:index="index"
            v-bind:key="index"
            v-bind:class="{ catSelected: currentcategory === categorie.nom }"
            v-on:click="$emit('updatecategorie', categorie.nom)">
                {{categorie.nom}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'PrestationsMenu',
    props: ['currentcategory', 'categories'],
    //props: ['currentcategory'],
/*     data () {
        return {
            categories: [
                {name: 'Maquillage semi-permanent'}, 
                {name: 'Maquillage professionnel'}, 
                {name: 'Beauté des cils'}
            ]        
        }
    } */
    mounted: function() {
/*         console.log('test ');
        console.log(this.currentcategory); */
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
        padding-top: 15px;
        padding-bottom: 10px;
        margin-bottom:0;
        white-space: nowrap;  
        overflow-x: auto;
        cursor: pointer;
        user-select: none;
        }

    .item-cat-prestations {
        display: inline;
        text-align: center;
        padding-left: 3%;
        padding-right: 3%;  
        padding-bottom: 8px;
        padding-top: 8px;
        background-color: #C5A164;
        border-radius: 5px;
        margin-right:6px;
        margin-left: 6px;
        color:white;
        box-shadow: inset 0 0 3px white;

        }

    .catSelected {
        background-color: white;
        border-bottom: 3px solid #C5A164;  
        color: #C5A164;
        box-shadow: inset 0 0 5px #C5A164;
    }

    .item-cat-prestations:not(.catSelected):hover {
        border-bottom: 3px solid #C5A164;  
        background-color: rgb(169,169,169);
    }

</style>
