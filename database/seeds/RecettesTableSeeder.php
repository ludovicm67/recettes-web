<?php

use Illuminate\Database\Seeder;

class RecettesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('recettes')->insert([
          'nom'         => 'Quelque chose de comestible',
          'description' => 'Un truc à manger, quoi. On sait pas quoi, on veut pas savoir.',
          'difficulte'  => '5',
          'prix'        => '1',
          'nbre_personnes' => '4',
          'duree_totale'=> '20',
          'calories'    => '10',
          'lipides'     => '40',
          'glucides'    => '20',
          'protides'    => '40',
          'id_user'     => '1'
      ]);

      DB::table('recettes')->insert([
          'nom'         => 'Le vide coûte cher',
          'description' => 'Une recette vide qui coûte cher mais est très facile à réaliser chez soi.',
          'difficulte'  => '1',
          'prix'        => '5',
          'nbre_personnes' => '4',
          'duree_totale'=> '0',
          'calories'    => '0',
          'lipides'     => '0',
          'glucides'    => '0',
          'protides'    => '0',
          'id_user'     => '1'
      ]);

      DB::table('recettes')->insert([
          'nom'         => 'Difficultés, difficultés',
          'description' => 'Une recette vide d\'une difficulté quasiment insurmontable.',
          'difficulte'  => '5',
          'prix'        => '1',
          'nbre_personnes' => '4',
          'duree_totale'=> '0',
          'calories'    => '0',
          'lipides'     => '0',
          'glucides'    => '0',
          'protides'    => '0',
          'id_user'     => '1'
      ]);
    }
}
