<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('role');
            $table->integer('active');
            $table->timestamps();
        });

        // Insert at least four users
        DB::table('users')->insert(
            array(
                ['firstname' => 'Admin', 'middlename' => 'Admin', 'lastname' => 'Admin',
                    'email' => 'admin@admin.com', 'password' => Hash::make('admin'),
                    'remember_token' => '_token', 'role' => '1', 'active' => '1'
                ],
                [
                    'firstname' => 'Parent', 'middlename' => 'Parent', 'lastname' => 'Parent',
                    'email' => 'parent@parent.com', 'password' => Hash::make('parent'),
                    'remember_token' => '_token', 'role' => '2', 'active' => '1'
                ],
                [
                    'firstname' => 'Teacher', 'middlename' => 'Teacher', 'lastname' => 'Teacher',
                    'email' => 'teacher@teacher.com', 'password' => Hash::make('teacher'),
                    'remember_token' => '_token', 'role' => '3', 'active' => '1'
                ],
                [
                    'firstname' => 'Student', 'middlename' => 'Student', 'lastname' => 'Student',
                    'email' => 'student@student.com', 'password' => Hash::make('student'),
                    'remember_token' => '_token', 'role' => '4', 'active' => '1'
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
        Schema::drop('users');
    }
}
