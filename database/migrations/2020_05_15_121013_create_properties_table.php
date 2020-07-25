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
            $table->double('price');
            $table->integer('roomNumbers');
            $table->integer('state');
            $table->string('description');
            $table->integer('propertyPeriod');
            $table->string('street');
            $table->string('image');
            $table->string('city');
            $table->integer('evaluate')->default('0');
            $table->integer( 'status');
            $table->integer( 'area');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
