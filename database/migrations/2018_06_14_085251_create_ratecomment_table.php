<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatecommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ratecomment');
        Schema::create('ratecomment', function (Blueprint $table) {
            $table->increments('idratecomment');
            $table->integer('idcomment')->unsigned();
            $table->foreign('idcomment')->references('idcomment')->on('comment')->onDelete('cascade');
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
        Schema::dropIfExists('ratecomment');
    }
}
