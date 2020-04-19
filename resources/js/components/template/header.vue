<template>
    
    <header>

        <!-- LOGO HEADER -->
        <section id="logo-header">
            <div class="container">
                <div>
                    <router-link :to="{ name: 'index'}">
                        <figure>
                            <img :src="global.publicPath + 'img/autres/logo-burst.png'" alt="Logo Platz">
                        </figure>
                    </router-link>
                </div>
                <a href="#" class="menu-ham">&nbsp;</a>
                <form action="" method="get">
                    <input type="search" name="search-header" id="search">
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
                    <li><a href="#" v-on:click="changeFilterCategory(0)">Tous les produits</a></li>
                    <li v-for="cat in categories" :key="cat.id">
                        <a href="#" v-on:click="changeFilterCategory(cat.id)">{{cat.nom}}</a>
                    </li>
                </ul>
            </div>
        </section>      

    </header>


</template>

<script>
import store from '../../store/index.js';
    export default {
        methods: {
            changeFilterCategory(categoryId) {
                store.state.produitsFiltre = categoryId;
            }
        },
        computed: {
            global() {
                return this.$store.getters.getGlobalVariables
            },
            categories() {
                return this.$store.getters.getCategories
            },
            filtre() {
                return this.$store.getters.getProduitsFiltre
            }
        },
    }
</script>
