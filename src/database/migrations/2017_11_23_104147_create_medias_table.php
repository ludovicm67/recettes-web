<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->unsignedInteger('id_recettes');
            $table->unsignedInteger('id_media_types');

            $table->foreign('id_recettes')
                ->references('id')
                ->on('recettes')
                ->onDelete('cascade');;
            $table
                ->foreign('id_media_types')
                ->references('id')
                ->on('media_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias');
    }
}
