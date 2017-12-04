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
      DB::table('ingredients_recette')->insert([
          'quantite'         => 3,
          'id_ingredients' => 2,
          'id_recettes'       => 1
      ]);
    }
}
