<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('title')->insert(
            array(
                [
                    'title' => 'Ms'
                ],
                [
                    'title' => 'Miss'
                ],
                [
                    'title' => 'Mr'
                ],
                [
                    'title' => 'Mrs'
                ],
                [
                    'title' => 'Alhaji'
                ],
                [
                    'title' => 'Alhaja'
                ],
                [
                    'title' => 'Comrade'
                ],
                [
                    'title' => 'Pastor'
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
        Schema::drop('title');
    }
}
