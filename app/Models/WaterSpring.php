<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaterSpring extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'district_id',
        'file',
        'show',
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
