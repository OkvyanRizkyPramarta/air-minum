<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminPUController;
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

Route::get('/', [UserController::class, 'UserIndex'])->name('user.index');
Route::post('/', [UserController::class, 'UserStoreComment'])->name('user.comment.store');
Route::get('/peta', [UserController::class, 'UserPeta'])->name('user.peta');
    Route::get('/peta/kota/jayapura', [UserController::class, 'UserPetaKotaJayapura'])->name('user.peta.kota.jayapura');
    Route::get('/peta/kabupaten/jayapura', [UserController::class, 'UserPetaKabupatenJayapura'])->name('user.peta.kabupaten.jayapura');
    
    Route::get('/peta/pdam', [UserController::class, 'UserPetaPDAM'])->name('user.peta.pdam');
    Route::get('/peta/populasi', [UserController::class, 'UserPetaPopulasi'])->name('user.peta.populasi');
    Route::get('/peta/intakesungai', [UserController::class, 'UserPetaIntakeSungai'])->name('user.peta.intakesungai');
    Route::get('/peta/mataair', [UserController::class, 'UserPetaMataAir'])->name('user.peta.mataair');
    Route::get('/peta/tangkiair', [UserController::class, 'UserPetaTangkiAir'])->name('user.peta.tangkiair');

    Route::get('/airminum/kota/jayapura', [UserController::class, 'UserAirMinumKotaJayapura'])->name('user.airminum.kotajayapura');
    Route::get('/airminum/kota/jayapura/pdam', [UserController::class, 'UserAirMinumKotaJayapuraPDAM'])->name('user.airminum.kotajayapura.pdam');

Route::get('/ulasan', [UserController::class, 'UserUlasan'])->name('user.ulasan');

// login Owner
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.admin')->middleware('guest');
Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

