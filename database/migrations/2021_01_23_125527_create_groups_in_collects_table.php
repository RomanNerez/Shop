<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsInCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_in_collects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subs_id');
            $table->foreign('subs_id')->references('id')->on('subs');
            $table->unsignedBigInteger('collections_id');
            $table->foreign('collections_id')->references('id')->on('collections');
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
        Schema::dropIfExists('groups_in_collects');
    }
}
