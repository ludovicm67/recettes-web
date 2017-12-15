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
      //ratatouille
      DB::table('medias')->insert([
          'url'             => 'https://images.food52.com/MPvPNbfSPEJboLrzLqqj3juZToU=/753x502/de37c3ae-8342-4004-9429-08d098baf702--Food52_082211-2792.jpg',
          'id_recettes'     => 1,
          'id_media_types' => 1
      ]);
      //spaghetti
      DB::table('medias')->insert([
          'url'             => 'http://static.cuisineaz.com/610x610/i106419-spaghetti-aux-legumes.jpg',
          'id_recettes'     => 2,
          'id_media_types' => 1
      ]);
      //
      DB::table('medias')->insert([
          'url'             => 'http://www.foodreporter.fr/upload/original/2/a/0/8/e/1195298.png',
          'id_recettes'     => 3,
          'id_media_types' => 1
      ]);
    }
}
