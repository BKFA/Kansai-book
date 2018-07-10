<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatepostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('updatepost');
        Schema::create('updatepost', function (Blueprint $table) {
            $table->increments('idupdatepost');
            $table->integer('idpost')->unsigned();
            $table->foreign('idpost')->references('idpost')->on('post')->onDelete('cascade');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('iduser')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('ansititle')->unique();
            $table->string('description');
            $table->longText('contentupdatepost');
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
        Schema::dropIfExists('updatepost');
    }
}
