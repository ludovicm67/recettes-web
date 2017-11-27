<?php

use Illuminate\Database\Seeder;

class UnitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('unites')->insert([
          'nom'        => 'gramme(s)',
          'symbole'          => 'g'
      ]);

      DB::table('unites')->insert([
          'nom' => 'litre(s)',
          'symbole' => 'L'
      ]);
    }
}
