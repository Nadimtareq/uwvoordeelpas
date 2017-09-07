<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoShowToReservationsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations_options', function (Blueprint $table) {
            $table->tinyInteger('no_show');
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
            $table->tinyInteger('no_show')->default(1);
        });
    }
}
