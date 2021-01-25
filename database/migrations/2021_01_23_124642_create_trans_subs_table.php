<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_subs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subs_id');
            $table->foreign('subs_id')->references('id')->on('subs');
            $table->string('title')->nullable();
            $table->string('full_title')->nullable();
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
        Schema::dropIfExists('trans_subs');
    }
}
