<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftcardUseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('giftcard_use')) {
            Schema::create('giftcard_use', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('giftcard_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('is_active')->unsigned();
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
        Schema::dropIfExists('giftcard_use');
    }
}