Route::middleware(['auth', 'SuperAdmin'])->group(function () {

    Route::get('/superadmin/index', [SuperAdminController::class, 'SuperAdminIndex']);

    Route::get('/superadmin/table/city/index', [SuperAdminController::class, 'AdminIndexCity'])->name('superadmin.table.city.index');
    Route::get('/superadmin/table/city/create', [SuperAdminController::class, 'AdminCreateCity'])->name('superadmin.table.city.create'); 
    Route::post('/superadmin/table/city/create', [SuperAdminController::class, 'AdminStoreCity'])->name('superadmin.table.city.store');
    Route::get('/superadmin/table/city/edit/{city}', [SuperAdminController::class, 'AdminEditCity'])->name('superadmin.table.city.edit');
    Route::put('/superadmin/table/city/update/{city}', [SuperAdminController::class, 'AdminUpdateCity'])->name('superadmin.table.city.update');
    Route::delete('/superadmin/table/city/index/{city}', [SuperAdminController::class, 'AdminDestroyCity'])->name('superadmin.table.city.destroy');

    //Kota Jayapura -> WaterResource
    Route::get('/superadmin/airbersih/kota/jayapura/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceIndex'])->name('superadmin.airbersih.kotajayapura.waterresource.index');
    Route::get('/superadmin/airbersih/kota/jayapura/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceCreate'])->name('superadmin.airbersih.kotajayapura.waterresource.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceStore'])->name('superadmin.airbersih.kotajayapura.waterresource.store');
    Route::get('/superadmin/airbersih/kota/jayapura/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceEdit'])->name('superadmin.airbersih.kotajayapura.waterresource.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceUpdate'])->name('superadmin.airbersih.kotajayapura.waterresource.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceDestroy'])->name('superadmin.airbersih.kotajayapura.waterresource.destroy');

     //Superadmin Kota Jayapura -> Dukcapil
    Route::get('/superadmin/airbersih/kota/jayapura/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilIndex'])->name('superadmin.airbersih.kotajayapura.dukcapil.index');
    Route::get('/superadmin/airbersih/kota/jayapura/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilCreate'])->name('superadmin.airbersih.kotajayapura.dukcapil.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilStore'])->name('superadmin.airbersih.kotajayapura.dukcapil.store');
    Route::get('/superadmin/airbersih/kota/jayapura/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilEdit'])->name('superadmin.airbersih.kotajayapura.dukcapil.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilUpdate'])->name('superadmin.airbersih.kotajayapura.dukcapil.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilDestroy'])->name('superadmin.airbersih.kotajayapura.dukcapil.destroy');

    //Kota Jayapura -> Badan Pusat Statistik (BPS)
    Route::get('/superadmin/airbersih/kota/jayapura/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticIndex'])->name('superadmin.airbersih.kotajayapura.statistic.index');
    Route::get('/superadmin/airbersih/kota/jayapura/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticCreate'])->name('superadmin.airbersih.kotajayapura.statistic.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticStore'])->name('superadmin.airbersih.kotajayapura.statistic.store');
    Route::get('/superadmin/airbersih/kota/jayapura/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticEdit'])->name('superadmin.airbersih.kotajayapura.statistic.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticUpdate'])->name('superadmin.airbersih.kotajayapura.statistic.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticDestroy'])->name('superadmin.airbersih.kotajayapura.statistic.destroy');

    //Kota Jayapura -> Badan Pengelolaan dan Pendataan Daerah
    Route::get('/superadmin/airbersih/kota/jayapura/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDataProcesIndex'])->name('superadmin.airbersih.kotajayapura.dataproces.index');
    Route::get('/superadmin/airbersih/kota/jayapura/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDataProcesCreate'])->name('superadmin.airbersih.kotajayapura.dataproces.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDataProcesStore'])->name('superadmin.airbersih.kotajayapura.dataproces.store');
    Route::get('/superadmin/airbersih/kota/jayapura/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDataProcesEdit'])->name('superadmin.airbersih.kotajayapura.dataproces.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDataProcesUpdate'])->name('superadmin.airbersih.kotajayapura.dataproces.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDataProcesDestroy'])->name('superadmin.airbersih.kotajayapura.dataproces.destroy');

    Route::get('/superadmin/airbersih/kota/jayapura/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraRiverintakeIndex'])->name('superadmin.airbersih.kotajayapura.riverintake.index');
    Route::get('/superadmin/airbersih/kota/jayapura/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraRiverintakeCreate'])->name('superadmin.airbersih.kotajayapura.riverintake.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraRiverintakeStore'])->name('superadmin.airbersih.kotajayapura.riverintake.store');
    Route::get('/superadmin/airbersih/kota/jayapura/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraRiverintakeEdit'])->name('superadmin.airbersih.kotajayapura.riverintake.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraRiverintakeUpdate'])->name('superadmin.airbersih.kotajayapura.riverintake.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraRiverintakeDestroy'])->name('superadmin.airbersih.kotajayapura.riverintake.destroy');

    Route::get('/superadmin/airbersih/kota/jayapura/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterwellIndex'])->name('superadmin.airbersih.kotajayapura.waterwell.index');
    Route::get('/superadmin/airbersih/kota/jayapura/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterwellCreate'])->name('superadmin.airbersih.kotajayapura.waterwell.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterwellStore'])->name('superadmin.airbersih.kotajayapura.waterwell.store');
    Route::get('/superadmin/airbersih/kota/jayapura/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterwellEdit'])->name('superadmin.airbersih.kotajayapura.waterwell.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterwellUpdate'])->name('superadmin.airbersih.kotajayapura.waterwell.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterwellDestroy'])->name('superadmin.airbersih.kotajayapura.waterwell.destroy');

    Route::get('/superadmin/airbersih/kota/jayapura/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWatertankIndex'])->name('superadmin.airbersih.kotajayapura.watertank.index');
    Route::get('/superadmin/airbersih/kota/jayapura/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWatertankCreate'])->name('superadmin.airbersih.kotajayapura.watertank.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWatertankStore'])->name('superadmin.airbersih.kotajayapura.watertank.store');
    Route::get('/superadmin/airbersih/kota/jayapura/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWatertankEdit'])->name('superadmin.airbersih.kotajayapura.watertank.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWatertankUpdate'])->name('superadmin.airbersih.kotajayapura.watertank.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWatertankDestroy'])->name('superadmin.airbersih.kotajayapura.watertank.destroy');

    Route::get('/superadmin/airbersih/kota/jayapura/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterspringIndex'])->name('superadmin.airbersih.kotajayapura.waterspring.index');
    Route::get('/superadmin/airbersih/kota/jayapura/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterspringCreate'])->name('superadmin.airbersih.kotajayapura.waterspring.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterspringStore'])->name('superadmin.airbersih.kotajayapura.waterspring.store');
    Route::get('/superadmin/airbersih/kota/jayapura/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterspringEdit'])->name('superadmin.airbersih.kotajayapura.waterspring.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterspringUpdate'])->name('superadmin.airbersih.kotajayapura.waterspring.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterspringDestroy'])->name('superadmin.airbersih.kotajayapura.waterspring.destroy');

    Route::get('/superadmin/airbersih/kota/jayapura/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkIndex'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.index');
    Route::get('/superadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkCreate'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkStore'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.store');
    Route::get('/superadmin/airbersih/kota/jayapura/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkEdit'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.destroy');



    //Kabupaten Jayapura
    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterResourceIndex'])->name('superadmin.airbersih.kabupatenjayapura.waterresource.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterResourceCreate'])->name('superadmin.airbersih.kabupatenjayapura.waterresource.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterResourceStore'])->name('superadmin.airbersih.kabupatenjayapura.waterresource.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterResourceEdit'])->name('superadmin.airbersih.kabupatenjayapura.waterresource.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterResourceUpdate'])->name('superadmin.airbersih.kabupatenjayapura.waterresource.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterResourceDestroy'])->name('superadmin.airbersih.kabupatenjayapura.waterresource.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDukcapilIndex'])->name('superadmin.airbersih.kabupatenjayapura.dukcapil.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDukcapilCreate'])->name('superadmin.airbersih.kabupatenjayapura.dukcapil.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDukcapilStore'])->name('superadmin.airbersih.kabupatenjayapura.dukcapil.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDukcapilEdit'])->name('superadmin.airbersih.kabupatenjayapura.dukcapil.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDukcapilUpdate'])->name('superadmin.airbersih.kabupatenjayapura.dukcapil.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDukcapilDestroy'])->name('superadmin.airbersih.kabupatenjayapura.dukcapil.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraStatisticIndex'])->name('superadmin.airbersih.kabupatenjayapura.statistic.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraStatisticCreate'])->name('superadmin.airbersih.kabupatenjayapura.statistic.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraStatisticStore'])->name('superadmin.airbersih.kabupatenjayapura.statistic.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraStatisticEdit'])->name('superadmin.airbersih.kabupatenjayapura.statistic.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraStatisticUpdate'])->name('superadmin.airbersih.kabupatenjayapura.statistic.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraStatisticDestroy'])->name('superadmin.airbersih.kabupatenjayapura.statistic.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDataProcesIndex'])->name('superadmin.airbersih.kabupatenjayapura.dataproces.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDataProcesCreate'])->name('superadmin.airbersih.kabupatenjayapura.dataproces.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDataProcesStore'])->name('superadmin.airbersih.kabupatenjayapura.dataproces.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDataProcesEdit'])->name('superadmin.airbersih.kabupatenjayapura.dataproces.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDataProcesUpdate'])->name('superadmin.airbersih.kabupatenjayapura.dataproces.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraDataProcesDestroy'])->name('superadmin.airbersih.kabupatenjayapura.dataproces.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraRiverintakeIndex'])->name('superadmin.airbersih.kabupatenjayapura.riverintake.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraRiverintakeCreate'])->name('superadmin.airbersih.kabupatenjayapura.riverintake.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraRiverintakeStore'])->name('superadmin.airbersih.kabupatenjayapura.riverintake.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraRiverintakeEdit'])->name('superadmin.airbersih.kabupatenjayapura.riverintake.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraRiverintakeUpdate'])->name('superadmin.airbersih.kabupatenjayapura.riverintake.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraRiverintakeDestroy'])->name('superadmin.airbersih.kabupatenjayapura.riverintake.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterwellIndex'])->name('superadmin.airbersih.kabupatenjayapura.waterwell.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterwellCreate'])->name('superadmin.airbersih.kabupatenjayapura.waterwell.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterwellStore'])->name('superadmin.airbersih.kabupatenjayapura.waterwell.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterwellEdit'])->name('superadmin.airbersih.kabupatenjayapura.waterwell.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterwellUpdate'])->name('superadmin.airbersih.kabupatenjayapura.waterwell.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterwellDestroy'])->name('superadmin.airbersih.kabupatenjayapura.waterwell.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWatertankIndex'])->name('superadmin.airbersih.kabupatenjayapura.watertank.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWatertankCreate'])->name('superadmin.airbersih.kabupatenjayapura.watertank.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWatertankStore'])->name('superadmin.airbersih.kabupatenjayapura.watertank.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWatertankEdit'])->name('superadmin.airbersih.kabupatenjayapura.watertank.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWatertankUpdate'])->name('superadmin.airbersih.kabupatenjayapura.watertank.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWatertankDestroy'])->name('superadmin.airbersih.kabupatenjayapura.watertank.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterspringIndex'])->name('superadmin.airbersih.kabupatenjayapura.waterspring.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterspringCreate'])->name('superadmin.airbersih.kabupatenjayapura.waterspring.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterspringStore'])->name('superadmin.airbersih.kabupatenjayapura.waterspring.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterspringEdit'])->name('superadmin.airbersih.kabupatenjayapura.waterspring.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterspringUpdate'])->name('superadmin.airbersih.kabupatenjayapura.waterspring.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraWaterspringDestroy'])->name('superadmin.airbersih.kabupatenjayapura.waterspring.destroy');

    Route::get('/superadmin/airbersih/kabupaten/jayapura/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.destroy');



    //Kabupaten Biak Numfor
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterResourceIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterresource.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterResourceCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterresource.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterResourceStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterresource.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterResourceEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterresource.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterResourceUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterresource.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterResourceDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterresource.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDukcapilIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDukcapilCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDukcapilStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDukcapilEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDukcapilUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDukcapilDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforStatisticIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.statistic.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforStatisticCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.statistic.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforStatisticStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.statistic.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforStatisticEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.statistic.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforStatisticUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.statistic.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforStatisticDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.statistic.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDataProcesIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.dataproces.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDataProcesCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.dataproces.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDataProcesStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.dataproces.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDataProcesEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.dataproces.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDataProcesUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.dataproces.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforDataProcesDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.dataproces.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforRiverintakeIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.riverintake.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforRiverintakeCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.riverintake.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforRiverintakeStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.riverintake.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforRiverintakeEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.riverintake.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforRiverintakeUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.riverintake.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforRiverintakeDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.riverintake.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterwellIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterwell.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterwellCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterwell.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterwellStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterwell.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterwellEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterwell.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterwellUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterwell.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterwellDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterwell.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWatertankIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.watertank.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWatertankCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.watertank.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWatertankStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.watertank.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWatertankEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.watertank.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWatertankUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.watertank.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWatertankDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.watertank.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterspringIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterspring.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterspringCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterspring.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterspringStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterspring.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterspringEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterspring.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterspringUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterspring.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforWaterspringDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.waterspring.destroy');

    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.index');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.create'); 
    Route::post('/superadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.store');
    Route::get('/superadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.edit');
    Route::put('/superadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.update');
    Route::delete('/superadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabBiakNumforMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.destroy');

     //Kabupaten KEEROM
    Route::get('/superadmin/airbersih/kabupaten/keerom/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterResourceIndex'])->name('superadmin.airbersih.kabupatenkeerom.waterresource.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterResourceCreate'])->name('superadmin.airbersih.kabupatenkeerom.waterresource.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterResourceStore'])->name('superadmin.airbersih.kabupatenkeerom.waterresource.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterResourceEdit'])->name('superadmin.airbersih.kabupatenkeerom.waterresource.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterResourceUpdate'])->name('superadmin.airbersih.kabupatenkeerom.waterresource.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterResourceDestroy'])->name('superadmin.airbersih.kabupatenkeerom.waterresource.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDukcapilIndex'])->name('superadmin.airbersih.kabupatenkeerom.dukcapil.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDukcapilCreate'])->name('superadmin.airbersih.kabupatenkeerom.dukcapil.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDukcapilStore'])->name('superadmin.airbersih.kabupatenkeerom.dukcapil.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDukcapilEdit'])->name('superadmin.airbersih.kabupatenkeerom.dukcapil.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDukcapilUpdate'])->name('superadmin.airbersih.kabupatenkeerom.dukcapil.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDukcapilDestroy'])->name('superadmin.airbersih.kabupatenkeerom.dukcapil.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromStatisticIndex'])->name('superadmin.airbersih.kabupatenkeerom.statistic.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromStatisticCreate'])->name('superadmin.airbersih.kabupatenkeerom.statistic.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromStatisticStore'])->name('superadmin.airbersih.kabupatenkeerom.statistic.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromStatisticEdit'])->name('superadmin.airbersih.kabupatenkeerom.statistic.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromStatisticUpdate'])->name('superadmin.airbersih.kabupatenkeerom.statistic.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromStatisticDestroy'])->name('superadmin.airbersih.kabupatenkeerom.statistic.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDataProcesIndex'])->name('superadmin.airbersih.kabupatenkeerom.dataproces.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDataProcesCreate'])->name('superadmin.airbersih.kabupatenkeerom.dataproces.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDataProcesStore'])->name('superadmin.airbersih.kabupatenkeerom.dataproces.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDataProcesEdit'])->name('superadmin.airbersih.kabupatenkeerom.dataproces.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDataProcesUpdate'])->name('superadmin.airbersih.kabupatenkeerom.dataproces.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromDataProcesDestroy'])->name('superadmin.airbersih.kabupatenkeerom.dataproces.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromRiverintakeIndex'])->name('superadmin.airbersih.kabupatenkeerom.riverintake.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromRiverintakeCreate'])->name('superadmin.airbersih.kabupatenkeerom.riverintake.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromRiverintakeStore'])->name('superadmin.airbersih.kabupatenkeerom.riverintake.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromRiverintakeEdit'])->name('superadmin.airbersih.kabupatenkeerom.riverintake.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromRiverintakeUpdate'])->name('superadmin.airbersih.kabupatenkeerom.riverintake.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromRiverintakeDestroy'])->name('superadmin.airbersih.kabupatenkeerom.riverintake.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterwellIndex'])->name('superadmin.airbersih.kabupatenkeerom.waterwell.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterwellCreate'])->name('superadmin.airbersih.kabupatenkeerom.waterwell.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterwellStore'])->name('superadmin.airbersih.kabupatenkeerom.waterwell.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterwellEdit'])->name('superadmin.airbersih.kabupatenkeerom.waterwell.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterwellUpdate'])->name('superadmin.airbersih.kabupatenkeerom.waterwell.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterwellDestroy'])->name('superadmin.airbersih.kabupatenkeerom.waterwell.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWatertankIndex'])->name('superadmin.airbersih.kabupatenkeerom.watertank.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWatertankCreate'])->name('superadmin.airbersih.kabupatenkeerom.watertank.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWatertankStore'])->name('superadmin.airbersih.kabupatenkeerom.watertank.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWatertankEdit'])->name('superadmin.airbersih.kabupatenkeerom.watertank.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWatertankUpdate'])->name('superadmin.airbersih.kabupatenkeerom.watertank.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWatertankDestroy'])->name('superadmin.airbersih.kabupatenkeerom.watertank.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterspringIndex'])->name('superadmin.airbersih.kabupatenkeerom.waterspring.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterspringCreate'])->name('superadmin.airbersih.kabupatenkeerom.waterspring.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterspringStore'])->name('superadmin.airbersih.kabupatenkeerom.waterspring.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterspringEdit'])->name('superadmin.airbersih.kabupatenkeerom.waterspring.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterspringUpdate'])->name('superadmin.airbersih.kabupatenkeerom.waterspring.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromWaterspringDestroy'])->name('superadmin.airbersih.kabupatenkeerom.waterspring.destroy');

    Route::get('/superadmin/airbersih/kabupaten/keerom/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.index');
    Route::get('/superadmin/airbersih/kabupaten/keerom/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.create'); 
    Route::post('/superadmin/airbersih/kabupaten/keerom/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.store');
    Route::get('/superadmin/airbersih/kabupaten/keerom/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.edit');
    Route::put('/superadmin/airbersih/kabupaten/keerom/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.update');
    Route::delete('/superadmin/airbersih/kabupaten/keerom/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabKeeromMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.destroy');

     //Kabupaten Sarmi
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterResourceIndex'])->name('superadmin.airbersih.kabupatensarmi.waterresource.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterResourceCreate'])->name('superadmin.airbersih.kabupatensarmi.waterresource.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterResourceStore'])->name('superadmin.airbersih.kabupatensarmi.waterresource.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterResourceEdit'])->name('superadmin.airbersih.kabupatensarmi.waterresource.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterResourceUpdate'])->name('superadmin.airbersih.kabupatensarmi.waterresource.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterResourceDestroy'])->name('superadmin.airbersih.kabupatensarmi.waterresource.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDukcapilIndex'])->name('superadmin.airbersih.kabupatensarmi.dukcapil.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDukcapilCreate'])->name('superadmin.airbersih.kabupatensarmi.dukcapil.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDukcapilStore'])->name('superadmin.airbersih.kabupatensarmi.dukcapil.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDukcapilEdit'])->name('superadmin.airbersih.kabupatensarmi.dukcapil.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDukcapilUpdate'])->name('superadmin.airbersih.kabupatensarmi.dukcapil.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDukcapilDestroy'])->name('superadmin.airbersih.kabupatensarmi.dukcapil.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiStatisticIndex'])->name('superadmin.airbersih.kabupatensarmi.statistic.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiStatisticCreate'])->name('superadmin.airbersih.kabupatensarmi.statistic.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiStatisticStore'])->name('superadmin.airbersih.kabupatensarmi.statistic.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiStatisticEdit'])->name('superadmin.airbersih.kabupatensarmi.statistic.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiStatisticUpdate'])->name('superadmin.airbersih.kabupatensarmi.statistic.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiStatisticDestroy'])->name('superadmin.airbersih.kabupatensarmi.statistic.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDataProcesIndex'])->name('superadmin.airbersih.kabupatensarmi.dataproces.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDataProcesCreate'])->name('superadmin.airbersih.kabupatensarmi.dataproces.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDataProcesStore'])->name('superadmin.airbersih.kabupatensarmi.dataproces.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDataProcesEdit'])->name('superadmin.airbersih.kabupatensarmi.dataproces.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDataProcesUpdate'])->name('superadmin.airbersih.kabupatensarmi.dataproces.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiDataProcesDestroy'])->name('superadmin.airbersih.kabupatensarmi.dataproces.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiRiverintakeIndex'])->name('superadmin.airbersih.kabupatensarmi.riverintake.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiRiverintakeCreate'])->name('superadmin.airbersih.kabupatensarmi.riverintake.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiRiverintakeStore'])->name('superadmin.airbersih.kabupatensarmi.riverintake.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiRiverintakeEdit'])->name('superadmin.airbersih.kabupatensarmi.riverintake.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiRiverintakeUpdate'])->name('superadmin.airbersih.kabupatensarmi.riverintake.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiRiverintakeDestroy'])->name('superadmin.airbersih.kabupatensarmi.riverintake.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterwellIndex'])->name('superadmin.airbersih.kabupatensarmi.waterwell.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterwellCreate'])->name('superadmin.airbersih.kabupatensarmi.waterwell.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterwellStore'])->name('superadmin.airbersih.kabupatensarmi.waterwell.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterwellEdit'])->name('superadmin.airbersih.kabupatensarmi.waterwell.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterwellUpdate'])->name('superadmin.airbersih.kabupatensarmi.waterwell.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterwellDestroy'])->name('superadmin.airbersih.kabupatensarmi.waterwell.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWatertankIndex'])->name('superadmin.airbersih.kabupatensarmi.watertank.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWatertankCreate'])->name('superadmin.airbersih.kabupatensarmi.watertank.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWatertankStore'])->name('superadmin.airbersih.kabupatensarmi.watertank.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWatertankEdit'])->name('superadmin.airbersih.kabupatensarmi.watertank.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWatertankUpdate'])->name('superadmin.airbersih.kabupatensarmi.watertank.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWatertankDestroy'])->name('superadmin.airbersih.kabupatensarmi.watertank.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterspringIndex'])->name('superadmin.airbersih.kabupatensarmi.waterspring.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterspringCreate'])->name('superadmin.airbersih.kabupatensarmi.waterspring.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterspringStore'])->name('superadmin.airbersih.kabupatensarmi.waterspring.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterspringEdit'])->name('superadmin.airbersih.kabupatensarmi.waterspring.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiWaterspringUpdate'])->name('superadmin.airbersih.kabupatensarmi.waterspring.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiwaterspringDestroy'])->name('superadmin.airbersih.kabupatensarmi.waterspring.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/sarmi/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatensarmi.municipalwaterwork.index');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatensarmi.municipalwaterwork.create'); 
     Route::post('/superadmin/airbersih/kabupaten/sarmi/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatensarmi.municipalwaterwork.store');
     Route::get('/superadmin/airbersih/kabupaten/sarmi/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatensarmi.municipalwaterwork.edit');
     Route::put('/superadmin/airbersih/kabupaten/sarmi/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatensarmi.municipalwaterwork.update');
     Route::delete('/superadmin/airbersih/kabupaten/sarmi/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabSarmiMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatensarmi.municipalwaterwork.destroy');
});

