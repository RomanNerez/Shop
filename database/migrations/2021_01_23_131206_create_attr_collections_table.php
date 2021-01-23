<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttrCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_list_id');
            $table->foreign('attribute_list_id')->references('id')->on('attribute_lists');
            $table->unsignedBigInteger('attr_in_product_id');
            $table->foreign('attr_in_product_id')->references('id')->on('attr_in_products');
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
        Schema::dropIfExists('attr_collections');
    }
}
