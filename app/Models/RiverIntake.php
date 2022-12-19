<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RiverIntake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        // 'district_id',
        'file',
        'show',
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
        return RiverIntake::all();
    }

    public static function store(Request $request)
    {
        RiverIntake::create($request->all());
    }

    public static function edit(Request $request, RiverIntake $riverintake)
    {
        $riverintake->update($request->all());
    }
}
