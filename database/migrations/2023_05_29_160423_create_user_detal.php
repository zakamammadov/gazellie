<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detal', function (Blueprint $table) {
            Schema::create('user_detal', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->string('adress', 200)->nullable();
                $table->string('phone', 15)->nullable();
                $table->string('mob_phone', 15)->nullable();
                 $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     *~
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_detal');
    }
}
