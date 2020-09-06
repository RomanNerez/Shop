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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('sub_categories_id');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories');
            $table->string('title', 255);
            $table->string('slug', 150)->unique();
            $table->longText('description');
            $table->text('photos');
            $table->float('price', 8, 2);
            $table->string('brand', 255);
            $table->string('manufacturer', 255);
            $table->string('material', 255);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
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
