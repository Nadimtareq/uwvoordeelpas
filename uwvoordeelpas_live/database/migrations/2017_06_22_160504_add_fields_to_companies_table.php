<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies',function(Blueprint $table){
            if(!Schema::hasColumn('companies', 'price_per_guest')){
                $table->double('price_per_guest');
            } 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies',function($table){
            if(Schema::hasColumn('companies', 'price_per_guest')){
                $table->double('price_per_guest');
            } 
        });
    }
}
