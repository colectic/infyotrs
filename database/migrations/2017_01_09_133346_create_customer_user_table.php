<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 200);
            $table->string('email', 150);
            $table->string('customer_id', 150);
            $table->string('pw', 64);
            $table->string('title', 50);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('phone', 150);
            $table->string('mobile', 150);
            $table->string('email_ext00', 150);
            $table->string('email_ext01', 150);
            $table->string('comments', 250);
            $table->integer('valid_id');
            $table->dateTime('create_time');
            $table->integer('create_by');
            $table->dateTime('change_time');
            $table->integer('change_by');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_user');
    }
}
