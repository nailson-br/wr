<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWrUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wr_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('fullName');
            $table->string('name');
            $table->string('wr_user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wr_users');
    }
}
