let mutations = {
    SET_CATEGORIES(state, data) {
        state.categories = data;
    },
    SET_PAGES(state, data) {
        state.pages = data;
    },
    SET_PRODUITS(state, data) {
        state.produits = data;
    },
    SET_PRODUITS_FILTERS(state, data) {
        state.produitsFiltre = data;
    },
    
};

export default mutations;
