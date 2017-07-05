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
            $table->integer('amount',5);
            $table->integer('max_usage');
            $table->integer('used_no');
            $table->integer('company_id');
            $table->integer('is_active');
            $table->integer('buy_date',25);
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
