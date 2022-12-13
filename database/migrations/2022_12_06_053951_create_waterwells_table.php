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
        Schema::create('water_wells', function (Blueprint $table) {
            $table->id();
            // $table->string('code');
            // $table->string('unit');
            $table->string('name');
            // $table->string('watershed');  
            // $table->string('province');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            // $table->string('village');
            // $table->string('latitude');
            // $table->string('longitude');
            // $table->string('well_function');
            // $table->string('operating_state');
            // $table->string('debit');
            // $table->string('people');
            // $table->string('luas');
            // $table->string('well_depth');
            // $table->string('pump_type');
            // $table->string('development_year', 4);
            // $table->string('well_condition',);
            // $table->date('updated_date');
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
        Schema::dropIfExists('waterwells');
    }
};
