<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaritalStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('m_status')->insert(
            array(
                [
                    'status' => 'Single'
                ],
                [
                    'status' => 'Married'
                ],
                [
                    'status' => 'Seperated'
                ],
                [
                    'status' => 'Divorced'
                ],
                [
                    'status' => 'Widowed'
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('m_status');

    }
}
