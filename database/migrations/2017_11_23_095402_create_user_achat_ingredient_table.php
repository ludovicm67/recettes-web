<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAchatIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_achat_ingredient', function (Blueprint $table) {
          $table->unsignedInteger('id_ingredient');
          $table->unsignedInteger('id_user');
          $table->float('quantite');
          $table->date('date');
          $table->timestamps();

          $table->primary(['id_ingredient', 'id_user']);
          $table->foreign('id_ingredient')->references('id')->on('ingredients');
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
        Schema::dropIfExists('user_achat_ingredient');
    }
}
