<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaterTank extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_watertank',
        'bmm_code',
        'name',
        'unit',
        'region_river',
        'watershed',
        'province',
        'city_id',
        'district_id',
        'village_id',
        'latitude',
        'longitude',
    ];

    public function city()
    {
       return $this->belongsTo(City::class);
    }

    public function district()
    {
       return $this->belongsTo(District::class);
    }

    public function village()
    {
       return $this->belongsTo(Village::class);
    }

    public static function index()
    {
        return WaterTank::all();
    }

    public static function store(Request $request)
    {
        WaterTank::create($request->all());
    }

    public static function edit(Request $request, Watertank $watertank)
    {
        $watertank->update($request->all());
    }
}
