<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Map;
use App\Models\Population;
use App\Models\MunicipalWaterwork;

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

    public function UserPeta(Request $request)
    {
        return view('user.peta');
    }

    public function UserPetaPDAM(Request $request)
    {
        $municipalwaterwork = MunicipalWaterwork::index();
        return view('user.peta.pdam', compact('municipalwaterwork'));
    }

    public function UserPetaPopulasi(Request $request)
    {
        $population = Population::index();
        return view('user.peta.populasi', compact('population'));
    }

    public function UserUlasan(Request $request)
    {
        $comment = Comment::index();
        return view('user.ulasan', compact('comment'));
    }
}
