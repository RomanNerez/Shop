<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
           $table->id();
            $table->integer('target_id');
            $table->string('instance', 32);
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('menu');
            $table->unsignedBigInteger('area_visibility_id');
            $table->foreign('area_visibility_id')->references('id')->on('menu_area_visibilities');
            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
