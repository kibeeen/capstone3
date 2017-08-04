<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_Bets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('betType');

            $table->integer('teamChosenID');
            $table->integer('coinsWagered');

            $table->boolean('inPlay');
            $table->boolean('betWon');
            $table->boolean('betLose');
            $table->boolean('betCancelled');
            $table->boolean('betLocked');


            $table->integer('matchID');
            $table->integer('userID');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userBets');
    }
}
