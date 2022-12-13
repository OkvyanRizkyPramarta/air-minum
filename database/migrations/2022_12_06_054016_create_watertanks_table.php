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
        Schema::create('water_tanks', function (Blueprint $table) {
            $table->id();
            $table->string('id_watertank');  
            $table->string('code');
            $table->string('name'); 
            $table->string('unit'); 
            $table->string('region_river');
            $table->string('watershed');  
            $table->string('province');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->string('village');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watertanks');
    }
};
