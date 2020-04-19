<?php

namespace App\Http\Controllers;

use App\Http\Models\Produit as ProduitsMdl;
use Illuminate\Support\Facades\View;

/**
 * Controller des produits
 */
class ProduitsController extends Controller {

    /**
     * Index des 20 premiers produits
     *
     * @return  obj  renvois un objet json contenant les 20 premiers produits et leur catégorie correspondante (id, nom, slug, created_at, poids, image, description, categories_id, user_id, categories {id, nom, slug, image})
     */
    public function takeFirstTen() {
        $produits = ProduitsMdl::with('user', 'categories')->orderBy('id', 'desc')->limit(20)->get();
        return response()->json($produits);
    }

    /**
     * Index des produits restantes
     *
     * @return  obj  renvois un objet json contenant produits venant apres les 10 premiers et leur catégorie correspondante (id, nom, slug, created_at, poids, image, description, categories_id, user_id, categories {id, nom, slug, image})
     */
    public function takeAllButFirstTen() {
        $amount = ProduitsMdl::count() - 20;
        $produits = ProduitsMdl::with('user', 'categories')->where('id',  '<=',  $amount)->orderBy('id', 'desc')->get();
        return response()->json($produits);
    }
    
    
    /**
     * Index des produits
     *
     * @return  obj  renvois un objet json contenant tous les produits et leur catégorie correspondante (id, nom, slug, created_at, poids, image, description, categories_id, user_id, categories {id, nom, slug, image})
     */
    public function index() {
        $produits = ProduitsMdl::with('user', 'categories')->get();
        return response()->json($produits);
    }

}