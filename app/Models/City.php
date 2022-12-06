<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ocean_area',
        'mainland_area',
        'total_area',
        'oap',
        'year',
    ];

    public function population()
    {
       return $this->hasMany(Population::class);
    }

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
        return City::all();
    }

    public static function store(Request $request)
    {
        City::create($request->all());
    }

    public static function edit(Request $request, City $city)
    {
        $city->update($request->all());
    }

}
