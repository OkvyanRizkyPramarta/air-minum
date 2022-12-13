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
        Schema::create('water_springs', function (Blueprint $table) {
            $table->id();
            $table->string('integration_code'); 
            $table->string('administrator'); 
            $table->string('sub_sistem'); 
            $table->string('watershed');
            $table->string('province'); 
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('people');
            $table->string('debit');
            $table->string('spring_name');
            $table->string('water_intake_system');
            $table->string('pump_type');
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
        Schema::dropIfExists('water_springs');
    }
};
