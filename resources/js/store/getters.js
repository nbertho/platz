let getters = {
    getCategories(state) {
        return state.categories;
    },
    getPages(state) {
        return state.pages;
    },
    getProduits(state) {
        return state.produits;
    },
    getProduitsFiltre(state) {
        return state.produitsFiltre;
    },
    getGlobalVariables(state) {
        return state.globalVariables;
    },
};

export default getters;