<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('groups_id');
            $table->foreign('groups_id')->references('id')->on('groups');
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
        Schema::dropIfExists('trans_groups');
    }
}
