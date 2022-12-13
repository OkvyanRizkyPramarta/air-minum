<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WaterResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'file',
        'show',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public static function index()
    {
        return WaterResource::all();
    }

    public static function store(Request $request)
    {
        WaterResource::create($request->all());
    }

    public static function edit(Request $request, WaterResource $waterresource)
    {
        $waterresource->update($request->all());
    }
}
