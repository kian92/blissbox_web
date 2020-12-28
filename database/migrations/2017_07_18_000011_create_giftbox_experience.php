<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftboxExperience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftbox_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giftbox_id')->unsigned();
            $table->integer('experience_id')->unsigned();
            $table->timestamps();
            $table->foreign('giftbox_id')->references('id')->on('giftboxes');
            $table->foreign('experience_id')->references('id')->on('experiences');
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
        Schema::dropIfExists('giftbox_experience');
    }
}
