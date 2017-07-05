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
            Schema::table('dinning_tables',
                    function (Blueprint $table) {
                $table->increments('id');
                $table->string('table_number');
                $table->integer('comp_id');
                $table->integer('seating');
                $table->string('description');
                $table->integer('priority');
                $table->integer('duration');
                $table->integer('status');
                $table->timestamp('created_at');
                $table->string('updated_at');
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
