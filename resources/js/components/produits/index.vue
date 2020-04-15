<template>
    <ul>
        <li v-for="produit in produits" :key="produit.id">
            <router-link :to="{ name: 'produits.show', params: { produitId: produit.id }}">{{ produit.nom }}</router-link>
        </li>
    </ul>
</template>

<script>
    export default {
        computed: {
            produits() {
                return this.$store.getters.getProduits
            }
        },
    }
</script>
