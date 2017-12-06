<?php

use Illuminate\Database\Seeder;

class PlanningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planning')->insert([
            'at'            => date('Y-m-d', strtotime('+1 day')),
            'id_users'      => 1,
            'id_recettes'   => 1
        ]);

        DB::table('planning')->insert([
            'at'            => date('Y-m-d', strtotime('+10 days')),
            'id_users'      => 1,
            'id_recettes'   => 3
        ]);
    }
}
