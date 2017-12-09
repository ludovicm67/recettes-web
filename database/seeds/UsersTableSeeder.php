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
          'admin'         => true,
          'password'      => bcrypt('admin'),
          'display_name'  => 'koacorne'
      ]);

      DB::table('users')->insert([
          'pseudo'        => 'foobarfoobar',
          'mail'          => 'foobar@gmail.com',
          'admin'         => false,
          'password'      => bcrypt('foobar'),
          'display_name'  => 'foobarfoobar'
      ]);

      DB::table('users')->insert([
          'pseudo'        => 'utilisateur',
          'mail'          => 'utilisateur@gmail.com',
          'admin'         => false,
          'password'      => bcrypt('something'),
          'display_name'  => 'BestUser'
      ]);

      DB::table('users')->insert([
          'pseudo'        => 'hello.world',
          'mail'          => 'hello@gmail.com',
          'admin'         => false,
          'password'      => bcrypt('fdsfff'),
          'display_name'  => 'Hello'
      ]);
    }
}
