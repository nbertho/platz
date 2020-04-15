// ./src/router.js
import Vue    from 'vue'
import Router from 'vue-router'

// Chargement des composants des différentes routes
import testComponent from './components/ExampleComponent'

// Création du routing
Vue.use(Router)
export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: testComponent
    },
  ]
})