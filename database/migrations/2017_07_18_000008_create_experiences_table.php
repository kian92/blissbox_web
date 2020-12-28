<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->longtext('thumbnail')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('code')->unique();
            $table->integer('pax')->nullable();
            $table->string('duration')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longtext('address');
            $table->longtext('requirements')->nullable();
            $table->longtext('services')->nullable();
            $table->longtext('information');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('experiences');
    }
}
