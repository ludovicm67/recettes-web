<?php

use Illuminate\Database\Seeder;

class IngredientsRecetteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //ratatouille
      DB::table('ingredients_recette')->insert([
          'quantite'         => 10,
          'id_ingredients' => 1, //sel
          'id_recettes'       => 1
      ]);
      DB::table('ingredients_recette')->insert([
          'quantite'         => 3,
          'id_ingredients' => 2, //tomate
          'id_recettes'       => 1
      ]);
      DB::table('ingredients_recette')->insert([
          'quantite'         => 3,
          'id_ingredients' => 4, //courgette
          'id_recettes'       => 1
      ]);

      //Spaghetti
      DB::table('ingredients_recette')->insert([
          'quantite'         => 3,
          'id_ingredients' => 4, //courgette
          'id_recettes'       => 2
      ]);
      DB::table('ingredients_recette')->insert([
          'quantite'         => 3,
          'id_ingredients' => 2, //tomate
          'id_recettes'       => 2
      ]);
      DB::table('ingredients_recette')->insert([
          'quantite'         => 150,
          'id_ingredients' => 8, //mais
          'id_recettes'       => 2
      ]);

      //Bredele
      DB::table('ingredients_recette')->insert([
          'quantite'         => 200,
          'id_ingredients'    => 6, //chocolat
          'id_recettes'       => 3
      ]);
      DB::table('ingredients_recette')->insert([
          'quantite'         => 100,
          'id_ingredients'    => 9, //farine
          'id_recettes'       => 3
      ]);
    }
}
