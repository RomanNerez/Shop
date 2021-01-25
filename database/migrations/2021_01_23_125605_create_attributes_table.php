<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255);
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedBigInteger('count')->nullable();
            $table->unsignedBigInteger('data')->nullable();
            $table->enum('type', ['checkbox', 'radio', 'select', 'input'])->nullable();
            $table->unsignedBigInteger('order')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('attributes');
    }
}
