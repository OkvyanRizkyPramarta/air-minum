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

    Route::get('/superadmin/index', [SuperAdminController::class, 'AdminIndexChart'])->name('superadmin.chart.index');

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

    Route::get('/superadmin/airbersih/kota/jayapura/municipalwaterwork/index', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkIndex'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.index');
    Route::get('/superadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkCreate'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.create'); 
    Route::post('/superadmin/airbersih/kota/jayapura/municipalwaterwork/create', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkStore'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.store');
    Route::get('/superadmin/airbersih/kota/jayapura/municipalwaterwork/edit/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkEdit'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.edit');
    Route::put('/superadmin/airbersih/kota/jayapura/municipalwaterwork/update/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkUpdate'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.update');
    Route::delete('/superadmin/airbersih/kota/jayapura/municipalwaterwork/index/{municipalwaterwork}', [SuperAdminController::class, 'SuperAdminAirBersihKotaJayapuraMunicipalWaterworkDestroy'])->name('superadmin.airbersih.kotajayapura.municipalwaterwork.destroy');

});

Route::middleware(['auth', 'SubAdmin'])->group(function () {
    Route::get('/subadmin/index', [SubAdminController::class, 'SubAdminIndexChart'])->name('subadmin.chart.index');

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

