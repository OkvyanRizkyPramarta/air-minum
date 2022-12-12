<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SuperAdminFile extends Model
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
        return SuperAdminFile::all();
    }

    public static function store(Request $request)
    {
        SuperAdminFile::create($request->all());
    }

    public static function edit(Request $request, SuperAdminFile $superadminfile)
    {
        $superadminfile->update($request->all());
    }
}
