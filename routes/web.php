<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminPUController;
use App\Http\Controllers\RABController;
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
    
Route::get('/capaian/air/bersih/kota/jayapura/dinas/pu/sumber/daya/air', [UserController::class, 'CapaianAirBersihWaterResourceKotaJayapura'])->name('user.capaian.air.bersih.waterresource.kota.jayapura');
Route::get('/capaian/air/bersih/kota/jayapura/balai/wilayah/sungai', [UserController::class, 'CapaianAirBersihRiverIntakeKotaJayapura'])->name('user.capaian.air.bersih.riverintake.kota.jayapura');
Route::get('/capaian/air/bersih/kota/jayapura/pdam', [UserController::class, 'CapaianAirBersihMunicipalWaterworkKotaJayapura'])->name('user.capaian.air.bersih.municipalwaterwork.kota.jayapura');
Route::get('/capaian/air/bersih/kota/jayapura/dinas/dukcapil', [UserController::class, 'CapaianAirBersihDukcapilKotaJayapura'])->name('user.capaian.air.bersih.dukcapil.kota.jayapura');
Route::get('/capaian/air/bersih/kota/jayapura/badan/pusat/statistik', [UserController::class, 'CapaianAirBersihStatisticKotaJayapura'])->name('user.capaian.air.bersih.statistic.kota.jayapura');
Route::get('/capaian/air/bersih/kota/jayapura/badan/pengelolahan/dan/pendataan/daerah', [UserController::class, 'CapaianAirBersihDataProcesKotaJayapura'])->name('user.capaian.air.bersih.dataproces.kota.jayapura');

//Route::get('/capaian/air/bersih/kabupaten/jayapura/dinas/pu/bidang/cipta/karya', [UserController::class, 'CapaianAirBersihWaterResourceKotaJayapura'])->name('user.capaian.air.bersih.waterresource.kota.jayapura');
Route::get('/capaian/air/bersih/kabupaten/jayapura/pdam', [UserController::class, 'CapaianAirBersihMunicipalWaterworkKabJayapura'])->name('user.capaian.air.bersih.municipalwaterwork.kabupaten.jayapura');
Route::get('/capaian/air/bersih/kabupaten/jayapura/dinas/dukcapil', [UserController::class, 'CapaianAirBersihDukcapilKabJayapura'])->name('user.capaian.air.bersih.dukcapil.kabupaten.jayapura');
Route::get('/capaian/air/bersih/kabupaten/jayapura/badan/pusat/statistik', [UserController::class, 'CapaianAirBersihStatisticKabJayapura'])->name('user.capaian.air.bersih.statistic.kabupaten.jayapura');
   
//Route::get('/capaian/air/bersih/kabupaten/keerom/dinas/pu/bidang/cipta/karya', [UserController::class, 'CapaianAirBersihWaterResourceKabKeerom'])->name('user.capaian.air.bersih.waterresource.kabupaten.keerom');
Route::get('/capaian/air/bersih/kabupaten/keerom/badan/pusat/statistik', [UserController::class, 'CapaianAirBersihStatisticKabKeerom'])->name('user.capaian.air.bersih.statistic.kabupaten.keerom');

//Route::get('/capaian/air/bersih/kabupaten/sarmi/dinas/pu/bidang/cipta/karya', [UserController::class, 'CapaianAirBersihWaterResourceKabSarmi'])->name('user.capaian.air.bersih.waterresource.kabupaten.sarmi');
Route::get('/capaian/air/bersih/kabupaten/sarmi/badan/pusat/statistik', [UserController::class, 'CapaianAirBersihStatisticKabSarmi'])->name('user.capaian.air.bersih.statistic.kabupaten.keerom');

Route::get('/capaian/air/bersih/kabupaten/biaknumfor/balai/wilayah/sungai', [UserController::class, 'CapaianAirBersihRiverIntakeKabBiakNumfor'])->name('user.capaian.air.bersih.riverintake.kabupaten.biaknumfor');
Route::get('/capaian/air/bersih/kabupaten/biaknumfor/pdam', [UserController::class, 'CapaianAirBersihMunicipalWaterworkKabBiakNumfor'])->name('user.capaian.air.bersih.municipalwaterwork.kabupaten.biaknumfor');
Route::get('/capaian/air/bersih/kabupaten/biaknumfor/dinas/dukcapil', [UserController::class, 'CapaianAirBersihDukcapilKabBiakNumfor'])->name('user.capaian.air.bersih.dukcapil.kabupaten.biaknumfor');
Route::get('/capaian/air/bersih/kabupaten/biaknumfor/badan/pusat/statistik', [UserController::class, 'CapaianAirBersihStatisticKabBiakNumfor'])->name('user.capaian.air.bersih.statistic.kabupaten.biaknumfor');

//Route::get('/capaian/air/bersih/kabupaten/supiori/dinas/pu/bidang/cipta/karya', [UserController::class, 'CapaianAirBersihWaterResourceKabSupiori'])->name('user.capaian.air.bersih.waterresource.kabupaten.sarmi');
Route::get('/capaian/air/bersih/kabupaten/supiori/dinas/dukcapil', [UserController::class, 'CapaianAirBersihDukcapilKabSupiori'])->name('user.capaian.air.bersih.dukcapil.kabupaten.supiori');

