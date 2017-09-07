<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIframesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('iframes')) {
            Schema::create('iframes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->text('resturant_url');
                $table->text('title_color');
                $table->text('title_font_size');
                $table->text('font_family');
                $table->text('star_color');
                $table->text('user_image');
                $table->text('text_color');
                $table->text('text_font_size');
                $table->text('border_color');
                $table->text('border_size');
                $table->text('border_style');
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
        //
    }
}
