<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('post');
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topic')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('ansititle')->unique();
            $table->string('description');
            $table->longText('content');
            $table->string('urlimage')->nullable();
            $table->integer('view')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('post');
    }
}
