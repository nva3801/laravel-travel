<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_codes', function (Blueprint $table) {
            $table->id();
            $table->string('tour_code');
            $table->date('start');
            $table->integer('price_adult');
            $table->integer('price_children');
            $table->integer('price_baby');
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
        Schema::dropIfExists('tour_codes');
    }
};