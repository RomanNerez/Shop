<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->text('file')->nullable();
            $table->string('title', 255);
            $table->text('desc');
            $table->string('slug', 50)->unique();
            $table->string('meta_title', 255);
            $table->text('meta_desc');
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
        Schema::dropIfExists('sub_categories');
    }
}
