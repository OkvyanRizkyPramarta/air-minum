<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

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