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
            $table->string('nom')->unique();
            $table->integer('calories')->min(0);
            $table->float('lipides')->min(0);
            $table->float('glucides')->min(0);
            $table->float('protides')->min(0);
            $table->boolean('dispo_par_defaut');
            $table->integer('popularite')->min(0);
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
