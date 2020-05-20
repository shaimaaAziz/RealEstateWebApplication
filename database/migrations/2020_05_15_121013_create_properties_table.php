<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->double('minPrice');
            $table->double('maxPrice');
            $table->integer('roomNumbers');
            $table->integer('state');
            $table->string('description');
            $table->integer('propertyPeriod');
            $table->string('street');
            $table->string('image');
            $table->string('city');
            $table->integer('evaluate')->default('0');
            // $table->unsignedBigInteger('adminId')->default('0');
            $table->integer( 'status')->default('0');
            $table->integer( 'area');
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
        Schema::dropIfExists('properties');
    }
}
