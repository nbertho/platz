<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Model des User
 */
class User extends Model {
    /*
         * The table associated with the model.
         * @var string
    */
    protected $table = 'users';

    public function commentaires() {
        return $this->belongsTo('App\Http\Models\Commentaire');
    }

}