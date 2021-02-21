<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages');
            $table->string('title')->nullable();
            $table->json('data')->nullable();
            $table->string('local');
            $table->string('metaTitle')->nullable();
            $table->text('metaDesc')->nullable();
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
        Schema::dropIfExists('trans_pages');
    }
}
