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

   //exemple de recherche :
   //$recettes = Recette::search($query)->with('ingredients')->paginate(20);

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'recettes';

  /**
  * Renvoie les ingrédients utilisés dans la recette
  */
  public function ingredients() {
    //fonction nécessaire pour la recherche avec ingrédients

    return $this->belongsToMany('App\Ingredient', 'ingredients_recette',
                                'id_recettes', 'id_ingredients')
                                ->withPivot('quantite');
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
    return $this->hasMany('App\Etape', 'id_recettes')->orderBy('ordre');;
  }

}
