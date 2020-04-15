<?php

namespace App\Http\Controllers;

use App\Http\Models\Commentaire as CommentairesMdl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

/**
 * Controller des commentaires
 */
class CommentairesController extends Controller {

    /**
     * Renvois les commentaires du produit $id
     *
     * @param   int  $id  id du produit
     *
     * @return  obj    renvois un objet json contenant les commentaires et les users correspondants (produits_id, commentaires_id, id, created_at, texte, users_id, nom)
     */
    public function show(int $id){
        $commentaires = DB::table('produits_has_commentaires')
                            ->where('produits_id', '=', $id)
                            ->join('commentaires', 'produits_has_commentaires.commentaires_id', '=', 'commentaires.id')
                            ->join('users', 'users_id', '=', 'users.id')
                            ->get();
        return response()->json($commentaires);
    }

}