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
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('pet_id');
            $table->string(column: 'pet_name');
            $table->integer(column: 'age');
            $table->string(column: 'sex');
            $table->string(column: 'breed');
            $table->string(column: 'pet_pic');
            $table->unsignedInteger(column: 'owner_id');
            $table->timestamps();
            $table->foreign('owner_id')->references('owner_id')->on('owners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
