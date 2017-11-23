<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientInterditRegimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_interdit_regime', function (Blueprint $table) {
            $table->unsignedInteger('id_ingredient');
            $table->unsignedInteger('id_regime');
            $table->timestamps();

            $table->primary(['id_ingredient', 'id_regime']);
            $table->foreign('id_ingredient')->references('id')->on('ingredients');
            $table->foreign('id_regime')->references('id')->on('regimes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_interdit_regime');
    }
}
