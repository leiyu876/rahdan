<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id');
            $table->string('invoicenum_supplier');
            $table->string('invoicenum_rahdan')->nullable();
            $table->date('invoicedate_supplier');
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
        Schema::dropIfExists('short_parts');
    }
}
