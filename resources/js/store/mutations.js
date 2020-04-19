let mutations = {
    SET_CATEGORIES(state, data) {
        state.categories = data;
    },
    SET_PAGES(state, data) {
        state.pages = data;
    },
    SET_PRODUITS_FIRST(state, data) {
        state.produits = data;
    },
    SET_PRODUITS_MORE(state, data) {
        data.forEach(item => {
            state.produits.push(item);
        });
    },
    SET_PRODUITS_FILTERS(state, data) {
        state.produitsFiltre = data;
    },
    
};

export default mutations;
