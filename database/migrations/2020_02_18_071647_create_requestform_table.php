<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestform', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project');
            $table->string('deadline');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee');
            $table->integer('status');
            $table->integer('approve')->default(0);
            $table->string('remark')->nullable();
            $table->unsignedBigInteger('user_approve_id')->nullable();
            $table->string('approved_at')->nullable();
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
        Schema::dropIfExists('requestform');
    }
}
