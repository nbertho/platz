<?php

namespace App\Http\Controllers;

use App\Http\Models\Categorie as CategoriesMdl;
use Illuminate\Support\Facades\View;

/**
 * Controller des categories
 */
class CategoriesController extends Controller {

    /**
     * Index des categories
     *
     * @return  obj  return les categories au format json (id, nom, slug, image)
     */
    public function index(){
        $categories = CategoriesMdl::get();
        return response()->json($categories);
    }

}