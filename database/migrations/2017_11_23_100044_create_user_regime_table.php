<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRegimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_regime', function (Blueprint $table) {
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_regime');
            $table->timestamps();

            $table->primary(['id_user', 'id_regime']);
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('user_regime');
    }
}
