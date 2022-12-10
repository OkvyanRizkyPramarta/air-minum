<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'SuperAdmin') {
                return redirect()->intended('/superadmin/index');
            } elseif ($user->role == 'SubAdmin') {
                return redirect()->intended('/subadmin/index');
            } elseif ($user->role == 'AdminPU') {
                return redirect()->intended('/adminpu/index');
            } elseif ($user->role == 'AdminX') {
                return redirect()->intended('/adminx/index');
            }
        }
        return view('auth.login');
    }   

    public function login(Request $request)
    {

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->role == 'SuperAdmin') {
                    $request->session()->regenerate();
                    return redirect()->intended('/superadmin/index');
                } elseif ($user->role == 'SubAdmin') {
                    $request->session()->regenerate();
                    return redirect()->intended('/subadmin/index');
                } elseif ($user->role == 'AdminPU') {
                    $request->session()->regenerate();
                    return redirect()->intended('/adminpu/index');
                } elseif ($user->role == 'AdminX') {
                    $request->session()->regenerate();
                    return redirect()->intended('/adminx/index');
                }
                return redirect()->session()->regenerate();
            }

        return redirect('login')
                ->withInput()
                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }  
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
