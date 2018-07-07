<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('comment');
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('idcomment');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('iduser')->on('users')->onDelete('cascade');
            $table->integer('idpost')->unsigned();
            $table->foreign('idpost')->references('idpost')->on('post')->onDelete('cascade');
            $table->string('contentcomment');
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
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
        Schema::dropIfExists('comment');
    }
}
