<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('item_group_id');
            $table->foreign('item_group_id')->references('id')->on('item_group');
            $table->unsignedBigInteger('task_group_id');
            // $table->foreign('task_group_id')->references('id')->on('task_group');
            $table->string('code');
            $table->string('attact_file')->nullable();
            $table->string('stackholder');
            $table->integer('status');
            $table->string('in_range')->nullable();
            $table->string('out_range')->nullable();
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
        Schema::dropIfExists('project');
    }
}
