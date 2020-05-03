<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_ingredient', function (Blueprint $table) {
            $table->unsignedInteger('id_categorie');
            $table->unsignedInteger('id_ingredient');
            $table->timestamps();

            $table->primary(['id_categorie', 'id_ingredient']);
            $table->foreign('id_categorie')->references('id')->on('categories');
            $table->foreign('id_ingredient')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_ingredient');
    }
}
