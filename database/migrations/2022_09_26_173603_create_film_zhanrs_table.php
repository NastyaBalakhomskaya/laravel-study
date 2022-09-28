<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_zhanrs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');

            $table->unsignedBigInteger('zhanr_id');
            $table->foreign('zhanr_id')->references('id')->on('zhanrs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_zhanrs');
    }
};
