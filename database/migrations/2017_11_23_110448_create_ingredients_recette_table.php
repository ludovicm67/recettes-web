<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsRecetteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_recette', function (Blueprint $table) {
            $table->float('quantite')->min(0);
            $table->unsignedInteger('id_ingredients');
            $table->unsignedInteger('id_recettes');

            $table->foreign('id_recettes')->references('id')->on('recettes');
            $table
                ->foreign('id_ingredients')
                ->references('id')
                ->on('ingredients');
            $table->primary(['id_recettes', 'id_ingredients']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_recette');
    }
}
