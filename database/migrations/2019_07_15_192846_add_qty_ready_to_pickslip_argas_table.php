<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQtyReadyToPickslipArgasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pickslip__argas', function (Blueprint $table) {
            $table->integer('qty_ready')->default(0)->after('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pickslip__argas', function (Blueprint $table) {
            $table->dropColumn('qty_ready');
        });
    }
}
