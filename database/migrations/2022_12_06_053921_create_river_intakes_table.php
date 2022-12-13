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
        Schema::create('river_intakes', function (Blueprint $table) {
            $table->id();
            //$table->string('id_river_intake');  
            $table->string('code');
            $table->string('name');
            $table->string('intake_type'); 
            $table->string('unit'); 
            $table->string('watershed');  
            $table->string('province');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->string('village');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('debit');
            $table->string('pump_type');
            $table->string('people');
            $table->string('head_pompa');
            $table->string('production_year', 4);
            $table->string('operating_state');
            $table->date('updated_date');
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
        Schema::dropIfExists('river_intakes');
    }
};
