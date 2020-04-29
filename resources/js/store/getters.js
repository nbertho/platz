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
    getProduitById : (state) => (idProduit) => {
        return state.produits.find(data => data.id == idProduit);
    },
    getProduitsRelated : (state) => (idProduit, idCategorie) => {
        let arrayToReturn = [];
        state.produits.forEach(item => {
            if (arrayToReturn.length < 4 && item.id != idProduit && item.categories_id == idCategorie) {
                arrayToReturn.push(item);
            }
        });
        return arrayToReturn;
    },
    getProduitsFiltre(state) {
        return state.produitsFiltre;
    },
    getGlobalVariables(state) {
        return state.globalVariables;
    },
    getSearch(state) {
        return state.search;
    },
};

export default getters;