<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'file',
        'year',
    ];

    public function city()
    {
       return $this->belongsTo(City::class);
    }
    
    public static function index()
    {
        return File::all();
    }

    public static function store(Request $request)
    {
        File::create($request->all());
    }

    public static function edit(Request $request, File $file)
    {
        $file->update($request->all());
    }
}
