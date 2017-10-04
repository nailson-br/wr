<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkforceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workforce', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('fullName');
            $table->string('name');
            $table->string('contract');
            $table->string('mainPhone');
            $table->string('alternativePhone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workforce');
    }
}
