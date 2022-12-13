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
        Schema::create('municipal_waterworks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->unsignedBigInteger('city_id');
            // $table->string('area'); 
            // $table->string('koord_x'); 
            // $table->string('koord_y');
            // $table->string('elevasi_mdpl'); 
            // $table->string('installed');
            // $table->string('operation');
            $table->string('file');
            $table->enum('data', 
            [
                'Pelanggan',
                'Anggaran',
                'Perencanaan',
            ]);
            $table->enum('show', 
            [
                'Yes',
                'No',
            ]);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipal_waterworks');
    }
};
