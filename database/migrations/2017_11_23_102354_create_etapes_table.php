<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description');
            $table->unsignedInteger('duree');
            $table->unsignedInteger('ordre');
            $table->unsignedInteger('id_recettes');
            $table->unsignedInteger('id_etape_types');

            $table->foreign('id_recettes')->references('id')->on('recettes');
            $table->foreign('id_etape_types')
                ->references('id')
                ->on('etape_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapes');
    }
}
