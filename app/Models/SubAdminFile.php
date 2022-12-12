<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAdminFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'file',
        'year',
        'show',
    ];

    public function city()
    {
       return $this->belongsTo(City::class);
    }
    
    public static function index()
    {
        return SubAdminFile::all();
    }

    public static function store(Request $request)
    {
        SubAdminFile::create($request->all());
    }

    public static function edit(Request $request, SubAdminFile $subadminfile)
    {
        $subadminfile->update($request->all());
    }
}
