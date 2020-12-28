<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giftbox_id')->unsigned();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('experience_id')->nullable()->unsigned();
            $table->string('code')->unique();
            $table->string('pin');
            $table->integer('status');
            $table->string('file_name')->nullable();
            $table->string('ownership_link')->nullable();
            $table->integer('ownership_status')->nullable();
            $table->date('booking_date')->nullable();
            $table->time('booking_time')->nullable();
            $table->timestamp('activation_at')->nullable();
            $table->timestamp('expiration_at')->nullable();
            $table->timestamp('redeemed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('giftbox_id')->references('id')->on('giftboxes');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vouchers');
    }
}
