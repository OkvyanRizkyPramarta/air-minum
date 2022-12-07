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
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->string('male_total');  
            $table->string('female_total');  
            $table->string('population_total');
            $table->string('maleoap_total');  
            $table->string('femaleoap_total');  
            $table->string('populationoap_total'); 
            $table->string('malenonoap_total');  
            $table->string('femalenonoap_total');  
            $table->string('populationnonoap_total');   
            $table->string('year', 4);
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
        Schema::dropIfExists('populations');
    }
};
