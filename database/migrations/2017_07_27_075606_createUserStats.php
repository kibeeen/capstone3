<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_Stats', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('totalBets')->nullable();
            $table->integer('WonBets')->nullable();
            $table->integer('LoseBets')->nullable();
            $table->integer('ReturnBets')->nullable();

            $table->integer('totalProfit');
            $table->integer('totalTrades')->nullable();
            $table->integer('profitToday')->nullable();
            $table->integer('profitYesterday')->nullable();

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
        Schema::dropIfExists('userStats');
    }
}
