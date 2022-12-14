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
        Schema::create('detail_rab', function (Blueprint $table) {
            $table->string("kode_rab", 150);
            $table->tinyInteger("number_row");
            $table->string("kode_kategori_pekerjaan");
            $table->string("nama_kategori_pekerjaan");
            $table->text("uraian_pekerjaan");
            $table->string("volume", 50);
            $table->integer("harga_satuan");
            $table->bigInteger("jumlah_harga");
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
        Schema::dropIfExists('detail_rab');
    }
};
