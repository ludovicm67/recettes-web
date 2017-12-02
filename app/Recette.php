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
       'ingredients' => ['ingredients.id', 'ingredients_recettes.id_ingredients']
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

}
