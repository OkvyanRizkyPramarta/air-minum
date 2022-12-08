<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function index()
    {
        return Village::all();
    }

    public static function store(Request $request)
    {
        Village::create($request->all());
    }

    public static function edit(Request $request, Village $village)
    {
        $village->update($request->all());
    }
}
