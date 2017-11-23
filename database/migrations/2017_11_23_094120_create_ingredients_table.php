<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('calories');
            $table->float('lipides');
            $table->float('glucides');
            $table->float('protides');
            $table->boolean('dispo_par_defaut');
            $table->integer('popularite');
            $table->unsignedInteger('id_unite');
            $table->timestamps();

            $table->foreign('id_unite')->references('id')->on('unites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
