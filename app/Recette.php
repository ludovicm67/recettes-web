<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Recette extends Model
{
  use SearchableTrait;

  /**
   * Searchable rules.
   *
   * @var array
   */
   protected $searchable = [
     /**
     * Columns and their piority in search results.
     * Colums with higher values are more important.
     *
     * @var array
     */
     'columns' => [
       'recettes.nom' => 10,
       'ingredients.nom' => 8,
       'recettes.description' => 5
     ],
     'joins' => [
       'ingredients_recette' => ['recettes.id', 'ingredients_recette.id_recettes'],
       'ingredients' => ['ingredients_recette.id_ingredients', 'ingredients.id']
     ]
   ];

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'recettes';
  public $timestamps = false;

  /**
  * Renvoie les ingrédients utilisés dans la recette
  */
  public function ingredients() {
    return $this->belongsToMany('App\Ingredient', 'ingredients_recette',
                                'id_recettes', 'id_ingredients')
                                ->withPivot('quantite');
  }

  /**
  * Renvoie les utilisateurs ayant la recette dans leur planning
  */
  public function plannings() {
    return $this->belongsToMany('App\User', 'planning',
                                'id_recettes', 'id_utilisateurs');
  }

  /**
  * Renvoie l'utilisateur auteur de la recette
  */
  public function utilisateur() {
    return $this->belongsTo('App\User', 'id_user');
  }

  /**
  * Renvoie les étapes de la recette
  */
  public function etapes() {
    return $this->hasMany('App\Etape', 'id_recettes')->orderBy('ordre');
  }

  /**
  * Renvoie les médias de la recette
  */
  public function medias() {
    return $this->hasMany('App\Media', 'id_recettes');
  }
}
