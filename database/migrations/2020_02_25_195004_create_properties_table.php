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
            $table->string('property_title');
            $table->enum('status',['For sale','For Rent'])->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('area')->nullable();
            $table->bigInteger('dpst_cost')->nullable();
            $table->bigInteger('mtnc_cost')->nullable();
            $table->mediumInteger('rooms')->nullable();
            $table->mediumInteger('bedrooms')->nullable();
            $table->tinyInteger('bathroom')->nullable();
            $table->tinyInteger('rental_floor')->nullable();
            $table->string('location',1000)->default('{"address":"","state":"","neighbourhood":"","postal_code":""}');
            $table->string('gallery',1000)->nullable();
            $table->string('property_video',500)->nullable();
            $table->string('description',1000)->nullable();
            $table->string('features', 500)->nullable();
            $table->string('contact_detail')->default('{"name":"","email":"","phone":""}');
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
