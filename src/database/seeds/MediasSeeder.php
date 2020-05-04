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
    // ratatouille
    DB::table('medias')->insert([
      'url'             => 'https://images.food52.com/MPvPNbfSPEJboLrzLqqj3juZToU=/753x502/de37c3ae-8342-4004-9429-08d098baf702--Food52_082211-2792.jpg',
      'id_recettes'     => 1,
      'id_media_types'  => 1
    ]);

    // spaghetti
    DB::table('medias')->insert([
      'url'             => 'http://static.cuisineaz.com/610x610/i106419-spaghetti-aux-legumes.jpg',
      'id_recettes'     => 2,
      'id_media_types'  => 1
    ]);

    // bredele
    DB::table('medias')->insert([
      'url'             => 'https://cdn.radiofrance.fr/s3/cruiser-production/2018/10/02c67f0e-3c1d-49fe-b6e7-6c5bc9366097/1200x680_gateau-noel-gettyimages-899494696.jpg',
      'id_recettes'     => 3,
      'id_media_types'  => 1
    ]);
  }
}
