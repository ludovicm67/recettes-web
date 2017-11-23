<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'categories';

  /**
  * Renvoie les ingrédients associés à cette catégorie
  */
  public function ingredients() {
    return $this->belongsToMany('App\Ingredient', 'categorie_ingredient',
                                'id_categorie', 'id_ingredient');
  }
}
