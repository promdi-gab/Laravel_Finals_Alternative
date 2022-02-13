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
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('consultation_id');
            $table->unsignedInteger(column: 'employee_id');
            $table->unsignedInteger(column: 'pet_id');
            $table->dateTime(column: 'date_of_Consultation');
            $table->string(column: 'disease_Injuries');
            $table->integer(column: 'price');
            $table->string(column: 'comments');
            $table->timestamps();
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->foreign('pet_id')->references('pet_id')->on('pets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
