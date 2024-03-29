<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('team_id');
            $table->string('enemy');
            $table->integer('quixzScore')->nullable()->unsigned()->default('0');
            $table->integer('enemyScore')->nullable()->unsigned()->default('0');
            $table->string('enemyLogo')->default('');
            $table->date('date');
            $table->timestamp('time')->nullable();
            $table->integer('tournament_id')->nullable()->unsigned();
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
