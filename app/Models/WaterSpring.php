<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaterSpring extends Model
{
    use HasFactory;

    protected $fillable = [
        'integration_code',
        'administrator',
        'sub_sistem',
        'watershed',
        'province',
        'city_id',
        'district_id',
        'village_id',
        'latitude',
        'longitude',
        'people',
        'debit',
        'spring_name',
        'water_intake_system',
        'pump_type',
        'production_year',
        'operating_state',
        'updated_date',
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
        return WaterSpring::all();
    }

    public static function store(Request $request)
    {
        WaterSpring::create($request->all());
    }

    public static function edit(Request $request, WaterSpring $waterspring)
    {
        $waterspring->update($request->all());
    }
}
