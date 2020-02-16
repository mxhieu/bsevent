<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvalformitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evalformitem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->integer('parent_id');
            $table->integer('type')->comment = '1: is title, 2: is content';
            $table->string('content')->nullable();
            $table->string('remark')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->unsignedBigInteger('evalform_id');
            $table->foreign('evalform_id')->references('id')->on('evalform');
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
        Schema::dropIfExists('evalformitem');
    }
}
