<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerCompanyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_company', function (Blueprint $table) {
            $table->string('customer_id', 150);
            $table->string('name', 200);
            $table->string('CIF', 11);
            $table->string('city', 200);
            $table->string('comarca', 100);
            $table->string('provincia', 100);
            $table->string('ambit_actuacio', 255);
            $table->string('forma_juridica', 255);
            $table->string('via_coneixement', 255);
            $table->string('comments', 250);
            $table->smallInteger('valid_id');
            $table->dateTime('create_time');
            $table->integer('create_by');
            $table->dateTime('change_time');
            $table->integer('change_by');
            $table->softDeletes();
            $table->primary('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_company');
    }
}
