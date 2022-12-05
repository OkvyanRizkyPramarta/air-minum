<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'prov_id',
    ];

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
