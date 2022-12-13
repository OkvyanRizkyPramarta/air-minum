<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaterWell extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'unit',
        'name',
        'watershed',
        'province',
        'city_id',
        'district_id',
        'village_id',
        'latitude',
        'longitude',
        'well_function',
        'operating_state',
        'debit',
        'people',
        'luas',
        'well_depth',
        'pump_type',
        'development_year',
        'well_condition',
        'updated_date'
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
        return Waterwell::all();
    }

    public static function store(Request $request)
    {
        Waterwell::create($request->all());
    }

    public static function edit(Request $request, Waterwell $waterwell)
    {
        $waterwell->update($request->all());
    }
}
