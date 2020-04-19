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
    setProduitsFirst ({commit}) {
        // Transaction
        Axios.get('api/produits/takeFirstTen')
            .then(reponsePHP => (commit('SET_PRODUITS_FIRST', reponsePHP.data)));
    },
    setProduitsMore ({commit}) {
        // Transaction
        Axios.get('api/produits/takeAllButFirstTen')
            .then(reponsePHP => (commit('SET_PRODUITS_MORE', reponsePHP.data)));
    },
};

export default actions;
