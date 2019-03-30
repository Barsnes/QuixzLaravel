<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToClubFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_form', function (Blueprint $table) {
            $table->string('country')->after('email');
            $table->integer('zip_code')->after('country');
            $table->string('city')->after('zip_code');
            $table->string('street')->after('city');
            $table->varchar('phone')->after('street');
            $table->date('date_of_birth')->after('phone');
        });
    }

     // first, last name; adress consisting of country, zip, city, street, number; email adress, date of birth as mandatory fields and have voluntary fields for steam uplay discord etc

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
