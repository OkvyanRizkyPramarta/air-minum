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
Route::get('/superadmin/table/city/create', [SuperAdminController::class, 'AdminCreateCity'])->name('superadmin.table.city.create'); 
Route::post('/superadmin/table/city/create', [SuperAdminController::class, 'AdminStoreCity'])->name('superadmin.table.city.store');
Route::get('/superadmin/table/city/edit/{city}', [SuperAdminController::class, 'AdminEditCity'])->name('superadmin.table.city.edit');
Route::put('/superadmin/table/city/update/{city}', [SuperAdminController::class, 'AdminUpdateCity'])->name('superadmin.table.city.update');
Route::delete('/superadmin/table/city/index/{city}', [SuperAdminController::class, 'AdminDestroyCity'])->name('superadmin.table.city.destroy');

Route::get('/superadmin/table/district/index', [SuperAdminController::class, 'AdminIndexDistrict'])->name('superadmin.table.district.index');
Route::get('/superadmin/table/district/create', [SuperAdminController::class, 'AdminCreateDistrict'])->name('superadmin.table.district.create'); 
Route::post('/superadmin/table/district/create', [SuperAdminController::class, 'AdminStoreDistrict'])->name('superadmin.table.district.store');
Route::get('/superadmin/table/district/edit/{district}', [SuperAdminController::class, 'AdminEditDistrict'])->name('superadmin.table.district.edit');
Route::put('/superadmin/table/district/update/{district}', [SuperAdminController::class, 'AdminUpdateDistrict'])->name('superadmin.table.district.update');
Route::delete('/superadmin/table/district/index/{district}', [SuperAdminController::class, 'AdminDestroyDistrict'])->name('superadmin.table.district.destroy');

Route::get('/superadmin/table/population/index', [SuperAdminController::class, 'AdminIndexPopulation'])->name('superadmin.table.population.index'); 
Route::get('/superadmin/table/population/create', [SuperAdminController::class, 'AdminCreatePopulation'])->name('superadmin.table.population.create'); 
Route::post('/superadmin/table/population/create', [SuperAdminController::class, 'AdminStorePopulation'])->name('superadmin.table.population.store');
Route::get('/superadmin/table/population/edit/{population}', [SuperAdminController::class, 'AdminEditPopulation'])->name('superadmin.table.population.edit');
Route::put('/superadmin/table/population/update/{population}', [SuperAdminController::class, 'AdminUpdatePopulation'])->name('superadmin.table.population.update');
Route::delete('/superadmin/table/population/index/{population}', [SuperAdminController::class, 'AdminDestroyPopulation'])->name('superadmin.table.population.destroy');

Route::get('/superadmin/table/riverintake/index', [SuperAdminController::class, 'AdminIndexRiverIntake'])->name('superadmin.table.riverintake.index'); 
Route::get('/superadmin/table/riverintake/create', [SuperAdminController::class, 'AdminCreateRiverIntake'])->name('superadmin.table.riverintake.create'); 
Route::post('/superadmin/table/riverintake/create', [SuperAdminController::class, 'AdminStoreRiverIntake'])->name('superadmin.table.riverintake.store');
Route::get('/superadmin/table/riverintake/edit/{riverintake}', [SuperAdminController::class, 'AdminEditRiverIntake'])->name('superadmin.table.riverintake.edit');
Route::put('/superadmin/table/riverintake/update/{riverintake}', [SuperAdminController::class, 'AdminUpdateRiverIntake'])->name('superadmin.table.riverintake.update');
Route::delete('/superadmin/table/riverintake/index/{riverintake}', [SuperAdminController::class, 'AdminDestroyRiverIntake'])->name('superadmin.table.riverintake.destroy');

Route::get('/superadmin/table/watertank/index', [SuperAdminController::class, 'AdminIndexWatertank'])->name('superadmin.table.watertank.index'); 
Route::get('/superadmin/table/watertank/create', [SuperAdminController::class, 'AdminCreateWatertank'])->name('superadmin.table.watertank.create'); 
Route::post('/superadmin/table/watertank/create', [SuperAdminController::class, 'AdminStoreWatertank'])->name('superadmin.table.watertank.store');
Route::get('/superadmin/table/watertank/edit/{watertank}', [SuperAdminController::class, 'AdminEditWatertank'])->name('superadmin.table.watertank.edit');
Route::put('/superadmin/table/watertank/update/{watertank}', [SuperAdminController::class, 'AdminUpdateWatertank'])->name('superadmin.table.watertank.update');
Route::delete('/superadmin/table/watertank/index/{watertank}', [SuperAdminController::class, 'AdminDestroyWatertank'])->name('superadmin.table.watertank.destroy');

Route::get('/superadmin/table/municipalwaterwork/index', [SuperAdminController::class, 'AdminIndexMunicipalWaterwork'])->name('superadmin.table.municipalwaterwork.index'); 
Route::get('/superadmin/table/municipalwaterwork/create', [SuperAdminController::class, 'AdminCreateMunicipalWaterwork'])->name('superadmin.table.municipalwaterwork.create'); 
Route::post('/superadmin/table/municipalwaterwork/create', [SuperAdminController::class, 'AdminStoreMunicipalWaterwork'])->name('superadmin.table.municipalwaterwork.store');
Route::get('/superadmin/table/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'AdminEditMunicipalWaterwork'])->name('superadmin.table.municipalwaterwork.edit');
Route::put('/superadmin/table/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'AdminUpdateMunicipalWaterwork'])->name('superadmin.table.municipalwaterwork.update');
Route::delete('/superadmin/table/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'AdminDestroyMunicipalWaterwork'])->name('superadmin.table.municipalwaterwork.destroy');

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

