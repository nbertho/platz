<?php
namespace App\Http\Controllers;

use App\Http\Models\User as UsersMdl;
use Illuminate\Support\Facades\View;

/**
 * Controller des Users
 */
class UsersController extends Controller {

    /**
     * Montre les informations du user $id
     *
     * @param   int  $id  du user
     *
     * @return  obj       objet json contenant les informations du user $id (id, nom)
     */
    public function show(int $id){
        $user = UsersMdl::find($id);
        return response()->json($user);
    }

}