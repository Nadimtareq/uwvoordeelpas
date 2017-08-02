<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftcardsUseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('giftcards_buy')) {
            Schema::create('giftcards_buy', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('giftcard_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giftcards_buy');
    }
}