Route::middleware(['auth', 'SubAdmin'])->group(function () {
    
    Route::get('/subadmin/index', [SubAdminController::class, 'SubAdminIndex']);

    Route::get('/subadmin/table/city/index', [SubAdminController::class, 'SubAdminIndexCity'])->name('subadmin.table.city.index');
    Route::get('/subadmin/table/city/create', [SubAdminController::class, 'SubAdminCreateCity'])->name('subadmin.table.city.create'); 
    Route::post('/subadmin/table/city/create', [SubAdminController::class, 'SubAdminStoreCity'])->name('subadmin.table.city.store');
    Route::get('/subadmin/table/city/edit/{city}', [SubAdminController::class, 'SubAdminEditCity'])->name('subadmin.table.city.edit');
    Route::put('/subadmin/table/city/update/{city}', [SubAdminController::class, 'SubAdminUpdateCity'])->name('subadmin.table.city.update');
    Route::delete('/subadmin/table/city/index/{city}', [SubAdminController::class, 'SubAdminDestroyCity'])->name('subadmin.table.city.destroy');

    Route::get('/subadmin/table/district/index', [SubAdminController::class, 'SubAdminIndexDistrict'])->name('subadmin.table.district.index');
    Route::get('/subadmin/table/district/create', [SubAdminController::class, 'SubAdminCreateDistrict'])->name('subadmin.table.district.create'); 
    Route::post('/subadmin/table/district/create', [SubAdminController::class, 'SubAdminStoreDistrict'])->name('subadmin.table.district.store');
    Route::get('/subadmin/table/district/edit/{district}', [SubAdminController::class, 'SubAdminEditDistrict'])->name('subadmin.table.district.edit');
    Route::put('/subadmin/table/district/update/{district}', [SubAdminController::class, 'SubAdminUpdateDistrict'])->name('subadmin.table.district.update');
    Route::delete('/subadmin/table/district/index/{district}', [SubAdminController::class, 'SubAdminDestroyDistrict'])->name('subadmin.table.district.destroy');

    Route::get('/subadmin/table/village/index', [SubAdminController::class, 'SubAdminIndexVillage'])->name('subadmin.table.village.index');
    Route::get('/subadmin/table/village/create', [SubAdminController::class, 'SubAdminCreateVillage'])->name('subadmin.table.village.create'); 
    Route::post('/subadmin/table/village/create', [SubAdminController::class, 'SubAdminStoreVillage'])->name('subadmin.table.village.store');
    Route::get('/subadmin/table/village/edit/{village}', [SubAdminController::class, 'SubAdminEditVillage'])->name('subadmin.table.village.edit');
    Route::put('/subadmin/table/village/update/{village}', [SubAdminController::class, 'SubAdminUpdateVillage'])->name('subadmin.table.village.update');
    Route::delete('/subadmin/table/village/index/{village}', [SubAdminController::class, 'SubAdminDestroyVillage'])->name('subadmin.table.village.destroy');

    Route::get('/subadmin/table/population/index', [SubAdminController::class, 'SubAdminIndexPopulation'])->name('subadmin.table.population.index'); 
    Route::get('/subadmin/table/population/create', [SubAdminController::class, 'SubAdminCreatePopulation'])->name('subadmin.table.population.create'); 
    Route::post('/subadmin/table/population/create', [SubAdminController::class, 'SubAdminStorePopulation'])->name('subadmin.table.population.store');
    Route::get('/subadmin/table/population/edit/{population}', [SubAdminController::class, 'SubAdminEditPopulation'])->name('subadmin.table.population.edit');
    Route::put('/subadmin/table/population/update/{population}', [SubAdminController::class, 'SubAdminUpdatePopulation'])->name('subadmin.table.population.update');
    Route::delete('/subadmin/table/population/index/{population}', [SubAdminController::class, 'SubAdminDestroyPopulation'])->name('subadmin.table.population.destroy');

    Route::get('/subadmin/table/riverintake/index', [SubAdminController::class, 'SubAdminIndexRiverIntake'])->name('subadmin.table.riverintake.index'); 
    Route::get('/subadmin/table/riverintake/create', [SubAdminController::class, 'SubAdminCreateRiverIntake'])->name('subadmin.table.riverintake.create'); 
    Route::post('/subadmin/table/riverintake/create', [SubAdminController::class, 'SubAdminStoreRiverIntake'])->name('subadmin.table.riverintake.store');
    Route::get('/subadmin/table/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminEditRiverIntake'])->name('subadmin.table.riverintake.edit');
    Route::put('/subadmin/table/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminUpdateRiverIntake'])->name('subadmin.table.riverintake.update');
    Route::delete('/subadmin/table/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminDestroyRiverIntake'])->name('subadmin.table.riverintake.destroy');

    Route::get('/subadmin/table/watertank/index', [SubAdminController::class, 'SubAdminIndexWatertank'])->name('subadmin.table.watertank.index'); 
    Route::get('/subadmin/table/watertank/create', [SubAdminController::class, 'SubAdminCreateWatertank'])->name('subadmin.table.watertank.create'); 
    Route::post('/subadmin/table/watertank/create', [SubAdminController::class, 'SubAdminStoreWatertank'])->name('subadmin.table.watertank.store');
    Route::get('/subadmin/table/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminEditWatertank'])->name('subadmin.table.watertank.edit');
    Route::put('/subadmin/table/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminUpdateWatertank'])->name('subadmin.table.watertank.update');
    Route::delete('/subadmin/table/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminDestroyWatertank'])->name('subadmin.table.watertank.destroy');

    Route::get('/subadmin/table/municipalwaterwork/index', [SubAdminController::class, 'SubAdminIndexMunicipalWaterwork'])->name('subadmin.table.municipalwaterwork.index'); 
    Route::get('/subadmin/table/municipalwaterwork/create', [SubAdminController::class, 'SubAdminCreateMunicipalWaterwork'])->name('subadmin.table.municipalwaterwork.create'); 
    Route::post('/subadmin/table/municipalwaterwork/create', [SubAdminController::class, 'SubAdminStoreMunicipalWaterwork'])->name('subadmin.table.municipalwaterwork.store');
    Route::get('/subadmin/table/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminEditMunicipalWaterwork'])->name('subadmin.table.municipalwaterwork.edit');
    Route::put('/subadmin/table/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminUpdateMunicipalWaterwork'])->name('subadmin.table.municipalwaterwork.update');
    Route::delete('/subadmin/table/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminDestroyMunicipalWaterwork'])->name('subadmin.table.municipalwaterwork.destroy');

    Route::get('/subadmin/table/waterwell/index', [SubAdminController::class, 'SubAdminIndexWaterwell'])->name('subadmin.table.waterwell.index'); 
    Route::get('/subadmin/table/waterwell/create', [SubAdminController::class, 'SubAdminCreateWaterwell'])->name('subadmin.table.waterwell.create'); 
    Route::post('/subadmin/table/waterwell/create', [SubAdminController::class, 'SubAdminStoreWaterwell'])->name('subadmin.table.waterwell.store');
    Route::put('/subadmin/table/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminUpdateWaterwell'])->name('subadmin.table.waterwell.update');
    Route::delete('/subadmin/table/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminDestroyWaterwell'])->name('subadmin.table.waterwell.destroy');
    Route::get('/subadmin/table/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminEditWaterwell'])->name('subadmin.table.waterwell.edit');

    Route::get('/subadmin/table/waterspring/index', [SubAdminController::class, 'SubAdminIndexWaterSpring'])->name('subadmin.table.waterspring.index'); 
    Route::get('/subadmin/table/waterspring/create', [SubAdminController::class, 'SubAdminCreateWaterSpring'])->name('subadmin.table.waterspring.create'); 
    Route::post('/subadmin/table/waterspring/create', [SubAdminController::class, 'SubAdminStoreWaterSpring'])->name('subadmin.table.waterspring.store');
    Route::get('subadmin/table/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminEditWaterSpring'])->name('subadmin.table.waterspring.edit');
    Route::put('/subadmin/table/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminUpdateWaterSpring'])->name('subadmin.table.waterspring.update');
    Route::delete('/subadmin/table/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminDestroyWaterSpring'])->name('subadmin.table.waterspring.destroy');

    Route::get('/subadmin/table/file/index', [SubAdminController::class, 'SubAdminIndexFile'])->name('subadmin.table.file.index'); 
    Route::get('/subadmin/table/file/create', [SubAdminController::class, 'SubAdminCreateFile'])->name('subadmin.table.file.create'); 
    Route::post('/subadmin/table/file/create', [SubAdminController::class, 'SubAdminStoreFile'])->name('subadmin.table.file.store');
    Route::get('/subadmin/table/file/edit/{subadminfile}', [SubAdminController::class, 'SubAdminEditFile'])->name('subadmin.table.file.edit');
    Route::put('/subadmin/table/file/update/{subadminfile}', [SubAdminController::class, 'SubAdminUpdateFile'])->name('subadmin.table.file.update');
    Route::delete('/subadmin/table/file/index/{subadminfile}', [SubAdminController::class, 'SubAdminDestroyFile'])->name('subadmin.table.file.destroy');

    Route::get('/subadmin/table/map/index', [SubAdminController::class, 'SubAdminIndexMap'])->name('subadmin.table.map.index'); 
    Route::get('/subadmin/table/map/create', [SubAdminController::class, 'SubAdminCreateMap'])->name('subadmin.table.map.create'); 
    Route::post('/subadmin/table/map/create', [SubAdminController::class, 'SubAdminStoreMap'])->name('subadmin.table.map.store');
    Route::get('/subadmin/table/map/edit/{map}', [SubAdminController::class, 'SubAdminEditMap'])->name('subadmin.table.map.edit');
    Route::put('/subadmin/table/map/update/{map}', [SubAdminController::class, 'SubAdminUpdateMap'])->name('subadmin.table.map.update');
    Route::delete('/subadmin/table/map/index/{map}', [SubAdminController::class, 'SubAdminDestroyMap'])->name('subadmin.table.map.destroy');


     //SUBADMIN Kota Jayapura -> Dukcapil
    Route::get('/subadmin/airbersih/kota/jayapura/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDukcapilIndex'])->name('subadmin.airbersih.kotajayapura.dukcapil.index');
    Route::get('/subadmin/airbersih/kota/jayapura/dukcapil/create', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilCreate'])->name('subadmin.airbersih.kotajayapura.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/dukcapil/create', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilStore'])->name('subadmin.airbersih.kotajayapura.dukcapil.store');
    Route::get('/subadmin/airbersih/kota/jayapura/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilEdit'])->name('subadmin.airbersih.kotajayapura.dukcapil.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilUpdate'])->name('subadmin.airbersih.kotajayapura.dukcapil.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilDestroy'])->name('subadmin.airbersih.kotajayapura.dukcapil.destroy');

    //SUBADMIN Kota Jayapura -> Badan Pusat Statistik (BPS)
    Route::get('/subadmin/airbersih/kota/jayapura/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticIndex'])->name('subadmin.airbersih.kotajayapura.statistic.index');
    Route::get('/subadmin/airbersih/kota/jayapura/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticCreate'])->name('subadmin.airbersih.kotajayapura.statistic.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticStore'])->name('subadmin.airbersih.kotajayapura.statistic.store');
    Route::get('/subadmin/airbersih/kota/jayapura/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticEdit'])->name('subadmin.airbersih.kotajayapura.statistic.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticUpdate'])->name('subadmin.airbersih.kotajayapura.statistic.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticDestroy'])->name('subadmin.airbersih.kotajayapura.statistic.destroy');

    //SUBADMIN Kota Jayapura -> Badan Pengelolaan dan Pendataan Daerah
    Route::get('/subadmin/airbersih/kota/jayapura/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesIndex'])->name('subadmin.airbersih.kotajayapura.dataproces.index');
    Route::get('/subadmin/airbersih/kota/jayapura/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesCreate'])->name('subadmin.airbersih.kotajayapura.dataproces.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesStore'])->name('subadmin.airbersih.kotajayapura.dataproces.store');
    Route::get('/subadmin/airbersih/kota/jayapura/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesEdit'])->name('subadmin.airbersih.kotajayapura.dataproces.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesUpdate'])->name('subadmin.airbersih.kotajayapura.dataproces.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesDestroy'])->name('subadmin.airbersih.kotajayapura.dataproces.destroy');

    //SUBADMIN Kota Jayapura ->Intake Sungai -> DONE
    Route::get('/subadmin/airbersih/kota/jayapura/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeIndex'])->name('subadmin.airbersih.kotajayapura.riverintake.index');
    Route::get('/subadmin/airbersih/kota/jayapura/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeCreate'])->name('subadmin.airbersih.kotajayapura.riverintake.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeStore'])->name('subadmin.airbersih.kotajayapura.riverintake.store');
    Route::get('/subadmin/airbersih/kota/jayapura/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeEdit'])->name('subadmin.airbersih.kotajayapura.riverintake.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeUpdate'])->name('subadmin.airbersih.kotajayapura.riverintake.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeDestroy'])->name('subadmin.airbersih.kotajayapura.riverintake.destroy');

    //SUBADMIN Kota Jayapura ->Sumur Air -> DONE
    Route::get('/subadmin/airbersih/kota/jayapura/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellIndex'])->name('subadmin.airbersih.kotajayapura.waterwell.index');
    Route::get('/subadmin/airbersih/kota/jayapura/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellCreate'])->name('subadmin.airbersih.kotajayapura.waterwell.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellStore'])->name('subadmin.airbersih.kotajayapura.waterwell.store');
    Route::get('/subadmin/airbersih/kota/jayapura/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellEdit'])->name('subadmin.airbersih.kotajayapura.waterwell.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellUpdate'])->name('subadmin.airbersih.kotajayapura.waterwell.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellDestroy'])->name('subadmin.airbersih.kotajayapura.waterwell.destroy');

    //SUBADMIN Kota Jayapura ->Tangki Air -> DONE
    Route::get('/subadmin/airbersih/kota/jayapura/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankIndex'])->name('subadmin.airbersih.kotajayapura.watertank.index');
    Route::get('/subadmin/airbersih/kota/jayapura/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankCreate'])->name('subadmin.airbersih.kotajayapura.watertank.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankStore'])->name('subadmin.airbersih.kotajayapura.watertank.store');
    Route::get('/subadmin/airbersih/kota/jayapura/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankEdit'])->name('subadmin.airbersih.kotajayapura.watertank.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankUpdate'])->name('subadmin.airbersih.kotajayapura.watertank.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankDestroy'])->name('subadmin.airbersih.kotajayapura.watertank.destroy');

    //SUBADMIN Kota Jayapura ->Mata Air -> DONE
    Route::get('/subadmin/airbersih/kota/jayapura/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringIndex'])->name('subadmin.airbersih.kotajayapura.waterspring.index');
    Route::get('/subadmin/airbersih/kota/jayapura/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringCreate'])->name('subadmin.airbersih.kotajayapura.waterspring.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringStore'])->name('subadmin.airbersih.kotajayapura.waterspring.store');
    Route::get('/subadmin/airbersih/kota/jayapura/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringEdit'])->name('subadmin.airbersih.kotajayapura.waterspring.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringUpdate'])->name('subadmin.airbersih.kotajayapura.waterspring.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringDestroy'])->name('subadmin.airbersih.kotajayapura.waterspring.destroy');

     //SUBADMIN Kota Jayapura ->PDAM ->
    Route::get('/subadmin/airbersih/kota/jayapura/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkIndex'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkCreate'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkStore'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kota/jayapura/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkEdit'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.destroy');

    Route::get('/subadmin/table/comment/index', [SubAdminController::class, 'SubAdminIndexComment'])->name('subadmin.table.comment.index'); 
    Route::delete('/subadmin/table/comment/index/{comment}', [SubAdminController::class, 'SubAdminDestroyComment'])->name('subadmin.table.comment.destroy');
});

