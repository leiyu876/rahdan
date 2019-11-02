<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortPartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_part_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('short_part_id');
            $table->string('partno');
            $table->integer('request');
            $table->integer('received');
            $table->decimal('price', 9, 3);
            $table->decimal('discount', 9, 3);
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
        Schema::dropIfExists('short_part_details');
    }
}
