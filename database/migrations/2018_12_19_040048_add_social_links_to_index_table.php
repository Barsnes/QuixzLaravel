<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinksToIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('index', function (Blueprint $table) {
            $table->string('youtube');
            $table->string('twitch');
            $table->string('twitter');
            $table->string('discord');
            $table->string('steam');
            $table->string('facebook');
            $table->integer('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('index', function (Blueprint $table) {
            //
        });
    }
}
