<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransFiltersCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_filters_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trans_categories_id');
            $table->foreign('trans_categories_id')->references('id')->on('trans_categories');
            $table->string('title')->nullable();
            $table->integer('type')->nullable();
            $table->string('unit')->nullable();
            $table->boolean('disabled');
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
        Schema::dropIfExists('trans_filters_categories');
    }
}
