<?php

namespace App\Http\Controllers;

use App\Http\Models\Produit as ProduitsMdl;
use Illuminate\Support\Facades\View;

/**
 * Controller des produits
 */
class ProduitsController extends Controller {

    /**
     * Index des produits
     *
     * @return  obj  renvois un objet json contenant tous les produits et leur catégorie correspondante (id, nom, slug, created_at, poids, image, description, categories_id, user_id, categories {id, nom, slug, image})
     */
    public function index() {
        $produits = ProduitsMdl::with('user')->get();
        return response()->json($produits);
    }

}