//Route::get('/capaian/air/bersih/kabupaten/kepulauan/yapen/dinas/pu/bidang/cipta/karya', [UserController::class, 'CapaianAirBersihWaterResourceKabKepulauanYapen'])->name('user.capaian.air.bersih.waterresource.kabupaten.kepulauanyapen');
Route::get('/capaian/air/bersih/kabupaten/kepulauan/yapen/pdam', [UserController::class, 'CapaianAirBersihMunicipalWaterworkKabKepulauanYapen'])->name('user.capaian.air.bersih.municipalwaterwork.kabupaten.kepulauanyapen');
Route::get('/capaian/air/bersih/kabupaten/kepulauan/yapen/dinas/dukcapil', [UserController::class, 'CapaianAirBersihDukcapilKabKepulauanYapen'])->name('user.capaian.air.bersih.dukcapil.kabupaten.kepulauanyapen');
Route::get('/capaian/air/bersih/kabupaten/kepulauan/yapen/badan/pusat/statistik', [UserController::class, 'CapaianAirBersihStatisticKabKepulauanYapen'])->name('user.capaian.air.bersih.statistic.kabupaten.kepulauanyapen');


    // Route::get('/peta/pdam', [UserController::class, 'UserPetaPDAM'])->name('user.peta.pdam');
    // Route::get('/peta/populasi', [UserController::class, 'UserPetaPopulasi'])->name('user.peta.populasi');
    // Route::get('/peta/intakesungai', [UserController::class, 'UserPetaIntakeSungai'])->name('user.peta.intakesungai');
    // Route::get('/peta/mataair', [UserController::class, 'UserPetaMataAir'])->name('user.peta.mataair');
    // Route::get('/peta/tangkiair', [UserController::class, 'UserPetaTangkiAir'])->name('user.peta.tangkiair');

    // Route::get('/airminum/kota/jayapura', [UserController::class, 'UserAirMinumKotaJayapura'])->name('user.airminum.kotajayapura');
    // Route::get('/airminum/kota/jayapura/pdam', [UserController::class, 'UserAirMinumKotaJayapuraPDAM'])->name('user.airminum.kotajayapura.pdam');

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

    //Kota Jayapura 
    Route::get('/superadmin/airbersih/kota/jayapura/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceIndex'])->name('superadmin.airbersih.kotajayapura.waterresource.index');
    Route::get('/superadmin/airbersih/kota/jayapura/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceCreate'])->name('superadmin.airbersih.kotajayapura.waterresource.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceStore'])->name('superadmin.airbersih.kotajayapura.waterresource.store');
    Route::get('/superadmin/airbersih/kota/jayapura/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceEdit'])->name('superadmin.airbersih.kotajayapura.waterresource.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceUpdate'])->name('superadmin.airbersih.kotajayapura.waterresource.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraWaterResourceDestroy'])->name('superadmin.airbersih.kotajayapura.waterresource.destroy');

    Route::get('/superadmin/airbersih/kota/jayapura/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilIndex'])->name('superadmin.airbersih.kotajayapura.dukcapil.index');
    Route::get('/superadmin/airbersih/kota/jayapura/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilCreate'])->name('superadmin.airbersih.kotajayapura.dukcapil.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilStore'])->name('superadmin.airbersih.kotajayapura.dukcapil.store');
    Route::get('/superadmin/airbersih/kota/jayapura/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilEdit'])->name('superadmin.airbersih.kotajayapura.dukcapil.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilUpdate'])->name('superadmin.airbersih.kotajayapura.dukcapil.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraDukcapilDestroy'])->name('superadmin.airbersih.kotajayapura.dukcapil.destroy');


    Route::get('/superadmin/airbersih/kota/jayapura/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticIndex'])->name('superadmin.airbersih.kotajayapura.statistic.index');
    Route::get('/superadmin/airbersih/kota/jayapura/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticCreate'])->name('superadmin.airbersih.kotajayapura.statistic.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticStore'])->name('superadmin.airbersih.kotajayapura.statistic.store');
    Route::get('/superadmin/airbersih/kota/jayapura/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticEdit'])->name('superadmin.airbersih.kotajayapura.statistic.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticUpdate'])->name('superadmin.airbersih.kotajayapura.statistic.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraStatisticDestroy'])->name('superadmin.airbersih.kotajayapura.statistic.destroy');

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

    Route::get('/superadmin/airbersih/kabupaten/jayapura/creation/index', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraCreationIndex'])->name('superadmin.airbersih.kabupatenjayapura.creation.index');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/creation/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraCreationCreate'])->name('superadmin.airbersih.kabupatenjayapura.creation.create'); 
    Route::post('/superadmin/airbersih/kabupaten/jayapura/creation/create', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraCreationStore'])->name('superadmin.airbersih.kabupatenjayapura.creation.store');
    Route::get('/superadmin/airbersih/kabupaten/jayapura/creation/edit/{creation}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraCreationEdit'])->name('superadmin.airbersih.kabupatenjayapura.creation.edit');
    Route::put('/superadmin/airbersih/kabupaten/jayapura/creation/update/{creation}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraCreationUpdate'])->name('superadmin.airbersih.kabupatenjayapura.creation.update');
    Route::delete('/superadmin/airbersih/kabupaten/jayapura/creation/index/{creation}', [SuperAdminController::class, 'SuperAdminAirBersihKabJayapuraCreationDestroy'])->name('superadmin.airbersih.kabupatenjayapura.creation.destroy');



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

     //Kabupaten SUPIORI
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterResourceIndex'])->name('superadmin.airbersih.kabupatensupiori.waterresource.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterResourceCreate'])->name('superadmin.airbersih.kabupatensupiori.waterresource.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterResourceStore'])->name('superadmin.airbersih.kabupatensupiori.waterresource.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterResourceEdit'])->name('superadmin.airbersih.kabupatensupiori.waterresource.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterResourceUpdate'])->name('superadmin.airbersih.kabupatensupiori.waterresource.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterResourceDestroy'])->name('superadmin.airbersih.kabupatensupiori.waterresource.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDukcapilIndex'])->name('superadmin.airbersih.kabupatensupiori.dukcapil.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDukcapilCreate'])->name('superadmin.airbersih.kabupatensupiori.dukcapil.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDukcapilStore'])->name('superadmin.airbersih.kabupatensupiori.dukcapil.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDukcapilEdit'])->name('superadmin.airbersih.kabupatensupiori.dukcapil.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDukcapilUpdate'])->name('superadmin.airbersih.kabupatensupiori.dukcapil.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDukcapilDestroy'])->name('superadmin.airbersih.kabupatensupiori.dukcapil.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriStatisticIndex'])->name('superadmin.airbersih.kabupatensupiori.statistic.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriStatisticCreate'])->name('superadmin.airbersih.kabupatensupiori.statistic.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriStatisticStore'])->name('superadmin.airbersih.kabupatensupiori.statistic.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriStatisticEdit'])->name('superadmin.airbersih.kabupatensupiori.statistic.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriStatisticUpdate'])->name('superadmin.airbersih.kabupatensupiori.statistic.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriStatisticDestroy'])->name('superadmin.airbersih.kabupatensupiori.statistic.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDataProcesIndex'])->name('superadmin.airbersih.kabupatensupiori.dataproces.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDataProcesCreate'])->name('superadmin.airbersih.kabupatensupiori.dataproces.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDataProcesStore'])->name('superadmin.airbersih.kabupatensupiori.dataproces.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDataProcesEdit'])->name('superadmin.airbersih.kabupatensupiori.dataproces.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDataProcesUpdate'])->name('superadmin.airbersih.kabupatensupiori.dataproces.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriDataProcesDestroy'])->name('superadmin.airbersih.kabupatensupiori.dataproces.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriRiverintakeIndex'])->name('superadmin.airbersih.kabupatensupiori.riverintake.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriRiverintakeCreate'])->name('superadmin.airbersih.kabupatensupiori.riverintake.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriRiverintakeStore'])->name('superadmin.airbersih.kabupatensupiori.riverintake.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriRiverintakeEdit'])->name('superadmin.airbersih.kabupatensupiori.riverintake.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriRiverintakeUpdate'])->name('superadmin.airbersih.kabupatensupiori.riverintake.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriRiverintakeDestroy'])->name('superadmin.airbersih.kabupatensupiori.riverintake.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterwellIndex'])->name('superadmin.airbersih.kabupatensupiori.waterwell.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterwellCreate'])->name('superadmin.airbersih.kabupatensupiori.waterwell.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterwellStore'])->name('superadmin.airbersih.kabupatensupiori.waterwell.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterwellEdit'])->name('superadmin.airbersih.kabupatensupiori.waterwell.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterwellUpdate'])->name('superadmin.airbersih.kabupatensupiori.waterwell.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabBSupioriWaterwellDestroy'])->name('superadmin.airbersih.kabupatensupiori.waterwell.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWatertankIndex'])->name('superadmin.airbersih.kabupatensupiori.watertank.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWatertankCreate'])->name('superadmin.airbersih.kabupatensupiori.watertank.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWatertankStore'])->name('superadmin.airbersih.kabupatensupiori.watertank.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWatertankEdit'])->name('superadmin.airbersih.kabupatensupiori.watertank.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWatertankUpdate'])->name('superadmin.airbersih.kabupatensupiori.watertank.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWatertankDestroy'])->name('superadmin.airbersih.kabupatensupiori.watertank.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterspringIndex'])->name('superadmin.airbersih.kabupatensupiori.waterspring.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterspringCreate'])->name('superadmin.airbersih.kabupatensupiori.waterspring.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterspringStore'])->name('superadmin.airbersih.kabupatensupiori.waterspring.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterspringEdit'])->name('superadmin.airbersih.kabupatensupiori.waterspring.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriWaterspringUpdate'])->name('superadmin.airbersih.kabupatensupiori.waterspring.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriwaterspringDestroy'])->name('superadmin.airbersih.kabupatensupiori.waterspring.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/supiori/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatensupiori.municipalwaterwork.index');
     Route::get('/superadmin/airbersih/kabupaten/supiori/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatensupiori.municipalwaterwork.create'); 
     Route::post('/superadmin/airbersih/kabupaten/supiori/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatensupiori.municipalwaterwork.store');
     Route::get('/superadmin/airbersih/kabupaten/supiori/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatensupiori.municipalwaterwork.edit');
     Route::put('/superadmin/airbersih/kabupaten/supiori/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatensupiori.municipalwaterwork.update');
     Route::delete('/superadmin/airbersih/kabupaten/supiori/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabSupioriMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatensupiori.municipalwaterwork.destroy');

     //Kabupaten KEPULAUAN YAPEN
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterResourceIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterResourceCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterResourceStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterResourceEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterResourceUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterResourceDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDukcapilIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDukcapilCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDukcapilStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDukcapilEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDukcapilUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDukcapilDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenStatisticIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.statistic.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenStatisticCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.statistic.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenStatisticStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.statistic.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenStatisticEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.statistic.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenStatisticUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.statistic.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenStatisticDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.statistic.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDataProcesIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDataProcesCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDataProcesStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDataProcesEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDataProcesUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenDataProcesDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenRiverintakeIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenRiverintakeCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenRiverintakeStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenRiverintakeEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenRiverintakeUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenRiverintakeDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterwellIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterwellCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterwellStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterwellEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterwellUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterwellDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWatertankIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.watertank.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWatertankCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.watertank.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWatertankStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.watertank.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWatertankEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.watertank.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWatertankUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.watertank.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWatertankDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.watertank.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterspringIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterspringCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKaKepulauanYapenWaterspringStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterspringEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenWaterspringUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenwaterspringDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.index');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.create'); 
     Route::post('/superadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.store');
     Route::get('/superadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.edit');
     Route::put('/superadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.update');
     Route::delete('/superadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.destroy');


     //Kabupaten MamberamoRaya
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterResourceIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterresource.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterResourceCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterresource.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterResourceStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterresource.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterResourceEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterresource.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterResourceUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterresource.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterResourceDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterresource.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDukcapilIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDukcapilCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDukcapilStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDukcapilEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDukcapilUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDukcapilDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaStatisticIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.statistic.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaStatisticCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.statistic.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaStatisticStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.statistic.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaStatisticEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.statistic.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaStatisticUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.statistic.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaStatisticDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.statistic.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDataProcesIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.dataproces.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDataProcesCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.dataproces.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayanDataProcesStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.dataproces.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDataProcesEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.dataproces.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDataProcesUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.dataproces.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaDataProcesDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.dataproces.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaRiverintakeIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.riverintake.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaRiverintakeCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.riverintake.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaRiverintakeStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.riverintake.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaRiverintakeEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.riverintake.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaRiverintakeUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.riverintake.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaRiverintakeDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.riverintake.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterwellIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterwell.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterwellCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterwell.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterwellStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterwell.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterwellEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterwell.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterwellUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterwell.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterwellDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterwell.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWatertankIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.watertank.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWatertankCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.watertank.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWatertankStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.watertank.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayanWatertankEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.watertank.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWatertankUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.watertank.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWatertankDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.watertank.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterspringIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterspring.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterspringCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterspring.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKaMamberamoRayaWaterspringStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterspring.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterspringEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterspring.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaWaterspringUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterspring.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayawaterspringDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.waterspring.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatenmamberamoraya.index');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatenmamberamoraya.create'); 
     Route::post('/superadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatenmamberamoraya.store');
     Route::get('/superadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.edit');
     Route::put('/superadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.update');
     Route::delete('/superadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.destroy');

     // WAROPEN
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterresource/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterResourceIndex'])->name('superadmin.airbersih.kabupatenwaropen.waterresource.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterResourceCreate'])->name('superadmin.airbersih.kabupatenwaropen.waterresource.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/waterresource/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterResourceStore'])->name('superadmin.airbersih.kabupatenwaropen.waterresource.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterresource/edit/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterResourceEdit'])->name('superadmin.airbersih.kabupatenwaropen.waterresource.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/waterresource/update/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterResourceUpdate'])->name('superadmin.airbersih.kabupatenwaropen.waterresource.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/waterresource/index/{waterresource}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterResourceDestroy'])->name('superadmin.airbersih.kabupatenwaropen.waterresource.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/dukcapil/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDukcapilIndex'])->name('superadmin.airbersih.kabupatenwaropen.dukcapil.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDukcapilCreate'])->name('superadmin.airbersih.kabupatenwaropen.dukcapil.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/dukcapil/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDukcapilStore'])->name('superadmin.airbersih.kabupatenwaropen.dukcapil.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/dukcapil/edit/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDukcapilEdit'])->name('superadmin.airbersih.kabupatenwaropen.dukcapil.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/dukcapil/update/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDukcapilUpdate'])->name('superadmin.airbersih.kabupatenwaropen.dukcapil.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/dukcapil/index/{dukcapil}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDukcapilDestroy'])->name('superadmin.airbersih.kabupatenwaropen.dukcapil.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/statistic/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenStatisticIndex'])->name('superadmin.airbersih.kabupatenwaropen.statistic.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenStatisticCreate'])->name('superadmin.airbersih.kabupatenwaropen.statistic.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/statistic/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenStatisticStore'])->name('superadmin.airbersih.kabupatenwaropen.statistic.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/statistic/edit/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenStatisticEdit'])->name('superadmin.airbersih.kabupatenwaropen.statistic.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/statistic/update/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenStatisticUpdate'])->name('superadmin.airbersih.kabupatenwaropen.statistic.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/statistic/index/{statistic}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenStatisticDestroy'])->name('superadmin.airbersih.kabupatenwaropen.statistic.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/dataproces/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDataProcesIndex'])->name('superadmin.airbersih.kabupatenwaropen.dataproces.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDataProcesCreate'])->name('superadmin.airbersih.kabupatenwaropen.dataproces.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/dataproces/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDataProcesStore'])->name('superadmin.airbersih.kabupatenwaropen.dataproces.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/dataproces/edit/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDataProcesEdit'])->name('superadmin.airbersih.kabupatenwaropen.dataproces.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/dataproces/update/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDataProcesUpdate'])->name('superadmin.airbersih.kabupatenwaropen.dataproces.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/dataproces/index/{dataproces}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenDataProcesDestroy'])->name('superadmin.airbersih.kabupatenwaropen.dataproces.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/riverintake/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenRiverintakeIndex'])->name('superadmin.airbersih.kabupatenwaropen.riverintake.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenRiverintakeCreate'])->name('superadmin.airbersih.kabupatenwaropen.riverintake.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/riverintake/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenRiverintakeStore'])->name('superadmin.airbersih.kabupatenwaropen.riverintake.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/riverintake/edit/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenRiverintakeEdit'])->name('superadmin.airbersih.kabupatenwaropen.riverintake.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/riverintake/update/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenRiverintakeUpdate'])->name('superadmin.airbersih.kabupatenwaropen.riverintake.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/riverintake/index/{riverintake}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenRiverintakeDestroy'])->name('superadmin.airbersih.kabupatenwaropen.riverintake.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterwell/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterwellIndex'])->name('superadmin.airbersih.kabupatenwaropen.waterwell.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterwellCreate'])->name('superadmin.airbersih.kabupatenwaropen.waterwell.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/waterwell/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterwellStore'])->name('superadmin.airbersih.kabupatenwaropen.waterwell.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterwell/edit/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterwellEdit'])->name('superadmin.airbersih.kabupatenwaropen.waterwell.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/waterwell/update/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterwellUpdate'])->name('superadmin.airbersih.kabupatenwaropen.waterwell.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/waterwell/index/{waterwell}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterwellDestroy'])->name('superadmin.airbersih.kabupatenwaropen.waterwell.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/watertank/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWatertankIndex'])->name('superadmin.airbersih.kabupatenwaropen.watertank.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWatertankCreate'])->name('superadmin.airbersih.kabupatenwaropen.watertank.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/watertank/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWatertankStore'])->name('superadmin.airbersih.kabupatenwaropen.watertank.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/watertank/edit/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWatertankEdit'])->name('superadmin.airbersih.kabupatenwaropen.watertank.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/watertank/update/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWatertankUpdate'])->name('superadmin.airbersih.kabupatenwaropen.watertank.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/watertank/index/{watertank}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWatertankDestroy'])->name('superadmin.airbersih.kabupatenwaropen.watertank.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterspring/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterspringIndex'])->name('superadmin.airbersih.kabupatenwaropen.waterspring.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterspringCreate'])->name('superadmin.airbersih.kabupatenwaropen.waterspring.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/waterspring/create', [SuperAdminController::class, 'SuperAdminAirBersihKaWaropenWaterspringStore'])->name('superadmin.airbersih.kabupatenwaropen.waterspring.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/waterspring/edit/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterspringEdit'])->name('superadmin.airbersih.kabupatenwaropen.waterspring.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/waterspring/update/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenWaterspringUpdate'])->name('superadmin.airbersih.kabupatenwaropen.waterspring.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/waterspring/index/{waterspring}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenwaterspringDestroy'])->name('superadmin.airbersih.kabupatenwaropen.waterspring.destroy');
 
     Route::get('/superadmin/airbersih/kabupaten/waropen/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenMunicipalWaterworkIndex'])->name('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.index');
     Route::get('/superadmin/airbersih/kabupaten/waropen/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenMunicipalWaterworkCreate'])->name('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.create'); 
     Route::post('/superadmin/airbersih/kabupaten/waropen/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenMunicipalWaterworkStore'])->name('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.store');
     Route::get('/superadmin/airbersih/kabupaten/waropen/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenMunicipalWaterworkEdit'])->name('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.edit');
     Route::put('/superadmin/airbersih/kabupaten/waropen/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenmiMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.update');
     Route::delete('/superadmin/airbersih/kabupaten/waropen/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKabWaropenMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.destroy');

    /** ======================== RAB ROUTES FOR SUPERADMIN ============================= */
    Route::get('/superadmin/rab', [RABController::class, "index"])->name("superadmin.rab.index");
    Route::get('/superadmin/rab/create', [RABController::class, "create"])->name("superadmin.rab.create");
    Route::post('/superadmin/rab/store', [RABController::class, "store"])->name("superadmin.rab.store");
    Route::get('/superadmin/rab/edit/{rab}', [RABController::class, "edit"])->name("superadmin.rab.edit");
    Route::delete('/superadmin/rab/destroy/{rab}', [RABController::class, "destroy"])->name("superadmin.rab.destroy");
    Route::post('/superadmin/rab/update', [RABController::class, "update"])->name("superadmin.rab.update");
    Route::get('/superadmin/rab/detail/{rab}', [RABController::class, "detail"])->name("superadmin.rab.detail");
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


     // SUBADMIN KOTA JAYAPURA 
     Route::get('/subadmin/airbersih/kota/jayapura/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterResourceIndex'])->name('subadmin.airbersih.kotajayapura.waterresource.index');
     Route::get('/subadmin/airbersih/kota/jayapura/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterResourceCreate'])->name('subadmin.airbersih.kotajayapura.waterresource.create'); 
     Route::post('/subadmin/airbersih/kota/jayapura/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterResourceStore'])->name('subadmin.airbersih.kotajayapura.waterresource.store');
     Route::get('/subadmin/airbersih/kota/jayapura/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterResourceEdit'])->name('subadmin.airbersih.kotajayapura.waterresource.edit');
     Route::put('/subadmin/airbersih/kota/jayapura/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterResourceUpdate'])->name('subadmin.airbersih.kotajayapura.waterresource.update');
     Route::delete('/subadmin/airbersih/kota/jayapura/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterResourceUpdate'])->name('subadmin.airbersih.kotajayapura.waterresource.destroy');

    Route::get('/subadmin/airbersih/kota/jayapura/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDukcapilIndex'])->name('subadmin.airbersih.kotajayapura.dukcapil.index');
    Route::get('/subadmin/airbersih/kota/jayapura/dukcapil/create', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilCreate'])->name('subadmin.airbersih.kotajayapura.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/dukcapil/create', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilStore'])->name('subadmin.airbersih.kotajayapura.dukcapil.store');
    Route::get('/subadmin/airbersih/kota/jayapura/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilEdit'])->name('subadmin.airbersih.kotajayapura.dukcapil.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilUpdate'])->name('subadmin.airbersih.kotajayapura.dukcapil.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubadminAirBersihKotaJayapuraDukcapilDestroy'])->name('subadmin.airbersih.kotajayapura.dukcapil.destroy');

   
    Route::get('/subadmin/airbersih/kota/jayapura/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticIndex'])->name('subadmin.airbersih.kotajayapura.statistic.index');
    Route::get('/subadmin/airbersih/kota/jayapura/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticCreate'])->name('subadmin.airbersih.kotajayapura.statistic.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticStore'])->name('subadmin.airbersih.kotajayapura.statistic.store');
    Route::get('/subadmin/airbersih/kota/jayapura/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticEdit'])->name('subadmin.airbersih.kotajayapura.statistic.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticUpdate'])->name('subadmin.airbersih.kotajayapura.statistic.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraStatisticDestroy'])->name('subadmin.airbersih.kotajayapura.statistic.destroy');

   
    Route::get('/subadmin/airbersih/kota/jayapura/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesIndex'])->name('subadmin.airbersih.kotajayapura.dataproces.index');
    Route::get('/subadmin/airbersih/kota/jayapura/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesCreate'])->name('subadmin.airbersih.kotajayapura.dataproces.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesStore'])->name('subadmin.airbersih.kotajayapura.dataproces.store');
    Route::get('/subadmin/airbersih/kota/jayapura/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesEdit'])->name('subadmin.airbersih.kotajayapura.dataproces.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesUpdate'])->name('subadmin.airbersih.kotajayapura.dataproces.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraDataProcesDestroy'])->name('subadmin.airbersih.kotajayapura.dataproces.destroy');

    Route::get('/subadmin/airbersih/kota/jayapura/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeIndex'])->name('subadmin.airbersih.kotajayapura.riverintake.index');
    Route::get('/subadmin/airbersih/kota/jayapura/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeCreate'])->name('subadmin.airbersih.kotajayapura.riverintake.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeStore'])->name('subadmin.airbersih.kotajayapura.riverintake.store');
    Route::get('/subadmin/airbersih/kota/jayapura/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeEdit'])->name('subadmin.airbersih.kotajayapura.riverintake.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeUpdate'])->name('subadmin.airbersih.kotajayapura.riverintake.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraRiverintakeDestroy'])->name('subadmin.airbersih.kotajayapura.riverintake.destroy');
  
    Route::get('/subadmin/airbersih/kota/jayapura/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellIndex'])->name('subadmin.airbersih.kotajayapura.waterwell.index');
    Route::get('/subadmin/airbersih/kota/jayapura/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellCreate'])->name('subadmin.airbersih.kotajayapura.waterwell.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellStore'])->name('subadmin.airbersih.kotajayapura.waterwell.store');
    Route::get('/subadmin/airbersih/kota/jayapura/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellEdit'])->name('subadmin.airbersih.kotajayapura.waterwell.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellUpdate'])->name('subadmin.airbersih.kotajayapura.waterwell.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterwellDestroy'])->name('subadmin.airbersih.kotajayapura.waterwell.destroy');

  
    Route::get('/subadmin/airbersih/kota/jayapura/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankIndex'])->name('subadmin.airbersih.kotajayapura.watertank.index');
    Route::get('/subadmin/airbersih/kota/jayapura/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankCreate'])->name('subadmin.airbersih.kotajayapura.watertank.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankStore'])->name('subadmin.airbersih.kotajayapura.watertank.store');
    Route::get('/subadmin/airbersih/kota/jayapura/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankEdit'])->name('subadmin.airbersih.kotajayapura.watertank.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankUpdate'])->name('subadmin.airbersih.kotajayapura.watertank.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWatertankDestroy'])->name('subadmin.airbersih.kotajayapura.watertank.destroy');

    
    Route::get('/subadmin/airbersih/kota/jayapura/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringIndex'])->name('subadmin.airbersih.kotajayapura.waterspring.index');
    Route::get('/subadmin/airbersih/kota/jayapura/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringCreate'])->name('subadmin.airbersih.kotajayapura.waterspring.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringStore'])->name('subadmin.airbersih.kotajayapura.waterspring.store');
    Route::get('/subadmin/airbersih/kota/jayapura/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringEdit'])->name('subadmin.airbersih.kotajayapura.waterspring.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringUpdate'])->name('subadmin.airbersih.kotajayapura.waterspring.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraWaterspringDestroy'])->name('subadmin.airbersih.kotajayapura.waterspring.destroy');

    Route::get('/subadmin/airbersih/kota/jayapura/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkIndex'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkCreate'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkStore'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kota/jayapura/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkEdit'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kota/jayapura/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kota/jayapura/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKotaJayapuraMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kotajayapura.municipalwaterwork.destroy');

    //Kabupaten Jayapura
    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterResourceIndex'])->name('subadmin.airbersih.kabupatenjayapura.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterResourceCreate'])->name('subadmin.airbersih.kabupatenjayapura.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterResourceStore'])->name('subadmin.airbersih.kabupatenjayapura.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterResourceEdit'])->name('subadmin.airbersih.kabupatenjayapura.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterResourceUpdate'])->name('subadmin.airbersih.kabupatenjayapura.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterResourceDestroy'])->name('subadmin.airbersih.kabupatenjayapura.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDukcapilIndex'])->name('subadmin.airbersih.kabupatenjayapura.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDukcapilCreate'])->name('subadmin.airbersih.kabupatenjayapura.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDukcapilStore'])->name('subadmin.airbersih.kabupatenjayapura.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDukcapilEdit'])->name('subadmin.airbersih.kabupatenjayapura.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDukcapilUpdate'])->name('subadmin.airbersih.kabupatenjayapura.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDukcapilDestroy'])->name('subadmin.airbersih.kabupatenjayapura.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraStatisticIndex'])->name('subadmin.airbersih.kabupatenjayapura.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraStatisticCreate'])->name('subadmin.airbersih.kabupatenjayapura.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraStatisticStore'])->name('subadmin.airbersih.kabupatenjayapura.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraStatisticEdit'])->name('subadmin.airbersih.kabupatenjayapura.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraStatisticUpdate'])->name('subadmin.airbersih.kabupatenjayapura.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraStatisticDestroy'])->name('subadmin.airbersih.kabupatenjayapura.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDataProcesIndex'])->name('subadmin.airbersih.kabupatenjayapura.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDataProcesCreate'])->name('subadmin.airbersih.kabupatenjayapura.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDataProcesStore'])->name('subadmin.airbersih.kabupatenjayapura.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDataProcesEdit'])->name('subadmin.airbersih.kabupatenjayapura.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDataProcesUpdate'])->name('subadmin.airbersih.kabupatenjayapura.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraDataProcesDestroy'])->name('subadmin.airbersih.kabupatenjayapura.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraRiverintakeIndex'])->name('subadmin.airbersih.kabupatenjayapura.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraRiverintakeCreate'])->name('subadmin.airbersih.kabupatenjayapura.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraRiverintakeStore'])->name('subadmin.airbersih.kabupatenjayapura.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraRiverintakeEdit'])->name('subadmin.airbersih.kabupatenjayapura.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraRiverintakeUpdate'])->name('subadmin.airbersih.kabupatenjayapura.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraRiverintakeDestroy'])->name('subadmin.airbersih.kabupatenjayapura.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterwellIndex'])->name('subadmin.airbersih.kabupatenjayapura.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterwellCreate'])->name('subadmin.airbersih.kabupatenjayapura.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterwellStore'])->name('subadmin.airbersih.kabupatenjayapura.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterwellEdit'])->name('subadmin.airbersih.kabupatenjayapura.waterwell.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterwellUpdate'])->name('subadmin.airbersih.kabupatenjayapura.waterwell.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterwellDestroy'])->name('subadmin.airbersih.kabupatenjayapura.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWatertankIndex'])->name('subadmin.airbersih.kabupatenjayapura.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWatertankCreate'])->name('subadmin.airbersih.kabupatenjayapura.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWatertankStore'])->name('subadmin.airbersih.kabupatenjayapura.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWatertankEdit'])->name('subadmin.airbersih.kabupatenjayapura.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWatertankUpdate'])->name('subadmin.airbersih.kabupatenjayapura.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWatertankDestroy'])->name('subadmin.airbersih.kabupatenjayapura.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterspringIndex'])->name('subadmin.airbersih.kabupatenjayapura.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterspringCreate'])->name('subadmin.airbersih.kabupatenjayapura.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterspringStore'])->name('subadmin.airbersih.kabupatenjayapura.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterspringEdit'])->name('subadmin.airbersih.kabupatenjayapura.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterspringUpdate'])->name('subadmin.airbersih.kabupatenjayapura.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraWaterspringDestroy'])->name('subadmin.airbersih.kabupatenjayapura.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/jayapura/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/jayapura/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/jayapura/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/jayapura/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/jayapura/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabJayapuraMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.destroy');



    //Kabupaten Biak Numfor
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterResourceIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterResourceCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterResourceStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterResourceEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterResourceUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterResourceDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDukcapilIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDukcapilCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDukcapilStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDukcapilEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDukcapilUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDukcapilDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforStatisticIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforStatisticCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforStatisticStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforStatisticEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforStatisticUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforStatisticDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDataProcesIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDataProcesCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDataProcesStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDataProcesEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDataProcesUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforDataProcesDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforRiverintakeIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforRiverintakeCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforRiverintakeStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforRiverintakeEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforRiverintakeUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforRiverintakeDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterwellIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterwellCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterwellStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterwellEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterwell.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterwellUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterwell.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterwellDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWatertankIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWatertankCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWatertankStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWatertankEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWatertankUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWatertankDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterspringIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterspringCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterspringStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterspringEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterspringUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforWaterspringDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabBiakNumforMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.destroy');

    //Kabupaten KEEROM
    Route::get('/subadmin/airbersih/kabupaten/keerom/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterResourceIndex'])->name('subadmin.airbersih.kabupatenkeerom.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterResourceCreate'])->name('subadmin.airbersih.kabupatenkeerom.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterResourceStore'])->name('subadmin.airbersih.kabupatenkeerom.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterResourceEdit'])->name('subadmin.airbersih.kabupatenkeerom.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterResourceUpdate'])->name('subadmin.airbersih.kabupatenkeerom.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterResourceDestroy'])->name('subadmin.airbersih.kabupatenkeerom.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDukcapilIndex'])->name('subadmin.airbersih.kabupatenkeerom.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDukcapilCreate'])->name('subadmin.airbersih.kabupatenkeerom.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDukcapilStore'])->name('subadmin.airbersih.kabupatenkeerom.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDukcapilEdit'])->name('subadmin.airbersih.kabupatenkeerom.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDukcapilUpdate'])->name('subadmin.airbersih.kabupatenkeerom.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDukcapilDestroy'])->name('subadmin.airbersih.kabupatenkeerom.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromStatisticIndex'])->name('subadmin.airbersih.kabupatenkeerom.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/statistic/create', [SubperAdminController::class, 'SubAdminAirBersihKabKeeromStatisticCreate'])->name('subadmin.airbersih.kabupatenkeerom.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromStatisticStore'])->name('subadmin.airbersih.kabupatenkeerom.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromStatisticEdit'])->name('subadmin.airbersih.kabupatenkeerom.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromStatisticUpdate'])->name('subadmin.airbersih.kabupatenkeerom.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromStatisticDestroy'])->name('subadmin.airbersih.kabupatenkeerom.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDataProcesIndex'])->name('subadmin.airbersih.kabupatenkeerom.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDataProcesCreate'])->name('subadmin.airbersih.kabupatenkeerom.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDataProcesStore'])->name('subadmin.airbersih.kabupatenkeerom.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDataProcesEdit'])->name('subadmin.airbersih.kabupatenkeerom.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDataProcesUpdate'])->name('subadmin.airbersih.kabupatenkeerom.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromDataProcesDestroy'])->name('subadmin.airbersih.kabupatenkeerom.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromRiverintakeIndex'])->name('subadmin.airbersih.kabupatenkeerom.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromRiverintakeCreate'])->name('subadmin.airbersih.kabupatenkeerom.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromRiverintakeStore'])->name('subadmin.airbersih.kabupatenkeerom.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromRiverintakeEdit'])->name('subadmin.airbersih.kabupatenkeerom.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromRiverintakeUpdate'])->name('subadmin.airbersih.kabupatenkeerom.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromRiverintakeDestroy'])->name('subadmin.airbersih.kabupatenkeerom.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterwellIndex'])->name('subadmin.airbersih.kabupatenkeerom.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterwellCreate'])->name('subadmin.airbersih.kabupatenkeerom.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterwellStore'])->name('subadmin.airbersih.kabupatenkeerom.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterwellEdit'])->name('subadmin.airbersih.kabupatenkeerom.waterwell.edit');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterwellDestroy'])->name('subadmin.airbersih.kabupatenkeerom.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWatertankIndex'])->name('subadmin.airbersih.kabupatenkeerom.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWatertankCreate'])->name('subadmin.airbersih.kabupatenkeerom.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWatertankStore'])->name('subadmin.airbersih.kabupatenkeerom.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWatertankEdit'])->name('subadmin.airbersih.kabupatenkeerom.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWatertankUpdate'])->name('subadmin.airbersih.kabupatenkeerom.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWatertankDestroy'])->name('subadmin.airbersih.kabupatenkeerom.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterspringIndex'])->name('subadmin.airbersih.kabupatenkeerom.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterspringCreate'])->name('subadmin.airbersih.kabupatenkeerom.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterspringStore'])->name('subadmin.airbersih.kabupatenkeerom.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterspringEdit'])->name('subadmin.airbersih.kabupatenkeerom.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterspringUpdate'])->name('subadmin.airbersih.kabupatenkeerom.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromWaterspringDestroy'])->name('subadmin.airbersih.kabupatenkeerom.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/keerom/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabKeeromMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/keerom/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/keerom/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabKeeromMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/keerom/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/keerom/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/keerom/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabKeeromMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.destroy');

    //Kabupaten Sarmi
    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterResourceIndex'])->name('subadmin.airbersih.kabupatensarmi.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterResourceCreate'])->name('subadmin.airbersih.kabupatensarmi.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterResourceStore'])->name('subadmin.airbersih.kabupatensarmi.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterResourceEdit'])->name('subadmin.airbersih.kabupatensarmi.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterResourceUpdate'])->name('subadmin.airbersih.kabupatensarmi.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterResourceDestroy'])->name('subadmin.airbersih.kabupatensarmi.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDukcapilIndex'])->name('subadmin.airbersih.kabupatensarmi.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDukcapilCreate'])->name('subadmin.airbersih.kabupatensarmi.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDukcapilStore'])->name('subadmin.airbersih.kabupatensarmi.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDukcapilEdit'])->name('subadmin.airbersih.kabupatensarmi.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDukcapilUpdate'])->name('subadmin.airbersih.kabupatensarmi.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDukcapilDestroy'])->name('subadmin.airbersih.kabupatensarmi.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiStatisticIndex'])->name('subadmin.airbersih.kabupatensarmi.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiStatisticCreate'])->name('subadmin.airbersih.kabupatensarmi.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiStatisticStore'])->name('subadmin.airbersih.kabupatensarmi.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiStatisticEdit'])->name('subadmin.airbersih.kabupatensarmi.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiStatisticUpdate'])->name('subadmin.airbersih.kabupatensarmi.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiStatisticDestroy'])->name('subadmin.airbersih.kabupatensarmi.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDataProcesIndex'])->name('subadmin.airbersih.kabupatensarmi.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDataProcesCreate'])->name('subadmin.airbersih.kabupatensarmi.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDataProcesStore'])->name('subadmin.airbersih.kabupatensarmi.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDataProcesEdit'])->name('subadmin.airbersih.kabupatensarmi.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDataProcesUpdate'])->name('subadmin.airbersih.kabupatensarmi.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiDataProcesDestroy'])->name('subadmin.airbersih.kabupatensarmi.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiRiverintakeIndex'])->name('subadmin.airbersih.kabupatensarmi.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiRiverintakeCreate'])->name('subadmin.airbersih.kabupatensarmi.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiRiverintakeStore'])->name('subadmin.airbersih.kabupatensarmi.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiRiverintakeEdit'])->name('subadmin.airbersih.kabupatensarmi.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiRiverintakeUpdate'])->name('subadmin.airbersih.kabupatensarmi.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiRiverintakeDestroy'])->name('subadmin.airbersih.kabupatensarmi.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterwellIndex'])->name('subadmin.airbersih.kabupatensarmi.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterwellCreate'])->name('subadmin.airbersih.kabupatensarmi.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterwellStore'])->name('subadmin.airbersih.kabupatensarmi.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterwellEdit'])->name('subadmin.airbersih.kabupatensarmi.waterwell.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterwellUpdate'])->name('subadmin.airbersih.kabupatensarmi.waterwell.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterwellDestroy'])->name('subadmin.airbersih.kabupatensarmi.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWatertankIndex'])->name('subadmin.airbersih.kabupatensarmi.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWatertankCreate'])->name('subadmin.airbersih.kabupatensarmi.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWatertankStore'])->name('subadmin.airbersih.kabupatensarmi.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWatertankEdit'])->name('subadmin.airbersih.kabupatensarmi.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWatertankUpdate'])->name('subadmin.airbersih.kabupatensarmi.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWatertankDestroy'])->name('subadmin.airbersih.kabupatensarmi.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterspringIndex'])->name('subadmin.airbersih.kabupatensarmi.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterspringCreate'])->name('subadmin.airbersih.kabupatensarmi.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterspringStore'])->name('subadmin.airbersih.kabupatensarmi.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterspringEdit'])->name('subadmin.airbersih.kabupatensarmi.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiWaterspringUpdate'])->name('subadmin.airbersih.kabupatensarmi.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiwaterspringDestroy'])->name('subadmin.airbersih.kabupatensarmi.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/sarmi/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabSarmiMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatensarmi.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatensarmi.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/sarmi/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabSarmiMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatensarmi.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/sarmi/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatensarmi.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/sarmi/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatensarmi.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/sarmi/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabSarmiMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatensarmi.municipalwaterwork.destroy');

    //Kabupaten SUPIORI
    Route::get('/subadmin/airbersih/kabupaten/supiori/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterResourceIndex'])->name('subadmin.airbersih.kabupatensupiori.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterResourceCreate'])->name('subadmin.airbersih.kabupatensupiori.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterResourceStore'])->name('subadmin.airbersih.kabupatensupiori.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterResourceEdit'])->name('subadmin.airbersih.kabupatensupiori.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterResourceUpdate'])->name('subadmin.airbersih.kabupatensupiori.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterResourceDestroy'])->name('subadmin.airbersih.kabupatensupiori.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDukcapilIndex'])->name('subadmin.airbersih.kabupatensupiori.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDukcapilCreate'])->name('subadmin.airbersih.kabupatensupiori.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDukcapilStore'])->name('subadmin.airbersih.kabupatensupiori.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDukcapilEdit'])->name('subadmin.airbersih.kabupatensupiori.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDukcapilUpdate'])->name('subadmin.airbersih.kabupatensupiori.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDukcapilDestroy'])->name('subadmin.airbersih.kabupatensupiori.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriStatisticIndex'])->name('subadmin.airbersih.kabupatensupiori.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriStatisticCreate'])->name('subadmin.airbersih.kabupatensupiori.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriStatisticStore'])->name('subadmin.airbersih.kabupatensupiori.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriStatisticEdit'])->name('subadmin.airbersih.kabupatensupiori.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriStatisticUpdate'])->name('subadmin.airbersih.kabupatensupiori.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriStatisticDestroy'])->name('subadmin.airbersih.kabupatensupiori.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDataProcesIndex'])->name('subadmin.airbersih.kabupatensupiori.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDataProcesCreate'])->name('subadmin.airbersih.kabupatensupiori.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDataProcesStore'])->name('subadmin.airbersih.kabupatensupiori.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDataProcesEdit'])->name('subadmin.airbersih.kabupatensupiori.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDataProcesUpdate'])->name('subadmin.airbersih.kabupatensupiori.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriDataProcesDestroy'])->name('subadmin.airbersih.kabupatensupiori.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriRiverintakeIndex'])->name('subadmin.airbersih.kabupatensupiori.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriRiverintakeCreate'])->name('subadmin.airbersih.kabupatensupiori.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriRiverintakeStore'])->name('subadmin.airbersih.kabupatensupiori.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriRiverintakeEdit'])->name('subadmin.airbersih.kabupatensupiori.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriRiverintakeUpdate'])->name('subadmin.airbersih.kabupatensupiori.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriRiverintakeDestroy'])->name('subadmin.airbersih.kabupatensupiori.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterwellIndex'])->name('subadmin.airbersih.kabupatensupiori.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterwellCreate'])->name('subadmin.airbersih.kabupatensupiori.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterwellStore'])->name('subadmin.airbersih.kabupatensupiori.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterwellEdit'])->name('subadmin.airbersih.kabupatensupiori.waterwell.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterwellUpdate'])->name('subadmin.airbersih.kabupatensupiori.waterwell.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterwellDestroy'])->name('subadmin.airbersih.kabupatensupiori.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWatertankIndex'])->name('subadmin.airbersih.kabupatensupiori.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWatertankCreate'])->name('subadmin.airbersih.kabupatensupiori.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWatertankStore'])->name('subadmin.airbersih.kabupatensupiori.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWatertankEdit'])->name('subadmin.airbersih.kabupatensupiori.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWatertankUpdate'])->name('subadmin.airbersih.kabupatensupiori.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWatertankDestroy'])->name('subadmin.airbersih.kabupatensupiori.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterspringIndex'])->name('subadmin.airbersih.kabupatensupiori.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterspringCreate'])->name('subadmin.airbersih.kabupatensupiori.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterspringStore'])->name('subadmin.airbersih.kabupatensupiori.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterspringEdit'])->name('subadmin.airbersih.kabupatensupiori.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriWaterspringUpdate'])->name('subadmin.airbersih.kabupatensupiori.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriwaterspringDestroy'])->name('subadmin.airbersih.kabupatensupiori.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/supiori/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabSupioriMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatensupiori.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/supiori/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatensupiori.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/supiori/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabSupioriMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatensupiori.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/supiori/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatensupiori.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/supiori/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatensupiori.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/supiori/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabSupioriMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatensupiori.municipalwaterwork.destroy');

    //Kabupaten KEPULAUAN YAPEN
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterResourceIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterResourceCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterResourceStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterResourceEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterResourceUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterResourceDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDukcapilIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDukcapilCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDukcapilStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDukcapilEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDukcapilUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDukcapilDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenStatisticIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenStatisticCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenStatisticStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenStatisticEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenStatisticUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenStatisticDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDataProcesIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDataProcesCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDataProcesStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDataProcesEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDataProcesUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenDataProcesDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenRiverintakeIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenRiverintakeCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenRiverintakeStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenRiverintakeEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenRiverintakeUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenRiverintakeDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterwellIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterwellCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterwellStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterwellEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterwellUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterwellDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWatertankIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWatertankCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWatertankStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWatertankEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWatertankUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWatertankDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterspringIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterspringCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterspringStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterspringEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenWaterspringUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenwaterspringDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.destroy');


    //Kabupaten MamberamoRaya
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterResourceIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterResourceCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterResourceStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamorayan/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterResourceEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterResourceUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterResourceDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDukcapilIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDukcapilCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDukcapilStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDukcapilEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDukcapilUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDukcapilDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaStatisticIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaStatisticCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaStatisticStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaStatisticEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaStatisticUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaStatisticDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDataProcesIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDataProcesCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDataProcesStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDataProcesEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDataProcesUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaDataProcesDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaRiverintakeIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaRiverintakeCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaRiverintakeStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaRiverintakeEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaRiverintakeUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaRiverintakeDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterwellIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterwellCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterwellStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterwellEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterwell.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterwellUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterwell.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterwellDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWatertankIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWatertankCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWatertankStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWatertankEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWatertankUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWatertankDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterspringIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterspringCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterspringStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterspringEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaWaterspringUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayawaterspringDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/mamberamoraya/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.destroy');

    // WAROPEN
    Route::get('/subadmin/airbersih/kabupaten/waropen/waterresource/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterResourceIndex'])->name('subadmin.airbersih.kabupatenwaropen.waterresource.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterResourceCreate'])->name('subadmin.airbersih.kabupatenwaropen.waterresource.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/waterresource/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterResourceStore'])->name('subadmin.airbersih.kabupatenwaropen.waterresource.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/waterresource/edit/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterResourceEdit'])->name('subadmin.airbersih.kabupatenwaropen.waterresource.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/waterresource/update/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterResourceUpdate'])->name('subadmin.airbersih.kabupatenwaropen.waterresource.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/waterresource/index/{waterresource}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterResourceDestroy'])->name('subadmin.airbersih.kabupatenwaropen.waterresource.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/dukcapil/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDukcapilIndex'])->name('subadmin.airbersih.kabupatenwaropen.dukcapil.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDukcapilCreate'])->name('subadmin.airbersih.kabupatenwaropen.dukcapil.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/dukcapil/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDukcapilStore'])->name('subadmin.airbersih.kabupatenwaropen.dukcapil.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/dukcapil/edit/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDukcapilEdit'])->name('subadmin.airbersih.kabupatenwaropen.dukcapil.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/dukcapil/update/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDukcapilUpdate'])->name('subadmin.airbersih.kabupatenwaropen.dukcapil.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/dukcapil/index/{dukcapil}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDukcapilDestroy'])->name('subadmin.airbersih.kabupatenwaropen.dukcapil.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/statistic/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenStatisticIndex'])->name('subadmin.airbersih.kabupatenwaropen.statistic.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenStatisticCreate'])->name('subadmin.airbersih.kabupatenwaropen.statistic.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/statistic/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenStatisticStore'])->name('subadmin.airbersih.kabupatenwaropen.statistic.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/statistic/edit/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenStatisticEdit'])->name('subadmin.airbersih.kabupatenwaropen.statistic.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/statistic/update/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenStatisticUpdate'])->name('subadmin.airbersih.kabupatenwaropen.statistic.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/statistic/index/{statistic}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenStatisticDestroy'])->name('subadmin.airbersih.kabupatenwaropen.statistic.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/dataproces/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDataProcesIndex'])->name('subadmin.airbersih.kabupatenwaropen.dataproces.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDataProcesCreate'])->name('subadmin.airbersih.kabupatenwaropen.dataproces.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/dataproces/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDataProcesStore'])->name('subadmin.airbersih.kabupatenwaropen.dataproces.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/dataproces/edit/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDataProcesEdit'])->name('subadmin.airbersih.kabupatenwaropen.dataproces.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/dataproces/update/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDataProcesUpdate'])->name('subadmin.airbersih.kabupatenwaropen.dataproces.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/dataproces/index/{dataproces}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenDataProcesDestroy'])->name('subadmin.airbersih.kabupatenwaropen.dataproces.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/riverintake/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenRiverintakeIndex'])->name('subadmin.airbersih.kabupatenwaropen.riverintake.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenRiverintakeCreate'])->name('subadmin.airbersih.kabupatenwaropen.riverintake.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/riverintake/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenRiverintakeStore'])->name('subadmin.airbersih.kabupatenwaropen.riverintake.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/riverintake/edit/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenRiverintakeEdit'])->name('subadmin.airbersih.kabupatenwaropen.riverintake.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/riverintake/update/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenRiverintakeUpdate'])->name('subadmin.airbersih.kabupatenwaropen.riverintake.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/riverintake/index/{riverintake}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenRiverintakeDestroy'])->name('subadmin.airbersih.kabupatenwaropen.riverintake.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/waterwell/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterwellIndex'])->name('subadmin.airbersih.kabupatenwaropen.waterwell.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterwellCreate'])->name('subadmin.airbersih.kabupatenwaropen.waterwell.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/waterwell/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterwellStore'])->name('subadmin.airbersih.kabupatenwaropen.waterwell.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/waterwell/edit/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterwellEdit'])->name('subadmin.airbersih.kabupatenwaropen.waterwell.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/waterwell/update/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterwellUpdate'])->name('subadmin.airbersih.kabupatenwaropen.waterwell.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/waterwell/index/{waterwell}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterwellDestroy'])->name('subadmin.airbersih.kabupatenwaropen.waterwell.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/watertank/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWatertankIndex'])->name('subadmin.airbersih.kabupatenwaropen.watertank.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWatertankCreate'])->name('subadmin.airbersih.kabupatenwaropen.watertank.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/watertank/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWatertankStore'])->name('subadmin.airbersih.kabupatenwaropen.watertank.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/watertank/edit/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWatertankEdit'])->name('subadmin.airbersih.kabupatenwaropen.watertank.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/watertank/update/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWatertankUpdate'])->name('subadmin.airbersih.kabupatenwaropen.watertank.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/watertank/index/{watertank}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWatertankDestroy'])->name('subadmin.airbersih.kabupatenwaropen.watertank.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/waterspring/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterspringIndex'])->name('subadmin.airbersih.kabupatenwaropen.waterspring.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterspringCreate'])->name('subadmin.airbersih.kabupatenwaropen.waterspring.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/waterspring/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterspringStore'])->name('subadmin.airbersih.kabupatenwaropen.waterspring.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/waterspring/edit/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterspringEdit'])->name('subadmin.airbersih.kabupatenwaropen.waterspring.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/waterspring/update/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenWaterspringUpdate'])->name('subadmin.airbersih.kabupatenwaropen.waterspring.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/waterspring/index/{waterspring}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenwaterspringDestroy'])->name('subadmin.airbersih.kabupatenwaropen.waterspring.destroy');

    Route::get('/subadmin/airbersih/kabupaten/waropen/municipalwaterwork/index', [SubAdminController::class, 'SubAdminAirBersihKabWaropenMunicipalWaterworkIndex'])->name('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.index');
    Route::get('/subadmin/airbersih/kabupaten/waropen/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenMunicipalWaterworkCreate'])->name('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.create'); 
    Route::post('/subadmin/airbersih/kabupaten/waropen/municipalwaterwork/create', [SubAdminController::class, 'SubAdminAirBersihKabWaropenMunicipalWaterworkStore'])->name('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.store');
    Route::get('/subadmin/airbersih/kabupaten/waropen/municipalwaterwork/edit/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenMunicipalWaterworkEdit'])->name('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.edit');
    Route::put('/subadmin/airbersih/kabupaten/waropen/municipalwaterwork/update/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenMunicipalWaterworkUpdate'])->name('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.update');
    Route::delete('/subadmin/airbersih/kabupaten/waropen/municipalwaterwork/index/{municipalwaterwork}', [SubAdminController::class, 'SubAdminAirBersihKabWaropenMunicipalWaterworkDestroy'])->name('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.destroy');



    Route::get('/subadmin/table/comment/index', [SubAdminController::class, 'SubAdminIndexComment'])->name('subadmin.table.comment.index'); 
    Route::delete('/subadmin/table/comment/index/{comment}', [SubAdminController::class, 'SubAdminDestroyComment'])->name('subadmin.table.comment.destroy');
});

