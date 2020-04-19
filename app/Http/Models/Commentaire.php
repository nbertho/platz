<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Model des commentaires
 */
class Commentaire extends Model {
    /*
         * The table associated with the model.
         * @var string
    */
    protected $table = 'commentaires';

    public function user() {
        return $this->hasOne('App\Http\Models\User', 'id', 'users_id');
    }
    
}