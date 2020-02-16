<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('image');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('itemcategory_id');
            $table->integer('lead_time');
            $table->string('attach_file')->nullable();
            $table->string('remark')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->foreign('unit_id')->references('id')->on('unit');
            $table->foreign('itemcategory_id')->references('id')->on('itemcategory');
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
        Schema::dropIfExists('item');
    }
}
