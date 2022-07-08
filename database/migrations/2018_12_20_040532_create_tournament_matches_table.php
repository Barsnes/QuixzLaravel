<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('tournament_matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
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

    public function down()
    {
        Schema::dropIfExists('tournament_matches');
    }
}
