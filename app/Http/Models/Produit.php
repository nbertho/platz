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
        return $this->belongsTo('App\Http\Models\User');
    }

    public function categories() {
        return $this->belongsTo('App\Http\Models\Categorie');
    }

}