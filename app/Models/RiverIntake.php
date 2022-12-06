<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RiverIntake extends Model
{
    use HasFactory;

    protected $fillable = [
        'bmm_code',
        'name',
        'intake_type',
        'unit',
        'watershed',
        'province',
        'city_id',
        'district_id',
        'village_id',
        'latitude',
        'longitude',
        'people',
        'debit',
        'pump_type',
        'head_pompa',
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
        return RiverIntake::all();
    }

    public static function store(Request $request)
    {
        RiverIntake::create($request->all());
    }

    public static function edit(Request $request, RiverIntake $riverintake)
    {
        $riverintake->update($request->all());
    }
}
