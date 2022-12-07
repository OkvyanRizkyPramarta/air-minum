<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postal_code',
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

    public function waterspring()
    {
       return $this->hasMany(WaterSpring::class);
    }

    public static function index()
    {
        return District::all();
    }

    public static function store(Request $request)
    {
        District::create($request->all());
    }

    public static function edit(Request $request, District $district)
    {
        $district->update($request->all());
    }
}
