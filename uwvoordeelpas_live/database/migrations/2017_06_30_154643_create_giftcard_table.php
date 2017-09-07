<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftcardTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        if (!Schema::hasTable('giftcards')) {
        Schema::create('giftcards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',255);
            $table->integer('amount')->unsigned();
            $table->integer('max_usage')->unsigned();
            $table->integer('used_no')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('is_active')->unsigned();
            $table->string('buy_date',25);
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('giftcards');
    }

}
