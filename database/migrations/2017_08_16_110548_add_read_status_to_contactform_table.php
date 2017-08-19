<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReadStatusToContactformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contactfrom', function (Blueprint $table) {
            $table->enum("status", ['new', 'read', 'replied'])->default("new");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contactfrom', function (Blueprint $table) {
            $table->dropColumn("status");
        });
    }
}
