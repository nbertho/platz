<template>

    <main>

    <div class="flex-order">

      <section id="infos" class="container-individual">
        <figure class="figure-aside">
          <img :src="global.publicPath + 'img/categories/'+ produit.categories.image + '.svg'" :alt=" produit.categories.nom ">
          <figcaption>
            <h1>{{ produit.nom }}</h1>
            <p>{{ produit.created_at }} by {{ produit.user.nom }}</p>
          </figcaption>
        </figure>
        <figure class="figure-main">
          <img :src="global.publicPath + 'img/produits/'+ produit.image + '.jpg'" alt="">
        </figure>
      </section>

      <section id="details" class="container-individual">
        <figure class="">
          <img :src="global.publicPath + 'img/single/icon-psdfile.svg'" alt="Photoshop">
          <figcaption>{{ produit.user.nom }}</figcaption>
        </figure>
        <figure>
          <img :src="global.publicPath + 'img/single/icon-weight.svg'" alt="Weight">
          <figcaption>{{ produit.poids }}</figcaption>
        </figure>
        <figure>
          <img :src="global.publicPath + 'img/single/icon-desc.svg'" alt="Description">
          <figcaption>{{ produit.description }}</figcaption>
        </figure>
        <figure>
          <img :src="global.publicPath + 'img/single/icon-download.svg'" alt="Download">
          <figcaption class="txt-style-bold">Download</figcaption>
        </figure>
      </section>

      <section id="comments" class="container-individual">
        <h2>Your comments</h2>
        <article v-for="commentaire in commentaires" :key="commentaire.id">
          <h3>{{ commentaire.nom }}</h3>
          <p>{{ commentaire.texte }}</p>
        </article>
        <form action="">
          <h2>Add your comment</h2>
          <textarea placeholder="Votre Message" name="message" rows="4" cols="30" maxlength="500"></textarea>
          <input type="submit" value="Envoyer">
        </form>
      </section>

      <section id="related" class="container-individual grid">
        <h2>More from {{ produit.categories.nom }}</h2>
        <article class="col-xs-6" v-for="relatedProduct in relatedProducts" :key="relatedProduct.id">

          <router-link :to="{ name: 'produits.show', params: {produitId: relatedProduct.id } }">
            <figure><img :src="global.publicPath + 'img/produits/'+ relatedProduct.image + '.jpg'" :alt="relatedProduct.nom"></figure>
          </router-link>
        
        </article>

      </section>

    </div>

    <h1 class="logo-accueil">burstfly</h1>

  </main>
              
</template>

<script>
    import Axios from "axios";
    export default {
        data() {
            return {
                commentaires: [],
            }
        },
        computed: {
            global() {
                return this.$store.getters.getGlobalVariables
            },
            produit() {
                let produitArray =  this.$store.getters.getProduits;
                return produitArray.find(data => data.id == this.$route.params.produitId);
            },
        },
        created() {
            // Charger le produit si il n'est pas présent dans le store
            if (this.$store.getters.getProduits.find(data => data.id == this.$route.params.produitId) == undefined) {
                this.$store.dispatch('setProduitsMore');
            }

            // Charger les commentaires
            let url = 'api/commentaires/' + this.$route.params.produitId;
            Axios.get(url)
                .then(reponsePHP => (this.commentaires = reponsePHP.data));

        },
    }
</script>
