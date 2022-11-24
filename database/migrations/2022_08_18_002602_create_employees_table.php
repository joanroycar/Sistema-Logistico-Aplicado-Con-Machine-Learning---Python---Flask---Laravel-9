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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_type_id')->nullable();
            $table->foreign('employee_type_id')->references('id')->on('employee_types')->onDelete('set null');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
            $table->string('name');
            $table->string('lastname');
            $table->string('phone');
            $table->date('datebirth');
            $table->string('address');
            $table->string('numberdocument');
            
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
        Schema::dropIfExists('employees');
    }
};
