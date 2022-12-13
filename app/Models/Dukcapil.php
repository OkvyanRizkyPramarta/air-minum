<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dukcapil extends Model
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
        return Dukcapil::all();
    }

    public static function store(Request $request)
    {
        Dukcapil::create($request->all());
    }

    public static function edit(Request $request, Dukcapil $dukcapil)
    {
        $dukcapil->update($request->all());
    }
}
