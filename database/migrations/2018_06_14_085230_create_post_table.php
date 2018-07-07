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
            $table->increments('idpost');
            $table->integer('idtopic')->unsigned()->nullable();
            $table->foreign('idtopic')->references('idtopic')->on('topic')->onDelete('cascade');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('iduser')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('ansititle')->unique();
            $table->string('description')->nullable();
            $table->integer('contentpost');
            $table->string('urlimage')->nullable();
            $table->integer('view')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('type')->default(1);
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
