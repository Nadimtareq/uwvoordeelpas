<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('scraps')) {
            Schema::create('scraps', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('com_id');
                $table->integer('user_id');
                $table->text('facebook_token');
                $table->text('google_token');
                $table->text('couverts');
                $table->text('dinningcity');
                $table->text('tripadvisor');
                $table->text('seatme');
                $table->timestamps();
            });
        }
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
