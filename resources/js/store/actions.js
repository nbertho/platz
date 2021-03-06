import Axios from "axios";

let actions = {
    setCategories ({commit}) {
        // Transaction
        Axios.get('api/categories')
            .then(reponsePHP => (commit('SET_CATEGORIES', reponsePHP.data)));
    },
    setPages ({commit}) {
        // Transaction
        Axios.get('api/pages')
            .then(reponsePHP => (commit('SET_PAGES', reponsePHP.data)));
    },
    setProduits ({commit}) {
        // Transaction
        Axios.get('api/produits')
            .then(reponsePHP => (commit('SET_PRODUITS', reponsePHP.data)));
    },
    setProduitsFiltre ({commit}, data) {
        commit('SET_PRODUITS_FILTRES', data);
    },
    setSearch ({commit}, data) {
        commit('SET_SEARCH', data);
    },
};

export default actions;
