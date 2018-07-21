<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partnumbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agencynum');
            $table->string('rahdannum');
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
        Schema::table('partnumbers', function (Blueprint $table) {
            Schema::dropIfExists('partnumbers');
        });
    }
}
