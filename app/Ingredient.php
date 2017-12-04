<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'ingredients';

  /**
  * Renvoie les régimes dans lequel cet ingrédient est interdit
  */
  public function regimes_interdits() {
    return $this->belongsToMany('App\Regime', 'ingredient_interdit_regime',
                                'id_ingredient', 'id_regime');
  }

  /**
  * Renvoie les utilisateurs qui possèdent cet ingrédient
  */
  public function users() {
    return $this->belongsToMany('App\User', 'ingredient_user',
                                'id_ingredient', 'id_user');
  }

  /**
  * Renvoie les utilisateurs qui veulent acheter cet ingrédient
  */
  public function users_achat() {
    return $this->belongsToMany('App\User', 'user_achat_ingredient',
                                'id_ingredient', 'id_user');
  }

  /**
  * Renvoie les utilisateurs qui voulaient acheter cet ingrédient
  */
  public function users_achat_archive() {
    return $this->belongsToMany('App\User', 'user_achat_ingredient_archive',
                                'id_ingredient', 'id_user');
  }

  /**
  * Renvoie les catégories correspondant à cet ingrédient
  */
  public function categories() {
    return $this->belongsToMany('App\Categorie', 'categorie_ingredient',
                                'id_ingredient', 'id_categorie');
  }

  /**
  * Renvoie l'unité correspondant à cet ingrédient
  */
  public function unite() {
    return $this->belongsTo('App\Unite', 'id_unite');
  }
}
