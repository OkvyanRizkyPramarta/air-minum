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
        Schema::create('rab', function (Blueprint $table) {
            $table->string("kode_rab", 150)->primary();
            $table->string("pekerjaan");
            $table->integer("tahun_anggaran");
            $table->bigInteger("real_cost");
            $table->bigInteger("ppn");
            $table->bigInteger("total_cost");
            $table->bigInteger("dibulatkan")->nullable();
            $table->string("file");
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
        Schema::dropIfExists('rab');
    }
};
