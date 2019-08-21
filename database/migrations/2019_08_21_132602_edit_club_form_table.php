<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditClubFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_form', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('player_name')->nullable()->change();
            $table->string('steam_id')->nullable();
            $table->string('discord')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_form', function (Blueprint $table) {
            //
        });
    }
}
