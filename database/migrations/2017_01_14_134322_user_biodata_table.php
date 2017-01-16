<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_biodata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('gender');
            $table->integer('m_status');
            $table->string('dob');
            $table->bigInteger('mobile');
            $table->string('address');
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
        Schema::drop('user_biodata');

    }
}
