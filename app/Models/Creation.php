<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Creation extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'file',
        'data',
        'show',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public static function index()
    {
        return Creation::all();
    }

    public static function store(Request $request)
    {
        Creation::create($request->all());
    }

    public static function edit(Request $request, Creation $creation)
    {
        $creation->update($request->all());
    }
}
