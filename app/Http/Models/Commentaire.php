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

    public function produit() {
        return $this->belongsToMany('App\Http\Models\Produit', 'produits_has_commentaires');
    }

}