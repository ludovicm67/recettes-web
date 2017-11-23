<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description');
            $table->integer('difficulte');
            $table->integer('prix');
            $table->integer('nbre_personnes');
            $table->integer('dureee_totale');
            $table->integer('calories');
            $table->float('lipides');
            $table->float('glucides');
            $table->float('protides');
            $table->unsignedInteger('id_user');

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
    }
}
