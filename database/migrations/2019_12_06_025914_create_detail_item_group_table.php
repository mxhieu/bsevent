<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailItemGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_item_group', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->unsignedBigInteger('detail_item_group_category_id');
            $table->foreign('detail_item_group_category_id')->references('id')->on('detail_item_group_category');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('item');
            $table->primary(['detail_item_group_category_id', 'item_id']);
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
        Schema::dropIfExists('detail_item_group');
    }
}
