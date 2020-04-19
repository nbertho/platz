<template>
    
    <header>

        <!-- LOGO HEADER -->
        <section id="logo-header">
            <div class="container">
                <div>
                    <router-link :to="{ name: 'index'}">
                        <figure v-on:click="resetToHome()">
                            <img :src="global.publicPath + 'img/autres/logo-burst.png'" alt="Logo Platz">
                        </figure>
                    </router-link>
                </div>
                <a href="#" class="menu-ham">&nbsp;</a>
                <form v-on:submit.prevent>
                    <input @input="searchHeader" type="text" id="search">
                </form>
            </div>
        </section>

        <!-- FILTERS -->
        <section id="filters-desktop">
            <div class="container">
                <ul>
                    <li v-for="cat in categories" :key="cat.id">
                        <a href="#" v-on:click="changeFilterCategory(cat.id)">
                            <figure><img :src="global.publicPath + 'img/categories/' + cat.image + '.svg'" :alt="cat.nom" ></figure>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- FILTERS MOBILE -->
        <section id="filters-mobile">
            <div id="blank-space">&nbsp;</div>
            <div id="menu-mobile" class="">
                <div class="cross-menu">&nbsp;</div>
                <figure>
                    <img :src="global.publicPath + 'img/autres/small-logo.svg'" alt="Burstfly">
                </figure>
                <ul>
                    <li v-on:click="changeFilterCategory(0)">Toutes les categories</li>
                    <li v-for="cat in categories" :key="cat.id">
                        <router-link to="/">
                            <div v-on:click="changeFilterCategory(cat.id)">{{cat.nom}}</div>
                        </router-link>
                    </li>
                </ul>
            </div>
        </section>      

    </header>

</template>

<script>
    export default {
        methods: {
            // Renvois vers la page d'accueil sans filtres actifs
            resetToHome() {
                this.$store.dispatch('setProduitsFiltre', 0);
                this.$store.dispatch('setSearch', '');
                document.getElementById('search').value ="";
            },
            // Change le filtrage de la page d'accueil dans le store en l'id de la categorie (ou 0 pour toutes les categories)
            changeFilterCategory(categoryId) {
                if (categoryId == this.$store.getters.getProduitsFiltre) {
                    this.$store.dispatch('setProduitsFiltre', 0);
                }
                else {
                    this.$store.dispatch('setProduitsFiltre', categoryId);
                }
            },
            searchHeader(input) {
                this.$store.dispatch('setSearch', input.target.value);
            },
        },
        computed: {
            // Va chercher les variables globalVariables du store
            global() {
                return this.$store.getters.getGlobalVariables
            },
            // Va chercher les variables categories du store
            categories() {
                return this.$store.getters.getCategories
            },
        },
    }
</script>
