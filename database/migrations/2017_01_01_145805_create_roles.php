<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('roles')->insert(
            array(
                [
                    'role' => 'Admin'
                ],
                [
                    'role' => 'Parents'
                ],
                [
                    'role' => 'Students'
                ],
                [
                    'role' => 'Teachers'
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
        Schema::drop('roles');
    }
}
