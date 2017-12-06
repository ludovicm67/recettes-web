<?php

use Illuminate\Database\Seeder;

class MediaTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('media_types')->insert([
          'nom'             => 'jpg',
          'is_video'        => false
      ]);
    }
}
