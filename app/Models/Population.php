<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Population extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'district_id',
        'male_total',
        'female_total',
        'population_total',
        'maleoap_total',
        'femaleoap_total',
        'populationoap_total',
        'malenonoap_total',
        'femalenonoap_total',
        'populationnonoap_total',
        'year',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public static function index()
    {
        return Population::all();
    }

    public static function store(Request $request)
    {
        Population::create($request->all());
    }

    public static function edit(Request $request, Population $population)
    {
        $population->update($request->all());
    }
}
