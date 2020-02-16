<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailItemGroupCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_item_group_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_group_id');
            $table->foreign('item_group_id')->references('id')->on('item_group');
            $table->string('name');
            $table->string('remark')->nullable();
            $table->integer('is_deleted')->default(0);
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
        Schema::dropIfExists('detail_item_group_category');
    }
}
