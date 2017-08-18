<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactFormMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_form_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("contact_reply_id")->nullable();
            $table->longText("message");
            $table->integer("sender_id")->nullable();
            $table->integer("recipient_id")->nullable();
            $table->string("recipient_email");
            $table->string("sender_name")->nullable();
            $table->string("Recipient_name");
            $table->tinyInteger("unread")->default(1);
            $table->tinyInteger("toCustomer")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contact_form_messages');
    }
}
