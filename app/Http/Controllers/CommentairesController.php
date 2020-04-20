<?php
namespace App\Http\Controllers;

use App\Http\Models\Commentaire as CommentairesMdl;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentairesController extends Controller {

    /**
     * Cree un nouveau commentaires dans la db
     *
     * @param   Request  $request  Objet contenant les elements a ajouter
     *
     */
    public function create(Request $request){

        $created_at = date("Y/m/d h:m:s");
        $texte = $request->input('texte');
        $users_id = $request->input('userId');
        $produits_id = $request->input('produitId');
        $data = array('created_at'=>$created_at, 'texte'=>$texte, 'users_id'=>$users_id, 'produits_id'=>$produits_id);
        DB::table('commentaires')->insert($data);

    }

}