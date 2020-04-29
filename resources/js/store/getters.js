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
    getProduitsFilterd(state) {
       let arrayToReturn = [];
       if (state.search != '') {
            state.produits.forEach(produit => {
                let lowercaseName = produit.nom.toLowerCase();
                let lowercaseAuthor = produit.user.nom.toLowerCase();
                let lowercaseText = produit.description.toLowerCase();
                if (lowercaseName.includes(state.search.toLowerCase()) || lowercaseAuthor.includes(state.search.toLowerCase()) || lowercaseText.includes(state.search.toLowerCase())) {
                    arrayToReturn.push(produit);
                }
            });
       }
       else {
            state.produits.forEach(produit => {
                if (produit.categories_id == state.produitsFiltre || state.produitsFiltre == 0) {
                    arrayToReturn.push(produit);
                }
            });
       }
       return arrayToReturn;
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