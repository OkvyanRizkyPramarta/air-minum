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
            // $table->string('male_total')->nullable();  
            // $table->string('female_total')->nullable();  
            // $table->string('population_total')->nullable();  
            // $table->string('maleoap_total')->nullable();  
            // $table->string('femaleoap_total')->nullable();    
            // $table->string('populationoap_total')->nullable();   
            // $table->string('malenonoap_total')->nullable();    
            // $table->string('femalenonoap_total')->nullable();    
            // $table->string('populationnonoap_total')->nullable();     
            //$table->string('year', 4);
            $table->string('name');
            $table->string('file');
            $table->enum('show', 
            [
                'Yes',
                'No',
            ]);
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
