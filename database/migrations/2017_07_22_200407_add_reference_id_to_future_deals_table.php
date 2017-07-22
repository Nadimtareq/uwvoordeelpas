<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferenceIdToFutureDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('future_deals', function (Blueprint $table) {
            $table->integer('reference_id', false, true)->after('user_id')->nullable();
            $table->foreign('reference_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('future_deals', function (Blueprint $table) {
            $table->dropForeign('reference_id');
        });
    }
}
