<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UnitesTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(RecettesTableSeeder::class);
        $this->call(EtapesTypesTableSeeder::class);
        $this->call(EtapesTableSeeder::class);
        $this->call(IngredientsRecetteTableSeeder::class);
        $this->call(MediaTypesSeeder::class);
        $this->call(MediasSeeder::class);
    }
}
