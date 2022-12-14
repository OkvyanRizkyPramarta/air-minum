<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Comment;
use App\Models\MunicipalWaterwork;
use App\Models\District;
use App\Models\Village;
use App\Models\RiverIntake;
use App\Models\Watertank;
use App\Models\Waterwell;
use App\Models\WaterSpring;
use App\Models\Population;
use App\Models\SubAdminFile;
use App\Models\Map;
use App\Models\Dukcapil;
use App\Models\Statistic;
use App\Models\DataProces;

class SubAdminController extends Controller
{

    public function SubAdminIndex()
     {
         return view('subadmin.index');
     }

    public function AdminIndexCity()
    {
        $city = City::index();
        return view('superadmin.city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreateCity()
    {
        return view('superadmin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStoreCity(Request $request)
    {
        City::store($request);
        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.table.city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminShowCity($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditCity(City $city)
    {
        return view('superadmin.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateCity(Request $request, City $city)
    {
        $city = City::findOrFail($city->id);

        $city->update([
            'name'     => $request->name,
            'ocean_area'     => $request->ocean_area,
            'mainland_area'     => $request->mainland_area,
            'total_area'     => $request->total_area,
            // 'oap'     => $request->oap,
            'year'     => $request->year,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyCity(City $city)
    {
        $city->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKotaJayapuraWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kotajayapura.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '9');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.waterresource.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kotajayapura.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterResourceUpdate(Request $request, WaterResource $waterresource)
    {
        $waterresource = WaterResource::findOrFail($waterresource->id);

        $city = new City;

        if($request->file('file') == "") {

            $waterresource->update([
                'name'      =>$request->name,
                'show'      => $request->show,
            ]);

            $waterresource->city()->associate($city);

        } else {

            if ($waterresource->file&&file_exists(storage_path('app/public/'.$waterresource->file))) {
                \Storage::delete('public/'.$waterresource->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $waterresource->update([
            'name'      => $request->name,
            'file'      => $path->hashName(),
            'show'      => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    // public function SubAdminAirBersihKotaJayapuraRiverintakeIndex()
    // {
    //     $riverintake = RiverIntake::where('city_id', '9')->get();
    //     return view('subadmin.kotajayapura.riverintake.index', compact('riverintake'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraRiverintakeCreate()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.riverintake.create', compact('city','district'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraRiverintakeStore(Request $request)
    // {

    //     $city = new City;
    //     $city->id = $request->get('city_id', '9');

    //     $district = new District;
    //     $district -> id = $request->get('district_id');
            
    //     $riverintake = new RiverIntake;
    //     $riverintake->name = $request->name;
    //     $riverintake->file = $request->file('file')->store('files', 'public');
    //     $riverintake->show = $request->show;
    //     $riverintake->city()->associate($city);
    //     $riverintake->district()->associate($district);
    //     $riverintake->save();

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.riverintake.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraRiverintakeEdit(RiverIntake $riverintake)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.riverintake.edit', compact('city', 'district', 'riverintake'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraRiverintakeUpdate(Request $request, RiverIntake $riverintake)
    // {
    //     $riverintake = RiverIntake::findOrFail($riverintake->id);

    //     $city = new City;
    //     $district = new District;

    //     if($request->file('file') == "") {

    //         $riverintake->update([
    //             'name'      =>$request->name,
    //             'show'      => $request->show,
    //             'district_id'   => $request->district_id,
    //         ]);

    //         $riverintake->city()->associate($city);

    //     } else {

    //         if ($riverintake->file&&file_exists(storage_path('app/public/'.$riverintake->file))) {
    //             \Storage::delete('public/'.$riverintake->file);
    //         }

    //     $path = $request->file('file');
    //     $path->storeAs('public/', $path->hashName());

    //     $riverintake->update([
    //         'name'          => $request->name,
    //         'district_id'   => $request->district_id,
    //         'file'          => $path->hashName(),
    //         'show'          => $request->show,
    //     ]);
    //     }
       
    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.riverintake.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraRiverintakeDestroy(RiverIntake $riverintake)
    // {
    //     $riverintake->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function SubAdminAirBersihKotaJayapuraWaterwellIndex()
    // {
    //     $waterwell = WaterWell::where('city_id', '9')->get();
    //     return view('subadmin.kotajayapura.waterwell.index', compact('waterwell'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterwellCreate()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.waterwell.create', compact('city','district'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterwellStore(Request $request)
    // {

    //     $city = new City;
    //     $city->id = $request->get('city_id', '9');

    //     $district = new District;
    //     $district -> id = $request->get('district_id');
            
    //     $waterwell = new WaterWell;
    //     $waterwell->name = $request->name;
    //     $waterwell->file = $request->file('file')->store('files', 'public');
    //     $waterwell->show = $request->show;
    //     $waterwell->city()->associate($city);
    //     $waterwell->district()->associate($district);
    //     $waterwell->save();

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.waterwell.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterwellEdit(WaterWell $waterwell)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.waterwell.edit', compact('city', 'district', 'waterwell'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterwellUpdate(Request $request, WaterWell $waterwell)
    // {
    //     $waterwell = WaterWell::findOrFail($waterwell->id);

    //     $city = new City;
    //     $district = new District;

    //     if($request->file('file') == "") {

    //         $waterwell->update([
    //             'name'      =>$request->name,
    //             'show'      => $request->show,
    //             'district_id'   => $request->district_id,
    //         ]);

    //         $waterwell->city()->associate($city);

    //     } else {

    //         if ($waterwell->file&&file_exists(storage_path('app/public/'.$waterwell->file))) {
    //             \Storage::delete('public/'.$waterwell->file);
    //         }

    //     $path = $request->file('file');
    //     $path->storeAs('public/', $path->hashName());

    //     $waterwell->update([
    //         'name'          => $request->name,
    //         'district_id'   => $request->district_id,
    //         'file'          => $path->hashName(),
    //         'show'          => $request->show,
    //     ]);
    //     }
       
    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.waterwell.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterwellDestroy(WaterWell $waterwell)
    // {
    //     $waterwell->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function SubAdminAirBersihKotaJayapuraWatertankIndex()
    // {
    //     $watertank = Watertank::where('city_id', '9')->get();
    //     return view('subadmin.kotajayapura.watertank.index', compact('watertank'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWatertankCreate()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.watertank.create', compact('city','district'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWatertankStore(Request $request)
    // {

    //     $city = new City;
    //     $city->id = $request->get('city_id', '9');

    //     $district = new District;
    //     $district -> id = $request->get('district_id');
            
    //     $watertank = new WaterTank;
    //     $watertank->name = $request->name;
    //     $watertank->file = $request->file('file')->store('files', 'public');
    //     $watertank->show = $request->show;
    //     $watertank->city()->associate($city);
    //     $watertank->district()->associate($district);
    //     $watertank->save();

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.watertank.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWatertankEdit(WaterTank $watertank)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.watertank.edit', compact('city', 'district', 'watertank'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWatertankUpdate(Request $request, WaterTank $watertank)
    // {
    //     $watertank = WaterTank::findOrFail($watertank->id);

    //     $city = new City;
    //     $district = new District;

    //     if($request->file('file') == "") {

    //         $watertank->update([
    //             'name'      =>$request->name,
    //             'show'      => $request->show,
    //             'district_id'   => $request->district_id,
    //         ]);

    //         $watertank->city()->associate($city);

    //     } else {

    //         if ($watertank->file&&file_exists(storage_path('app/public/'.$watertank->file))) {
    //             \Storage::delete('public/'.$watertank->file);
    //         }

    //     $path = $request->file('file');
    //     $path->storeAs('public/', $path->hashName());

    //     $watertank->update([
    //         'name'          => $request->name,
    //         'district_id'   => $request->district_id,
    //         'file'          => $path->hashName(),
    //         'show'          => $request->show,
    //     ]);
    //     }
       
    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.watertank.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWatertankDestroy(WaterTank $watertank)
    // {
    //     $watertank->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function SubAdminAirBersihKotaJayapuraWaterspringIndex()
    // {
    //     $waterspring = Waterspring::where('city_id', '9')->get();
    //     return view('subadmin.kotajayapura.waterspring.index', compact('waterspring'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterspringCreate()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.waterspring.create', compact('city','district'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterspringStore(Request $request)
    // {

    //     $city = new City;
    //     $city->id = $request->get('city_id', '9');

    //     $district = new District;
    //     $district -> id = $request->get('district_id');
            
    //     $waterspring = new Waterspring;
    //     $waterspring->name = $request->name;
    //     $waterspring->file = $request->file('file')->store('files', 'public');
    //     $waterspring->show = $request->show;
    //     $waterspring->city()->associate($city);
    //     $waterspring->district()->associate($district);
    //     $waterspring->save();

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.waterspring.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterspringEdit(Waterspring $waterspring)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.waterspring.edit', compact('city', 'district', 'waterspring'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterspringUpdate(Request $request, Waterspring $waterspring)
    // {
    //     $waterspring = Waterspring::findOrFail($waterspring->id);

    //     $city = new City;
    //     $district = new District;

    //     if($request->file('file') == "") {

    //         $waterspring->update([
    //             'name'      =>$request->name,
    //             'show'      => $request->show,
    //             'district_id'   => $request->district_id,
    //         ]);

    //         $waterspring->city()->associate($city);

    //     } else {

    //         if ($waterspring->file&&file_exists(storage_path('app/public/'.$waterspring->file))) {
    //             \Storage::delete('public/'.$waterspring->file);
    //         }

    //     $path = $request->file('file');
    //     $path->storeAs('public/', $path->hashName());

    //     $waterspring->update([
    //         'name'          => $request->name,
    //         'district_id'   => $request->district_id,
    //         'file'          => $path->hashName(),
    //         'show'          => $request->show,
    //     ]);
    //     }
       
    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.waterspring.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraWaterspringDestroy(Waterspring $waterspring)
    // {
    //     $waterspring->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkIndex()
    // {
    //     $municipalwaterwork = MunicipalWaterwork::where('city_id', '9')->get();
    //     return view('subadmin.kotajayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkCreate()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.municipalwaterwork.create', compact('city','district'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkStore(Request $request)
    // {

    //     $city = new City;
    //     $city->id = $request->get('city_id', '9');
            
    //     $watertank = new MunicipalWaterwork;
    //     $watertank->name = $request->name;
    //     $watertank->file = $request->file('file')->store('files', 'public');
    //     $watertank->show = $request->show;
    //     $watertank->data = $request->data;
    //     $watertank->city()->associate($city);
    //     $watertank->save();

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.municipalwaterwork.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('subadmin.kotajayapura.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
    // {
    //     $municipalwaterwork = MunicipalWaterwork::findOrFail($municipalwaterwork->id);

    //     $city = new City;

    //     if($request->file('file') == "") {

    //         $municipalwaterwork->update([
    //             'name'      =>$request->name,
    //             'data'      => $request->data,
    //             'show'      => $request->show,
    //         ]);

    //         $municipalwaterwork->city()->associate($city);

    //     } else {

    //         if ($municipalwaterwork->file&&file_exists(storage_path('app/public/'.$municipalwaterwork->file))) {
    //             \Storage::delete('public/'.$municipalwaterwork->file);
    //         }

    //     $path = $request->file('file');
    //     $path->storeAs('public/', $path->hashName());

    //     $municipalwaterwork->update([
    //         'name'          => $request->name,
    //         'file'          => $path->hashName(),
    //         'data'          => $request->data,
    //         'show'          => $request->show,
    //     ]);
    //     }
       
    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('subadmin.airbersih.kotajayapura.municipalwaterwork.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    // {
    //     $municipalwaterwork->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    public function SubAdminAirBersihKotaJayapuraDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kotajayapura.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '9');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.dukcapil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kotajayapura.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDukcapilUpdate(Request $request, Dukcapil $dukcapil)
    {
        $dukcapil = Dukcapil::findOrFail($dukcapil->id);

        $city = new City;

        if($request->file('file') == "") {

            $dukcapil->update([
                'name'      =>$request->name,
                'show'      => $request->show,
            ]);

            $dukcapil->city()->associate($city);

        } else {

            if ($dukcapil->file&&file_exists(storage_path('app/public/'.$dukcapil->file))) {
                \Storage::delete('public/'.$dukcapil->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $dukcapil->update([
            'name'      => $request->name,
            'file'      => $path->hashName(),
            'show'      => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKotaJayapuraStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kotajayapura.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '9');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.statistic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kotajayapura.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraStatisticUpdate(Request $request, Statistic $statistic)
    {
        $statistic = Statistic::findOrFail($statistic->id);

        $city = new City;

        if($request->file('file') == "") {

            $statistic->update([
                'name'      =>$request->name,
                'show'      => $request->show,
            ]);

            $statistic->city()->associate($city);

        } else {

            if ($statistic->file&&file_exists(storage_path('app/public/'.$statistic->file))) {
                \Storage::delete('public/'.$statistic->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $statistic->update([
            'name'      => $request->name,
            'file'      => $path->hashName(),
            'show'      => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKotaJayapuraDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kotajayapura.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '9');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.dataproces.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kotajayapura.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDataProcesUpdate(Request $request, DataProces $dataproces)
    {
        $dataproces = DataProces::findOrFail($dataproces->id);

        $city = new City;

        if($request->file('file') == "") {

            $dataproces->update([
                'name'      =>$request->name,
                'show'      => $request->show,
            ]);

            $dataproces->city()->associate($city);

        } else {

            if ($dataproces->file&&file_exists(storage_path('app/public/'.$dataproces->file))) {
                \Storage::delete('public/'.$dataproces->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $dataproces->update([
            'name'      => $request->name,
            'file'      => $path->hashName(),
            'show'      => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKotaJayapuraRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '9');

        $district = new District;
        $district -> id = $request->get('district_id');
            
        $riverintake = new RiverIntake;
        $riverintake->name = $request->name;
        $riverintake->file = $request->file('file')->store('files', 'public');
        $riverintake->show = $request->show;
        $riverintake->city()->associate($city);
        $riverintake->district()->associate($district);
        $riverintake->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.riverintake.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraRiverintakeUpdate(Request $request, RiverIntake $riverintake)
    {
        $riverintake = RiverIntake::findOrFail($riverintake->id);

        $city = new City;
        $district = new District;

        if($request->file('file') == "") {

            $riverintake->update([
                'name'      =>$request->name,
                'show'      => $request->show,
                'district_id'   => $request->district_id,
            ]);

            $riverintake->city()->associate($city);

        } else {

            if ($riverintake->file&&file_exists(storage_path('app/public/'.$riverintake->file))) {
                \Storage::delete('public/'.$riverintake->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $riverintake->update([
            'name'          => $request->name,
            'district_id'   => $request->district_id,
            'file'          => $path->hashName(),
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKotaJayapuraWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '9');

        $district = new District;
        $district -> id = $request->get('district_id');
            
        $waterwell = new WaterWell;
        $waterwell->name = $request->name;
        $waterwell->file = $request->file('file')->store('files', 'public');
        $waterwell->show = $request->show;
        $waterwell->city()->associate($city);
        $waterwell->district()->associate($district);
        $waterwell->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.waterwell.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterwellUpdate(Request $request, WaterWell $waterwell)
    {
        $waterwell = WaterWell::findOrFail($waterwell->id);

        $city = new City;
        $district = new District;

        if($request->file('file') == "") {

            $waterwell->update([
                'name'      =>$request->name,
                'show'      => $request->show,
                'district_id'   => $request->district_id,
            ]);

            $waterwell->city()->associate($city);

        } else {

            if ($waterwell->file&&file_exists(storage_path('app/public/'.$waterwell->file))) {
                \Storage::delete('public/'.$waterwell->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $waterwell->update([
            'name'          => $request->name,
            'district_id'   => $request->district_id,
            'file'          => $path->hashName(),
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKotaJayapuraWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '9');

        $district = new District;
        $district -> id = $request->get('district_id');
            
        $watertank = new WaterTank;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->city()->associate($city);
        $watertank->district()->associate($district);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.watertank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWatertankUpdate(Request $request, WaterTank $watertank)
    {
        $watertank = WaterTank::findOrFail($watertank->id);

        $city = new City;
        $district = new District;

        if($request->file('file') == "") {

            $watertank->update([
                'name'      =>$request->name,
                'show'      => $request->show,
                'district_id'   => $request->district_id,
            ]);

            $watertank->city()->associate($city);

        } else {

            if ($watertank->file&&file_exists(storage_path('app/public/'.$watertank->file))) {
                \Storage::delete('public/'.$watertank->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $watertank->update([
            'name'          => $request->name,
            'district_id'   => $request->district_id,
            'file'          => $path->hashName(),
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKotaJayapuraWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '9');

        $district = new District;
        $district -> id = $request->get('district_id');
            
        $waterspring = new Waterspring;
        $waterspring->name = $request->name;
        $waterspring->file = $request->file('file')->store('files', 'public');
        $waterspring->show = $request->show;
        $waterspring->city()->associate($city);
        $waterspring->district()->associate($district);
        $waterspring->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.waterspring.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterspringUpdate(Request $request, Waterspring $waterspring)
    {
        $waterspring = Waterspring::findOrFail($waterspring->id);

        $city = new City;
        $district = new District;

        if($request->file('file') == "") {

            $waterspring->update([
                'name'      =>$request->name,
                'show'      => $request->show,
                'district_id'   => $request->district_id,
            ]);

            $waterspring->city()->associate($city);

        } else {

            if ($waterspring->file&&file_exists(storage_path('app/public/'.$waterspring->file))) {
                \Storage::delete('public/'.$waterspring->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $waterspring->update([
            'name'          => $request->name,
            'district_id'   => $request->district_id,
            'file'          => $path->hashName(),
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '9')->get();
        return view('subadmin.kotajayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '9');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.municipalwaterwork.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kotajayapura.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork = MunicipalWaterwork::findOrFail($municipalwaterwork->id);

        $city = new City;

        if($request->file('file') == "") {

            $municipalwaterwork->update([
                'name'      =>$request->name,
                'data'      => $request->data,
                'show'      => $request->show,
            ]);

            $municipalwaterwork->city()->associate($city);

        } else {

            if ($municipalwaterwork->file&&file_exists(storage_path('app/public/'.$municipalwaterwork->file))) {
                \Storage::delete('public/'.$municipalwaterwork->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $municipalwaterwork->update([
            'name'          => $request->name,
            'file'          => $path->hashName(),
            'data'          => $request->data,
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.airbersih.kotajayapura.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKotaJayapuraMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
}
