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
        <article v-for="commentaire in produit.commentaires" :key="commentaire.id">
          <h3>{{ commentaire.user.nom }}</h3>
          <p>{{ commentaire.texte }}</p>
        </article>
        <article v-for="comment in commentaireAdded" :key="comment.id">
          <h3>{{ comment.user }}</h3>
          <p>{{ comment.texte }}</p>
        </article>
        <form v-on:submit.prevent>
          <h2>Add your comment</h2>
          <textarea v-model="commentaire" placeholder="Votre Message" name="message" rows="4" cols="30" maxlength="500"></textarea>
          <input type="submit" value="Envoyer" @click="submitForm()">
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
          commentaire: '',
          commentaireAdded: [],
          commentaireAddedAmount: 0
        }
      },
      computed: {
        // Va chercher les variables globalVariables du store
        global() {
            return this.$store.getters.getGlobalVariables
        },
        // Va chercher le produit ayant l'id presente dans l'url dans le store
        produit() {
          return this.$store.getters.getProduitById(this.$route.params.produitId);
        },
        // Trouve les produits etant dans la meme categories que le produit affiche
        relatedProducts() {
          return this.$store.getters.getProduitsRelated(this.$route.params.produitId, this.produit.categories_id);
        }
      },
      methods: {
        // Ajoute un commentaire à la db et un "faux" commentaire a la suite (Vu qu'il n'y a pas de connexion à faire, l'utilisateur sera ici toujours l'utilisateur avec l'id 1 )
        submitForm() {
          // Si le formulaire n'est pas vide
          if (this.commentaire != '') {
            let data = { texte: this.commentaire,
                          userId: 1, 
                          produitId: this.produit.id,};
            // Requete axios
            Axios.put('api/commentaires/create', data)
              .then(reponsePHP => {
                this.commentaire = '';
                let fakeComment = {
                  user: 'John Doe',
                  texte: data.texte
                }
                this.commentaireAdded.push(fakeComment);
              });
          }
          else {
            alert('Vous ne pouvez pas publier de commentaire vide')
          }
        }
      }
    }
</script>
