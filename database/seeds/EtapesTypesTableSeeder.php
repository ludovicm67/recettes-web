<?php

use Illuminate\Database\Seeder;

class EtapesTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('etape_types')->insert([
          'nom'         => 'Cuisson'
      ]);

      DB::table('etape_types')->insert([
          'nom'         => 'Préparation'
      ]);
    }
}
