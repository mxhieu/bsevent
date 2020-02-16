<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->string('company_name');
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('start_at');
            $table->string('end_at');
            $table->string('responsibility')->nullable();
            $table->string('leave')->nullable();
            $table->string('remark')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->foreign('employee_id')->references('id')->on('employee');
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
        Schema::dropIfExists('employee_job');
    }
}
