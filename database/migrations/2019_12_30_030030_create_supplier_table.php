<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('logo');
            $table->string('code');
            $table->unsignedBigInteger('supplier_category_id');
            $table->foreign('supplier_category_id')->references('id')->on('supplier_category');
            $table->integer('status');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('bank');
            $table->string('bankaccount');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->string('address');
            $table->string('market_id');
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
        Schema::dropIfExists('supplier');
    }
}
