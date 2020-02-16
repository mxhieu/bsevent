<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_supplier', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('supplier');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('item');
            $table->string('name');
            $table->string('code');
            $table->string('image');
            $table->string('min_price');
            $table->string('max_price');
            $table->string('unit_price');
            $table->integer('discount');
            $table->string('attact_file')->nullable();
            $table->integer('min_capacity');
            $table->integer('max_capacity');
            $table->string('unit_capacity');
            $table->integer('preparation_time');
            $table->integer('status');
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
        Schema::dropIfExists('item_supplier');
    }
}
