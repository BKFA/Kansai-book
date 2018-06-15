<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('iduser');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('name');
            $table->integer('age')->nullable();
            $table->string('job')->nullable();
            $table->integer('idauth')->default(0);
            $table->integer('point')->default(0);
            $table->string('education')->nullable();
            $table->string('address')->nullable();
            $table->string('japanlv')->nullable();
            $table->string('englv')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
