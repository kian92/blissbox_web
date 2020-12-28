<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session_id')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('giftbox_id')->unsigned();
            $table->string('package')->nullable();
            $table->string('to')->nullable();
            $table->string('recipients')->nullable();
            $table->string('message')->nullable();
            $table->boolean('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('giftbox_id')->references('id')->on('giftboxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('carts');
    }
}