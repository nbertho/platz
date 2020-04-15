<?php

namespace App\Http\Controllers;

use App\Http\Models\Page as PagesMdl;
use Illuminate\Support\Facades\View;

/**
 * Controller des pages
 */
class PagesController extends Controller {

    /**
     * Index des pages
     *
     * @return  obj  renvois un objet json contenant les infos de la page (texte du footer) (id, nom, slug, titre, texte)
     */
    public function index(){
        $pages = PagesMdl::all();
        return response()->json($pages);
    }

}