<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcomment', function (Blueprint $table) {
            $table->increments('idsubcomment');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('iduser')->on('users')->onDelete('cascade');
            $table->integer('idcomment')->unsigned();
            $table->foreign('idcomment')->references('idcomment')->on('comment')->onDelete('cascade');
            $table->string('contentsubcomment');
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
        Schema::dropIfExists('subcomment');
    }
}