Route::middleware(['auth', 'AdminPU'])->group(function () {
    Route::get('/adminpu/index', [AdminPUController::class, 'AdminPUIndexChart'])->name('adminpu.chart.index');

    Route::get('/adminpu/table/city/index', [AdminPUController::class, 'AdminPUIndexCity'])->name('adminpu.table.city.index');
    Route::get('/adminpu/table/district/index', [AdminPUController::class, 'AdminPUIndexDistrict'])->name('adminpu.table.district.index');
    Route::get('/adminpu/table/village/index', [AdminPUController::class, 'AdminPUIndexVillage'])->name('adminpu.table.village.index');
    Route::get('/adminpu/table/population/index', [AdminPUController::class, 'AdminPUIndexPopulation'])->name('adminpu.table.population.index'); 
    Route::get('/adminpu/table/riverintake/index', [AdminPUController::class, 'AdminPUIndexRiverIntake'])->name('adminpu.table.riverintake.index'); 
    Route::get('/adminpu/table/watertank/index', [AdminPUController::class, 'AdminPUIndexWatertank'])->name('adminpu.table.watertank.index'); 
    Route::get('/adminpu/table/municipalwaterwork/index', [AdminPUController::class, 'AdminPUIndexMunicipalWaterwork'])->name('adminpu.table.municipalwaterwork.index'); 
    Route::get('/adminpu/table/waterwell/index', [AdminPUController::class, 'AdminPUIndexWaterwell'])->name('adminpu.table.waterwell.index'); 
    Route::get('/adminpu/table/waterspring/index', [AdminPUController::class, 'AdminPUIndexWaterSpring'])->name('adminpu.table.waterspring.index'); 
    Route::get('/adminpu/table/map/index', [AdminPUController::class, 'AdminPUIndexMap'])->name('adminpu.table.map.index'); 
    Route::get('/adminpu/table/comment/index', [AdminPUController::class, 'AdminPUIndexComment'])->name('adminpu.table.comment.index'); 
    Route::get('/adminpu/table/file/index', [AdminPUController::class, 'AdminPUIndexFile'])->name('adminpu.table.file.index'); 

});

// Route::middleware(['auth', 'AdminPU'])->group(function () {
//     Route::get('/adminpu/index', function () {
//         return view('adminpu.index');
//     });
// });

Route::middleware(['auth', 'AdminX'])->group(function () {
    Route::get('/adminx/index', function () {
        return view('adminx.index');
    });
});

Route::get('/table/index', function () {
    return view('tablesuperadmin');
});

