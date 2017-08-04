<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('displayIMG')->nullable();;
            $table->integer('rankID')->nullable();;

            $table->integer('coins');
            $table->integer('coinsInPlay');

            $table->integer('pendingCashIn')->nullable();;
            $table->integer('pendingCashOut')->nullable();;

            $table->boolean('banned')->nullable();;
            $table->boolean('muted')->nullable();;

            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('mobileNumber')->nullable();;
            $table->string('address')->nullable();;

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
