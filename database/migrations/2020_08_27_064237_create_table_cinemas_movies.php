<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCinemasMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinemas_movies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cinema_id')->unsigned();
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('date');
            $table->string('time');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->constrained();
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade')->constrained();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade')->constrained();
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
        Schema::dropIfExists('cinemas_movies');
    }
}
