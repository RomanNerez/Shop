<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransAttrListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_attr_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_list_id');
            $table->foreign('attribute_list_id')->references('id')->on('attribute_lists');
            $table->string('title')->nullable();
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
        Schema::dropIfExists('trans_attr_lists');
    }
}
