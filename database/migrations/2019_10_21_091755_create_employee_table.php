<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('approve')->comment = '0: is accepted, 1: is unaccepted';
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('birthday')->nullable();
            $table->integer('gender')->nullable()->comment = '0: is men, 1: is women, 2: is undefined';
            $table->integer('marital_status')->nullable()->comment = '0: is single, 1: is married, 2: is saparated';
            $table->string('phone')->nullable();
            $table->string('remark')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('groupemployee_id');
            $table->string('password');
            $table->integer('is_deleted')->default(0);
            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('position_id')->references('id')->on('position');
            $table->foreign('groupemployee_id')->references('id')->on('groupemployee');
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
        Schema::dropIfExists('employee');
    }
}
