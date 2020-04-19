<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Model des produits
 */
class Produit extends Model {
    /*
         * The table associated with the model.
         * @var string
    */
    protected $table = 'produits';

    public function user() {
        return $this->hasOne('App\Http\Models\User', 'id', 'user_id');
    }

    public function categories() {
        return $this->belongsTo('App\Http\Models\Categorie');
    }

    public function commentaires() {
        return $this->belongsToMany('App\Http\Models\Commentaire', 'produits_has_commentaires', 'produits_id', 'commentaires_id');
    }


}