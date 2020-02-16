<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyrepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyrepresentatives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('taxcode')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->integer('is_deleted')->default(0);
            // $table->unsignedBigInteger('company_id');
            // $table->foreign('company_id')->references('id')->on('company');
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
        Schema::dropIfExists('companyrepresentatives');
    }
}
