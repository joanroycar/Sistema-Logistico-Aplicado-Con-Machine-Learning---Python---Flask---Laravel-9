<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suplier_id')->nullable();
            $table->unsignedBigInteger('unit_measure_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name');
            $table->integer('stock')->nullable()->default('0');
            $table->integer('stockmin');
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->string('status');
            $table->decimal('price')->nullable();
            $table->foreign('suplier_id')->references('id')->on('supliers')->onDelete('set null');
            $table->foreign('unit_measure_id')->references('id')->on('unit_measures')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
        Schema::dropIfExists('products');
    }
};
