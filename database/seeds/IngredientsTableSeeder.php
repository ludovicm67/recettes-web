<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ingredients')->insert([
          'nom'             => 'Sel',
          'calories'        => '1',
          'lipides'         => '0.1',
          'glucides'        => '0.2',
          'protides'        => '0.3',
          'dispo_par_defaut'  => true,
          'popularite'      => '1',
          'id_unite'        => '1'
      ]);

      DB::table('ingredients')->insert([
          'nom'             => 'Tomate',
          'calories'        => '50',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '4'
      ]);

      DB::table('ingredients')->insert([
          'nom'             => 'Nutella',
          'calories'        => '300',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '5'
      ]);

      DB::table('ingredients')->insert([
          'nom'             => 'Courgette',
          'calories'        => '300',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '4'
      ]);

      DB::table('ingredients')->insert([
          'nom'             => 'Pommes de terre',
          'calories'        => '300',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '4'
      ]);

      DB::table('ingredients')->insert([
          'nom'             => 'Chocolat',
          'calories'        => '30',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '1'
      ]);

      DB::table('ingredients')->insert([
          'nom'             => 'Avocat',
          'calories'        => '30',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '4'
      ]);

      DB::table('ingredients')->insert([
          'nom'             => 'Maïs',
          'calories'        => '20',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '1'
      ]);
      DB::table('ingredients')->insert([
          'nom'             => 'Farine',
          'calories'        => '20',
          'lipides'         => '0.5',
          'glucides'        => '0.6',
          'protides'        => '0.7',
          'dispo_par_defaut'  => false,
          'popularite'      => '5',
          'id_unite'        => '1'
      ]);
    }
}
