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

      DB::table('unites')->insert([
          'nom' => 'milligramme(s)',
          'symbole' => 'mg'
      ]);

      DB::table('unites')->insert([
          'nom' => 'unité(s)',
          'symbole' => ''
      ]);

    }
}
