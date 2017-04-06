<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToReservationOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations_options', function (Blueprint $table) {
            //
            $table->decimal('price_from', 5, 2)->unsigned()->nullable();
            $table->decimal('price', 5, 2)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations_options', function (Blueprint $table) {
            //
            $table->dropColumn('price_from');
            $table->dropColumn('price');
        });
    }
}
