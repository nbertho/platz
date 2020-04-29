<template>
    
<main>

        <!-- Articles -->
        <section id="products" class="container grid">

            <div v-if="searchResult != ''">
                <h1>Résultats de la recherche de : {{ searchResult }}</h1>
                <br>

            </div>


            <article class="article col-xs-12 col-s-6 col-m-4 col-xl-3" v-for="produit in produits.slice(showStart, showAmount)" :key="produit.id">
                <router-link :to="{ name: 'produits.show', params: {produitId: produit.id } }">
                    <figure>
                        <img :src="global.publicPath + 'img/produits/' + produit.image + '.jpg'" alt="Wordpress theme">
                        <figcaption>{{produit.description}}</figcaption>
                    </figure>
                </router-link>
                <div>
                    <figure>
                        <img :src="global.publicPath + 'img/categories/'+ produit.categories.image + '.svg'" alt="Photoshop">
                        <figcaption></figcaption>
                    </figure>
                    <h2>{{ produit.categories.nom }}</h2>
                </div>
            </article>

        </section>

        <!-- PAGINATE -->
        <section id="pagination">
            <a href="#" @click="showLess"><img :src="global.publicPath + 'img/autres/prev.svg'" alt="Previous"></a>
            <a href="#" @click="showMore"><img :src="global.publicPath + 'img/autres/next.svg'" alt="Next"></a>
        </section>

        <h1 class="logo-accueil">platz</h1>

    </main>

</template>

<script>
    export default {
        data () {
            return {
                showStart: 0,
                showAmount: 20,
            }
        },
        methods: {
            // Affiche les 20 produits suivants
            showMore: function() {
                this.showStart = this.showStart + 20
                this.showAmount = this.showAmount + 20
            },
            // Affiche les 20 produits précédants
            showLess: function() {
                this.showStart = this.showStart - 20
                this.showAmount = this.showAmount - 20
            },
        },
        beforeUpdate() {
            // Empeche l'affichage du nombre de produit de descendre en dessous de 0
            if ( this.showStart < 0) {
                this.showStart = 0;
                this.showAmount = 20;
            }
        },
        computed: {
            searchResult() {
                return this.$store.getters.getSearch
            },
            // Sélectionne les produits correspondant à la categorie envoyée par le header dans le store
            produits() {
                return this.$store.getters.getProduitsFilterd;
                this.showStart = 0;
                this.showAmount = 20;
            },
            // Va chercher les variables globalVariables du store
            global() {
                return this.$store.getters.getGlobalVariables
            },
        },
    };
</script>
