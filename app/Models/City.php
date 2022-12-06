<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ocean_area',
        'mmainland_area',
        'total_area',
        'oap',
        'year',
    ];

    public function population()
    {
       return $this->hasMany(Population::class);
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
