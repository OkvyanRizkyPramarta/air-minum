<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAB extends Model
{
    use HasFactory;

    protected $table = "rab";
    public $incrementing = false;

    protected $fillable = [
        "kode_rab",
        "pekerjaan",
        "tahun_anggaran",
        "real_cost",
        "ppn",
        "total_cost",
        "dibulatkan",
        "file"
    ];
}
