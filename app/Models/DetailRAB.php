<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRAB extends Model
{
    use HasFactory;

    protected $table = "detail_rab";
    public $incrementing = false;

    protected $fillable = [
        "kode_rab",
        "number_row",
        "kode_kategori_pekerjaan",
        "nama_kategori_pekerjaan",
        "uraian_pekerjaan",
        "volume",
        "satuan",
        "harga_satuan",
        "jumlah_harga",
    ];

    public function countData(){
        return $this->hasMany(DetailRAB::class, "kode_rab", "kode_rab")->where("kode_kategori_pekerjaan", $this->kode_kategori_pekerjaan);
    }
}
