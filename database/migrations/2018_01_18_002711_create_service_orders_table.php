<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->text('requirer');
            $table->text('e-mail');
            $table->text('spreadsheet_to');
            $table->date('start');
            $table->text('mo');
            $table->date('end');
            $table->timestamps();
        });

        Schema::table('service_orders', function($table){
            $table->index('service_id');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_orders');
    }
}
