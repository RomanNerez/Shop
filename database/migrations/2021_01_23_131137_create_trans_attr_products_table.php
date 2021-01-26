<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransAttrProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_attr_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trans_product_id');
            $table->foreign('trans_product_id')->references('id')->on('trans_products');
            $table->unsignedBigInteger('attr_in_product_id');
            $table->foreign('attr_in_product_id')->references('id')->on('attr_in_products');
            $table->text('desc')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->json('params')->nullable();
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
        Schema::dropIfExists('trans_attr_products');
    }
}
