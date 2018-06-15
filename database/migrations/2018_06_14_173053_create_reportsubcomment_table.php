<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsubcommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reportsubcomment');
        Schema::create('reportsubcomment', function (Blueprint $table) {
            $table->increments('idreportsubcomment');
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
        Schema::dropIfExists('reportsubcomment');
    }
}
