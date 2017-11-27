<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'pseudo'        => 'admin',
          'mail'          => 'koacorne@gmail.com',
          'password'      => bcrypt('admin'),
          'display_name'  => 'koacorne'
      ]);
    }
}
