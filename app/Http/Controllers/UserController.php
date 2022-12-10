<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Comment;

class UserController extends Controller
{
    public function UserIndex(Request $request)
    {
        return view('user.index');
    }

    public function UserStoreComment(Request $request)
    {
        Comment::store($request);
        Alert::toast('Kritik Dan Saran Berhasil Disimpan', 'success');
        return redirect()->back();
    }

    public function UserUlasan(Request $request)
    {
        $comment = Comment::index();
        return view('user.ulasan', compact('comment'));
    }
}
