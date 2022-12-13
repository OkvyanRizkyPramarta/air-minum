<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Statistic extends Model
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
        return Statistic::all();
    }

    public static function store(Request $request)
    {
        Statistic::create($request->all());
    }

    public static function edit(Request $request, Statistic $statistic)
    {
        $statistic->update($request->all());
    }
}
