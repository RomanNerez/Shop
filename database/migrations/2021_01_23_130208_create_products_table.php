<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->string('slug', 255)->unique();
            $table->boolean('status');
            $table->boolean('sale');
            $table->boolean('hit');
            $table->boolean('new');
            $table->string('related_to')->default('store');
            $table->unsignedBigInteger('currency')->nullable();
            $table->decimal('price', 12, 6)->nullable();
            $table->unsignedBigInteger('count')->nullable();
            $table->json('images')->nullable();
            $table->json('bulk_price')->nullable();
            $table->unsignedBigInteger('draw')->default(1);
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
        Schema::dropIfExists('products');
    }
}