Route::middleware(['auth', 'AdminPU'])->group(function () {
    Route::get('/adminpu/table/comment/index', [AdminPUController::class, 'AdminPUIndexComment'])->name('adminpu.table.comment.index'); 
    

    Route::get('/adminpu/index', [SuperAdminController::class, 'SuperAdminIndex']);

    //Kota Jayapura
    Route::get('/adminpu/airbersih/kota/jayapura/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraWaterResourceIndex'])->name('adminpu.airbersih.kotajayapura.waterresource.index');
    Route::get('/adminpu/airbersih/kota/jayapura/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraDukcapilIndex'])->name('adminpu.airbersih.kotajayapura.dukcapil.index');
    Route::get('/adminpu/airbersih/kota/jayapura/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraStatisticIndex'])->name('adminpu.airbersih.kotajayapura.statistic.index');
    Route::get('/adminpu/airbersih/kota/jayapura/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraDataProcesIndex'])->name('adminpu.airbersih.kotajayapura.dataproces.index');
    Route::get('/adminpu/airbersih/kota/jayapura/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraRiverintakeIndex'])->name('adminpu.airbersih.kotajayapura.riverintake.index');
    Route::get('/adminpu/airbersih/kota/jayapura/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraWaterwellIndex'])->name('adminpu.airbersih.kotajayapura.waterwell.index');
    Route::get('/adminpu/airbersih/kota/jayapura/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraWatertankIndex'])->name('adminpu.airbersih.kotajayapura.watertank.index');
    Route::get('/adminpu/airbersih/kota/jayapura/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraWaterspringIndex'])->name('adminpu.airbersih.kotajayapura.waterspring.index');
    Route::get('/adminpu/airbersih/kota/jayapura/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKotaJayapuraMunicipalWaterworkIndex'])->name('adminpu.airbersih.kotajayapura.municipalwaterwork.index');

    //Kabupaten Jayapura
    Route::get('/adminpu/airbersih/kabupaten/jayapura/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraWaterResourceIndex'])->name('adminpu.airbersih.kabupatenjayapura.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraDukcapilIndex'])->name('adminpu.airbersih.kabupatenjayapura.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraStatisticIndex'])->name('adminpu.airbersih.kabupatenjayapura.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraDataProcesIndex'])->name('adminpu.airbersih.kabupatenjayapura.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraRiverintakeIndex'])->name('adminpu.airbersih.kabupatenjayapura.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraWaterwellIndex'])->name('adminpu.airbersih.kabupatenjayapura.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraWatertankIndex'])->name('adminpu.airbersih.kabupatenjayapura.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraWaterspringIndex'])->name('adminpu.airbersih.kabupatenjayapura.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/jayapura/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabJayapuraMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatenjayapura.municipalwaterwork.index');
    

    //Kabupaten Biak Numfor
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforWaterResourceIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforDukcapilIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforStatisticIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforDataProcesIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforRiverintakeIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforWaterwellIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforWatertankIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforWaterspringIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/biaknumfor/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabBiakNumforMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatenbiaknumfor.municipalwaterwork.index');

     //Kabupaten KEEROM
    Route::get('/adminpu/airbersih/kabupaten/keerom/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromWaterResourceIndex'])->name('adminpu.airbersih.kabupatenkeerom.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromDukcapilIndex'])->name('adminpu.airbersih.kabupatenkeerom.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromStatisticIndex'])->name('adminpu.airbersih.kabupatenkeerom.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromDataProcesIndex'])->name('adminpu.airbersih.kabupatenkeerom.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromRiverintakeIndex'])->name('adminpu.airbersih.kabupatenkeerom.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromWaterwellIndex'])->name('adminpu.airbersih.kabupatenkeerom.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromWatertankIndex'])->name('adminpu.airbersih.kabupatenkeerom.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromWaterspringIndex'])->name('adminpu.airbersih.kabupatenkeerom.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/keerom/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabKeeromMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatenkeerom.municipalwaterwork.index');
     
    //Kabupaten Sarmi
    Route::get('/adminpu/airbersih/kabupaten/sarmi/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiWaterResourceIndex'])->name('adminpu.airbersih.kabupatensarmi.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiDukcapilIndex'])->name('adminpu.airbersih.kabupatensarmi.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiStatisticIndex'])->name('adminpu.airbersih.kabupatensarmi.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiDataProcesIndex'])->name('adminpu.airbersih.kabupatensarmi.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiRiverintakeIndex'])->name('adminpu.airbersih.kabupatensarmi.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiWaterwellIndex'])->name('adminpu.airbersih.kabupatensarmi.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiWatertankIndex'])->name('adminpu.airbersih.kabupatensarmi.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiWaterspringIndex'])->name('adminpu.airbersih.kabupatensarmi.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/sarmi/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabSarmiMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatensarmi.municipalwaterwork.index');
       
    //Kabupaten SUPIORI
    Route::get('/adminpu/airbersih/kabupaten/supiori/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriWaterResourceIndex'])->name('adminpu.airbersih.kabupatensupiori.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriDukcapilIndex'])->name('adminpu.airbersih.kabupatensupiori.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriStatisticIndex'])->name('adminpu.airbersih.kabupatensupiori.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriDataProcesIndex'])->name('adminpu.airbersih.kabupatensupiori.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriRiverintakeIndex'])->name('adminpu.airbersih.kabupatensupiori.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriWaterwellIndex'])->name('adminpu.airbersih.kabupatensupiori.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriWatertankIndex'])->name('adminpu.airbersih.kabupatensupiori.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriWaterspringIndex'])->name('adminpu.airbersih.kabupatensupiori.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/supiori/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabSupioriMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatensupiori.municipalwaterwork.index');
       
    //Kabupaten KEPULAUAN YAPEN
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenWaterResourceIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenDukcapilIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenStatisticIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenDataProcesIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenRiverintakeIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenWaterwellIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenWatertankIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenWaterspringIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabKepulauanYapenMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatenkepulauanyapen.municipalwaterwork.index');
       
    //Kabupaten MamberamoRaya
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaWaterResourceIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaDukcapilIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaStatisticIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaDataProcesIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaRiverintakeIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaWaterwellIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaWatertankIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaWaterspringIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/mamberamoraya/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabMamberamoRayaMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatenmamberamoraya.index');
       
    // WAROPEN
    Route::get('/adminpu/airbersih/kabupaten/waropen/waterresource/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenWaterResourceIndex'])->name('adminpu.airbersih.kabupatenwaropen.waterresource.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/dukcapil/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenDukcapilIndex'])->name('adminpu.airbersih.kabupatenwaropen.dukcapil.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/statistic/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenStatisticIndex'])->name('adminpu.airbersih.kabupatenwaropen.statistic.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/dataproces/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenDataProcesIndex'])->name('adminpu.airbersih.kabupatenwaropen.dataproces.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/riverintake/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenRiverintakeIndex'])->name('adminpu.airbersih.kabupatenwaropen.riverintake.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/waterwell/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenWaterwellIndex'])->name('adminpu.airbersih.kabupatenwaropen.waterwell.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/watertank/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenWatertankIndex'])->name('adminpu.airbersih.kabupatenwaropen.watertank.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/waterspring/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenWaterspringIndex'])->name('adminpu.airbersih.kabupatenwaropen.waterspring.index');
    Route::get('/adminpu/airbersih/kabupaten/waropen/municipalwaterwork/index', [AdminPUController::class, 'AdminPUAirBersihKabWaropenMunicipalWaterworkIndex'])->name('adminpu.airbersih.kabupatenwaropen.municipalwaterwork.index');
    
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

