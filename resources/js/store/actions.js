import Axios from "axios";

let actions = {
    setCategories ({commit}) {
        // Transaction
        Axios.get('api/categories')
            .then(reponsePHP => (commit('SET_CATEGORIES', reponsePHP.data)));
    },
    setProduits ({commit}) {
        // Transaction
        Axios.get('api/produits')
            .then(reponsePHP => (commit('SET_PRODUITS', reponsePHP.data)));
    },
};

export default actions;
