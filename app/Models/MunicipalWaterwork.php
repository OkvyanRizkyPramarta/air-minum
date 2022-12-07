<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MunicipalWaterwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area',
        'koord_x',
        'koord_y',
        'elevasi_mdpl',
        'installed',
        'operation',
    ];

    public static function index()
    {
        return MunicipalWaterwork::all();
    }

    public static function store(Request $request)
    {
        MunicipalWaterwork::create($request->all());
    }

    public static function edit(Request $request, MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->update($request->all());
    }
}
