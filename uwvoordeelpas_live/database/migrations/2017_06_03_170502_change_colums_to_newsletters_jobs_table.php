<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumsToNewslettersJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('newsletters_jobs', function (Blueprint $table) {
            //
	           $table->text('date', 1000)->nullable()->change();
	           $table->text('time', 1000)->nullable()->change();
	           $table->boolean('status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('newsletters_jobs', function (Blueprint $table) {
            //
        });
    }
}
