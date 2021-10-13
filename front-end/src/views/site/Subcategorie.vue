<template>
    <div>
        <!-- <SubcategorieComponent /> -->
        <h5>Subcategorias {{id_categorie}}</h5>
    </div>
</template>

<script>
    //import SubcategorieComponent from '../../components/site/SubcategorieComponent.vue';
    
    export default {
        name: "Subcategorie",
        components: { 
            //SubcategorieComponent 
        },
        mounted() {
            let id_categorie = this.$route.params.id_categorie;
            return id_categorie;
        },
    }
</script>

<style>

</style>