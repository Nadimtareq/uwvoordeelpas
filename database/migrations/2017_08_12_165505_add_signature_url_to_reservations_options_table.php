<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSignatureUrlToReservationsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations_options', function (Blueprint $table) {
            $table->longText('signature_url')->nullable();
            $table->string('ip_address')->nullable();
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
            $table->dropColumn('signature_url');
            $table->dropColumn('ip_address');
        });
    }
}
