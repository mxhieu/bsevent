<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('image');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('servicecategory_id');
            $table->integer('lead_time');
            $table->string('attach_file')->nullable();
            $table->string('remark')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->foreign('unit_id')->references('id')->on('unit');
            $table->foreign('servicecategory_id')->references('id')->on('servicecategory');
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
        Schema::dropIfExists('service');
    }
}
