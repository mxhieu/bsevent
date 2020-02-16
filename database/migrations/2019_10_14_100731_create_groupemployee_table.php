<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupemployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupemployee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('remark')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
            $table->text('permission')->nullable();
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
        Schema::dropIfExists('groupemployee');
    }
}
