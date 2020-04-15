// ./src/router.js
import Vue    from 'vue';
import Router from 'vue-router';

// Chargement des composants des différentes routes
import produitsIndex from './components/produits/index';
import produitsShow from './components/produits/show';

// Création du routing
Vue.use(Router)
export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: produitsIndex
    },
    {
        path: '/produits/:produitId',
        name: 'produits.show',
        component: produitsShow
      },
  ]
})