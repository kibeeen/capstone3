<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('matches', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('matchName');

            $table->integer('matchCategoryID');
            $table->integer('gameSeriesID');
            $table->integer('sportsCatID');

            $table->integer('betsTotal')->nullable();;
            $table->integer('betsHomeTotal')->nullable();;
            $table->integer('betsAwayTotal')->nullable();;


            $table->integer('homeTeamID');
            $table->integer('homeTeamScore')->nullable();;
            $table->integer('homeTeamWin')->nullable();;
            $table->integer('homeTeamOdds')->nullable();;
            $table->integer('homeTeamOddsPcnt');

            $table->integer('draw')->nullable();;

            $table->integer('awayTeamID');
            $table->integer('awayTeamScore')->nullable();;
            $table->integer('awayTeamWin')->nullable();;
            $table->integer('awayTeamOdds')->nullable();;
             $table->integer('awayTeamOddsPcnt');

            $table->boolean('inPlay');
            $table->boolean('finished');

            $table->integer('leagueID');

            $table->string('startTime');

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
        Schema::dropIfExists('matches');
    }
}
