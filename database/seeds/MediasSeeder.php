<?php

use Illuminate\Database\Seeder;

class MediasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('medias')->insert([
          'url'             => 'http://www.cuisineaddict.com/ori-plat-carre-24-20-cm-multifonction-noir-ebene-le-creuset-ceramique-3323.jpg',
          'id_recettes'     => 1,
          'id_media_types' => 1
      ]);
    }
}
