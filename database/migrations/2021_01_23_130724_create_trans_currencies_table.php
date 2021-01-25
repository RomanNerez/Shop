<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_currencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_list_id');
            $table->foreign('currency_list_id')->references('id')->on('currency_lists');
            $table->string('name')->nullable();
            $table->string('abbrev')->nullable();
            $table->string('local');
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
        Schema::dropIfExists('trans_currencies');
    }
}
