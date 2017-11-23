<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regime extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'regimes';

  /**
  * Renvoie les utilisateurs ayant ce régime
  */
  public function users() {
    return $this->belongsToMany('App\Regime', 'user_regime', 'id_user', 'id_regime');
  }

  /**
  * Renvoie les ingrédients interdits dans ce régime
  */
  public function ingredients() {
    return $this->belongsToMany('App\Ingredient', 'ingredient_interdit_regime',
                                'id_regime', 'id_ingredient');
  }

}
