<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collections_id');
            $table->foreign('collections_id')->references('id')->on('collections');
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
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
        Schema::dropIfExists('trans_collections');
    }
}
