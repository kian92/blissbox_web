<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('universe_id')->unsigned();
            $table->string('initial')->unique();
            $table->longtext('thumbnail')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->longtext('description')->nullable();
            $table->string('pdf_url');
            $table->double('review');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('universe_id')->references('id')->on('universes');
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
        Schema::dropIfExists('giftboxes');
    }
}
