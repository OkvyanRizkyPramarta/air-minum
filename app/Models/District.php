<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'dis_name',
        'city_id',
    ];

    public function riverintake()
    {
       return $this->hasMany(RiverIntake::class);
    }

    public function watertank()
    {
       return $this->hasMany(WaterTank::class);
    }

    public function waterwell()
    {
       return $this->hasMany(WaterWell::class);
    }

    public static function index()
    {
        return District::all();
    }

    public static function store(Request $request)
    {
        District::create($request->all());
    }

    public static function edit(Request $request, District $district)
    {
        $district->update($request->all());
    }
}
