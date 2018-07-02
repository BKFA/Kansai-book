<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesubcommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('ratesubcomment');
        Schema::create('ratesubcomment', function (Blueprint $table) {
            $table->increments('idratesubcomment');
            $table->integer('idsubcomment')->unsigned();
            $table->foreign('idsubcomment')->references('idsubcomment')->on('subcomment')->onDelete('cascade');
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
        Schema::dropIfExists('ratesubcomment');
    }
}
