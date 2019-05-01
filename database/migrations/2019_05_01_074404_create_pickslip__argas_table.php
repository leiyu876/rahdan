<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickslipArgasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickslip__argas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('partno');
            $table->string('description');
            $table->integer('qty');
            $table->integer('qty_send');
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
        Schema::dropIfExists('pickslip_argas');
    }
}
