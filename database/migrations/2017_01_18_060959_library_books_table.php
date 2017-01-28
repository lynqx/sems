<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LibraryBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn');
            $table->string('title');
            $table->string('author');
            $table->string('edition');
            $table->integer('category');
            $table->string('publisher');
            $table->integer('copies');
            $table->string('shelf_no');
            $table->string('book_position');
            $table->integer('cost');
            $table->integer('condition');
            $table->string('avatar');
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
        Schema::dropIfExists('library_books');

    }
}
