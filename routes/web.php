<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/tablesuperadmin', function () {
    return view('tablesuperadmin');
});

Route::get('/formsuperadmin', function () {
    return view('formsuperadmin');
});

// login Owner
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.admin')->middleware('guest');
Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('/superadmin/table/city/index', [SuperAdminController::class, 'AdminIndexCity'])->name('superadmin.table.city.index');
Route::get('/superadmin/table/district/index', [SuperAdminController::class, 'AdminIndexDistrict'])->name('superadmin.table.district.index'); 

Route::middleware(['auth', 'SuperAdmin'])->group(function () {
    Route::get('/superadmin/index', function () {
        return view('superadmin.index');
    });
});

Route::middleware(['auth', 'AdminSub'])->group(function () {
    Route::get('/adminsub/index', function () {
        return view('adminsub.index');
    });
});

Route::middleware(['auth', 'AdminPU'])->group(function () {
    Route::get('/adminpu/index', function () {
        return view('adminpu.index');
    });
});

Route::middleware(['auth', 'AdminX'])->group(function () {
    Route::get('/adminx/index', function () {
        return view('adminx.index');
    });
});

Route::get('/table/index', function () {
    return view('tablesuperadmin');
});

