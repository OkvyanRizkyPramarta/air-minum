<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telp_number',
        'email',
        'description',
    ];

    public static function index()
    {
        return Comment::all();
    }

    public static function store(Request $request)
    {
        Comment::create($request->all());
    }
}
