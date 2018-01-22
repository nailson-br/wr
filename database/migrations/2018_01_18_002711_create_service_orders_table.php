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
            $table->string('so', 9)->unique();
            $table->text('year');
            $table->text('month');
            $table->timestamps();
        });

        // Schema::table('service_orders', function($table){
        //     $table->index('service_id');
        //     $table->foreign('service_id')->references('id')->on('services');
        // });
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
