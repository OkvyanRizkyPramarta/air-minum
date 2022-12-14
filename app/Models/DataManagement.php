<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataManagement extends Model
{
    use HasFactory;

    protected $table = "data_managements";

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
        return DataManagement::all();
    }

    public static function store(Request $request)
    {
        DataManagement::create($request->all());
    }

    public static function edit(Request $request, DataManagement $datamanagement)
    {
        $datamanagement->update($request->all());
    }
}
