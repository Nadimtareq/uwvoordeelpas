<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DinningTableManagmentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        if (!Schema::hasTable('dinning_tables')) {
            Schema::create('dinning_tables',
                    function (Blueprint $table) {
                $table->increments('id');
                $table->string('table_number');
                $table->integer('comp_id')->unsigned();
                $table->integer('seating')->unsigned();
                $table->string('description');
                $table->string('release_time')->nullable();
                $table->integer('priority')->unsigned();
                $table->integer('duration')->unsigned();
                $table->integer('status')->unsigned();
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
        Schema::dropIfExists('dinning_tables');
    }

}
