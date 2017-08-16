<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestListExtensionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('guest_list_extension')) {
            Schema::create('guest_list_extension', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email_extension');
                $table->int('id1');
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
        Schema::dropIfExists('guest_list_extension');
    }

}
