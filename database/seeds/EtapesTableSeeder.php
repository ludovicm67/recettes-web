<?php

use Illuminate\Database\Seeder;

class EtapesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('etapes')->insert([
          'nom'         => '...la folie !',
          'description' => 'On fait quelque chose pour que ça cuise.',
          'duree'       => 20,
          'ordre'       => 2,
          'id_recettes' => 1,
          'id_etape_types' => 1
      ]);

      DB::table('etapes')->insert([
          'nom'         => 'Le calme avant...',
          'description' => 'On fait quelque chose pour que ça se prépare.',
          'duree'       => 10,
          'ordre'       => 1,
          'id_recettes' => 1,
          'id_etape_types' => 2
      ]);

      DB::table('etapes')->insert([
          'nom'         => 'La fin',
          'description' => 'A déguster. Si ça se mange comme promis.',
          'duree'       => 80,
          'ordre'       => 3,
          'id_recettes' => 1,
          'id_etape_types' => 1
      ]);

      DB::table('etapes')->insert([
          'nom'         => 'Manger les spaguetti',
          'description' => 'Déguster.',
          'duree'       => 10,
          'ordre'       => 1,
          'id_recettes' => 2,
          'id_etape_types' => 3
      ]);
    }
}
