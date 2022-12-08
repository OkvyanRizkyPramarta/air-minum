<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'image',
    ];

    public function city()
    {
       return $this->belongsTo(City::class);
    }
    
    public static function index()
    {
        return Map::all();
    }

    public static function store(Request $request)
    {
        Map::create($request->all());
    }

    public static function edit(Request $request, Map $map)
    {
        $map->update($request->all());
    }
}
