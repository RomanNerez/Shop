<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransArbitraryLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_arbitrary_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arbitrary_links_id');
            $table->foreign('arbitrary_links_id')->references('id')->on('arbitrary_links');
            $table->string('title');
            $table->string('local', 2);
            $table->foreign('local')->references('local')->on('langs');
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
        Schema::dropIfExists('trans_arbitrary_links');
    }
}
