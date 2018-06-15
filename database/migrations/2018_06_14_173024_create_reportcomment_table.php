<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportcommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reportcomment');
        Schema::create('reportcomment', function (Blueprint $table) {
            $table->increments('idreportcomment');
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
        Schema::dropIfExists('reportcomment');
    }
}
