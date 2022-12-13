<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Comment;
use App\Models\MunicipalWaterwork;
use App\Models\District;
use App\Models\RiverIntake;
use App\Models\Watertank;
use App\Models\Waterwell;
use App\Models\WaterSpring;
use App\Models\Population;
use App\Models\WaterResource;
use App\Models\Dukcapil;
use App\Models\Statistic;
use App\Models\DataProces;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function SuperAdminAirBersihKotaJayapuraWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kotajayapura.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterResourceStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.waterresource.index');
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
    public function SuperAdminAirBersihKotaJayapuraWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kotajayapura.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKotaJayapuraRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraRiverintakeStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.riverintake.index');
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
    public function SuperAdminAirBersihKotaJayapuraRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKotaJayapuraWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterwellStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.waterwell.index');
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
    public function SuperAdminAirBersihKotaJayapuraWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKotaJayapuraWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWatertankStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.watertank.index');
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
    public function SuperAdminAirBersihKotaJayapuraWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKotaJayapuraWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterspringStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.waterspring.index');
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
    public function SuperAdminAirBersihKotaJayapuraWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKotaJayapuraMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKotaJayapuraMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kotajayapura.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKotaJayapuraDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kotajayapura.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDukcapilStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.dukcapil.index');
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
    public function SuperAdminAirBersihKotaJayapuraDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kotajayapura.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKotaJayapuraStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kotajayapura.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraStatisticStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.statistic.index');
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
    public function SuperAdminAirBersihKotaJayapuraStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kotajayapura.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKotaJayapuraDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '9')->get();
        return view('superadmin.kotajayapura.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kotajayapura.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDataProcesStore(Request $request)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.dataproces.index');
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
    public function SuperAdminAirBersihKotaJayapuraDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kotajayapura.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kotajayapura.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKotaJayapuraDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }


    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminIndexDistrict()
    // {
    //     $district = District::index();
    //     return view('superadmin.district.index', compact('district'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateDistrict()
    // {
    //     return view('superadmin.district.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminStoreDistrict(Request $request)
    // {
    //     District::store($request);
    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.district.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowDistrict($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditDistrict(District $district)
    // {
    //     return view('superadmin.district.edit', compact('district'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateDistrict(Request $request, District $district)
    // {
    //     $district = District::findOrFail($district->id);

    //     $district->update([
    //         'name'     => $request->name,
    //         'postal_code'=>$request->postal_code,
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.district.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyDistrict(District $district)
    // {
    //     $district->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexVillage()
    // {
    //     $village = Village::index();
    //     return view('superadmin.village.index', compact('village'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateVillage()
    // {
    //     return view('superadmin.village.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminStoreVillage(Request $request)
    // {
    //     Village::store($request);
    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.village.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowVillage($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditVillage(Village $village)
    // {
    //     return view('superadmin.village.edit', compact('village'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateVillage(Request $request, Village $village)
    // {
    //     $village = Village::findOrFail($village->id);

    //     $village->update([
    //         'name'     => $request->name,
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.village.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyVillage(Village $village)
    // {
    //     $village->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexPopulation()
    // {
    //     $population = Population::index();
    //     return view('superadmin.population.index', compact('population'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreatePopulation()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('superadmin.population.create', compact('city', 'district'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminStorePopulation(Request $request)
    // {
    //     Population::store($request);
    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.population.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowPopulation($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditPopulation(Population $population)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     return view('superadmin.population.edit', compact('city', 'population', 'district'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdatePopulation(Request $request, Population $population)
    // {
    //     $population = Population::findOrFail($population->id);

    //     $population->update([
    //     'city_id' => $request->city_id,
    //     'district_id' => $request->district_id,
    //     'male_total' => $request->male_total,
    //     'female_total' => $request->female_total,
    //     'population_total' => $request->population_total,
    //     'maleoap_total' => $request->maleoap_total,
    //     'femaleoap_total' => $request->femaleoap_total,
    //     'populationoap_total' => $request->populationoap_total,
    //     'malenonoap_total' => $request->malenonoap_total,
    //     'femalenonoap_total' => $request->femalenonoap_total,
    //     'populationnonoap_total' => $request->populationnonoap_total,
    //     'year' => $request->year,
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.population.index');
    // }

    // /**
    //  * Remove the specified resource from stpopuorage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyPopulation(Population $population)
    // {
    //     $population->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexRiverIntake()
    // {
    //     $riverintake = RiverIntake::index();
    //     return view('superadmin.riverintake.index', compact('riverintake'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateRiverIntake()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.riverintake.create', compact('city','district','village'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminStoreRiverIntake(Request $request)
    // {

    //     RiverIntake::create([
    //         'bmm_code' => $request->bmm_code,
    //         'name' => $request->name,
    //         'intake_type' => $request->intake_type,
    //         'unit' => $request->unit,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'people' => $request->people,
    //         'debit' => $request->debit, 
    //         'pump_type' => $request->pump_type, 
    //         'head_pompa' => $request->head_pompa, 
    //         'production_year' => $request->production_year, 
    //         'operating_state' => $request->operating_state, 
    //         'updated_date' => $request->updated_date, 
    //     ]);

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.riverintake.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowRiverIntake($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditRiverIntake(RiverIntake $riverintake)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.riverintake.edit', compact('city', 'district', 'village', 'riverintake'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateRiverIntake(Request $request, RiverIntake $riverintake)
    // {
    //     $riverintake = RiverIntake::findOrFail($riverintake->id);

    //     $riverintake->update([
    //         'bmm_code' => $request->bmm_code,
    //         'name' => $request->name,
    //         'intake_type' => $request->intake_type,
    //         'unit' => $request->unit,
    //         'region_river' => $request->region_river,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'people' => $request->people,
    //         'debit' => $request->debit, 
    //         'pump_type' => $request->pump_type, 
    //         'head_pompa' => $request->head_pompa, 
    //         'production_year' => $request->production_year, 
    //         'operating_state' => $request->operating_state, 
    //         'updated_date' => $request->updated_date, 
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.riverintake.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyRiverIntake(RiverIntake $riverintake)
    // {
    //     $riverintake->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexWatertank()
    // {
    //     $watertank = Watertank::index();
    //     return view('superadmin.watertank.index', compact('watertank'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateWatertank()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.watertank.create', compact('city','district','village'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminStoreWatertank(Request $request)
    // {

    //     Watertank::create([
    //         'id_watertank' => $request->id_watertank,
    //         'bmm_code' => $request->bmm_code,
    //         'name' => $request->name,
    //         'unit' => $request->unit,
    //         'region_river' => $request->region_river,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //     ]);

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.watertank.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowWatertank($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditWatertank(Watertank $watertank)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.watertank.edit', compact('city', 'district', 'village', 'watertank'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateWatertank(Request $request, Watertank $watertank)
    // {
    //     $watertank = Watertank::findOrFail($watertank->id);

    //     $watertank->update([
    //         'id_watertank' => $request->id_watertank,
    //         'bmm_code' => $request->bmm_code,
    //         'name' => $request->name,
    //         'unit' => $request->unit,
    //         'region_river' => $request->region_river,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.watertank.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyWatertank(Watertank $watertank)
    // {
    //     $watertank->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexWaterwell()
    // {
    //     $waterwell = Waterwell::index();
    //     return view('superadmin.waterwell.index', compact('waterwell'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateWaterwell()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.waterwell.create', compact('city','district','village'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
   
    // public function AdminStoreWaterwell(Request $request)
    // {

    //     Waterwell::create([
    //         'bmm_code' => $request->bmm_code,
    //         'unit' => $request->unit,
    //         'name' => $request->name,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'well_function' => $request->well_function,
    //         'operating_state' => $request->operating_state,
    //         'debit' => $request->debit,
    //         'people' => $request->people,
    //         'luas' => $request->luas,
    //         'well_depth' => $request->well_depth,
    //         'pump_type' => $request->pump_type,
    //         'development_year' => $request->development_year,
    //         'well_condition' => $request->well_condition,
    //         'updated_date' => $request->update_date,
    //     ]);

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.waterwell.index');
    // }

    
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowWaterwell($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditWaterwell(Waterwell $waterwell)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.waterwell.edit', compact('city', 'district', 'village', 'waterwell'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateWaterwell(Request $request, Waterwell $waterwell)
    // {
    //     $waterwell = Waterwell::findOrFail($waterwell->id);

    //     $waterwell->update([
    //         'bmm_code' => $request->bmm_code,
    //         'unit' => $request->unit,
    //         'name' => $request->name,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'well_function' => $request->well_function,
    //         'operating_state' => $request->operating_state,
    //         'debit' => $request->debit,
    //         'people' => $request->people,
    //         'luas' => $request->luas,
    //         'well_depth' => $request->well_depth,
    //         'pump_type' => $request->pump_type,
    //         'development_year' => $request->development_year,
    //         'well_condition' => $request->well_condition,
    //         'updated_date' => $request->update_date,
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.waterwell.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyWaterwell(Waterwell $waterwell)
    // {
    //     $waterwell->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexMunicipalWaterwork()
    // {
    //     $municipalwaterwork = MunicipalWaterwork::index();
    //     return view('superadmin.municipalwaterwork.index', compact('municipalwaterwork'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateMunicipalWaterwork()
    // {
    //     return view('superadmin.municipalwaterwork.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminStoreMunicipalWaterwork(Request $request)
    // {
    //     MunicipalWaterwork::store($request);

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.municipalwaterwork.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowMunicipalWaterwork($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditMunicipalWaterwork(MunicipalWaterwork $municipalwaterwork)
    // {
    //     return view('superadmin.municipalwaterwork.edit', compact('municipalwaterwork'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateMunicipalWaterwork(Request $request, MunicipalWaterwork $municipalwaterwork)
    // {
    //     $municipalwaterwork = MunicipalWaterwork::findOrFail($municipalwaterwork->id);

    //     $municipalwaterwork->update([
    //         'name' => $request->name,
    //         'area' => $request->area,
    //         'koord_x' => $request->koord_x,
    //         'koord_y' => $request->koord_y,
    //         'elevasi_mdpl' => $request->elevasi_mdpl,
    //         'installed' => $request->installed,
    //         'operation' => $request->operation,
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.municipalwaterwork.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyMunicipalWaterwork(MunicipalWaterwork $municipalwaterwork)
    // {
    //     $municipalwaterwork->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexWaterSpring()
    // {
    //     $waterspring = WaterSpring::index();
    //     return view('superadmin.waterspring.index', compact('waterspring'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateWaterSpring()
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.waterspring.create', compact('city','district','village'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
   
    // public function AdminStoreWaterSpring(Request $request)
    // {

    //     WaterSpring::create([
    //         'integration_code' => $request->integration_code,
    //         'administrator' => $request->administrator,
    //         'sub_sistem' => $request->sub_sistem,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'people' => $request->people,
    //         'debit' => $request->debit,
    //         'spring_name' => $request->spring_name,
    //         'water_intake_system' => $request->water_intake_system,
    //         'pump_type' => $request->pump_type,
    //         'production_year' => $request->production_year,
    //         'operating_state' => $request->operating_state,
    //         'updated_date' => $request->updated_date,
    //     ]);

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.waterspring.index');
    // }

    
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowWaterSpring($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditWaterSpring(WaterSpring $waterspring)
    // {
    //     $city = City::index();
    //     $district = District::index();
    //     $village = Village::index();
    //     return view('superadmin.waterspring.edit', compact('city', 'district', 'village', 'waterspring'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateWaterSpring(Request $request, WaterSpring $waterspring)
    // {
    //     $waterspring = WaterSpring::findOrFail($waterspring->id);

    //     $waterspring->update([
    //         'integration_code' => $request->integration_code,
    //         'administrator' => $request->administrator,
    //         'sub_sistem' => $request->sub_sistem,
    //         'watershed' => $request->watershed,
    //         'province' => "Papua",
    //         'city_id' => $request->city_id,
    //         'district_id' => $request->district_id,
    //         'village_id' => $request->village_id,
    //         'latitude' => $request->latitude,
    //         'longitude' => $request->longitude,
    //         'people' => $request->people,
    //         'debit' => $request->debit,
    //         'spring_name' => $request->spring_name,
    //         'water_intake_system' => $request->water_intake_system,
    //         'pump_type' => $request->pump_type,
    //         'production_year' => $request->production_year,
    //         'operating_state' => $request->operating_state,
    //         'updated_date' => $request->updated_date,
    //     ]);

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.waterspring.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyWaterSpring(WaterSpring $waterspring)
    // {
    //     $waterspring->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexFile()
    // {
    //     $superadminfile = SuperAdminFile::index();
    //     return view('superadmin.file.index', compact('superadminfile'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateFile()
    // {
    //     $city = City::index();
    //     return view('superadmin.file.create', compact('city'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
   
    // public function AdminStoreFile(Request $request)
    // {

    //     $city = new City;
    //     $city->id = $request->get('city_id');
        
    //     $superadminfile = new SuperAdminFile;
    //     $superadminfile->name = $request->name;
    //     $superadminfile->file = $request->file('file')->store('files', 'public');
    //     $superadminfile->year = $request->year;
    //     $superadminfile->show = $request->show;

    //     $superadminfile->city()->associate($city);

    //     $superadminfile->save();

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.file.index');
    // }

    
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowFile($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditFile(SuperAdminFile $superadminfile)
    // {
    //     $city = City::index();
    //     return view('superadmin.file.edit', compact('city', 'superadminfile'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateFile(Request $request, SuperAdminFile $superadminfile)
    // {
    //     $superadminfile = SuperAdminFile::findOrFail($superadminfile->id);

    //     $city = new City;

    //     if($request->file('file') == "") {

    //         $superadminfile->update([
    //             'name'      =>$request->name,
    //             'city_id'   => $request->city_id,
    //             'year'      => $request->year,
    //             'show'      => $request->show,
    //         ]);

    //         $superadminfile->city()->associate($city);

    //     } else {

    //         if ($superadminfile->file&&file_exists(storage_path('app/public/'.$superadminfile->file))) {
    //             \Storage::delete('public/'.$superadminfile->file);
    //         }

    //     $path = $request->file('file');
    //     $path->storeAs('public/', $path->hashName());

    //     $superadminfile->update([
    //         'name'      => $request->name,
    //         'city_id'   => $request->city_id,
    //         'file'      => $path->hashName(),
    //         'year'      => $request->year,
    //         'show'      => $request->show,
    //     ]);
    //     }

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.file.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyFile(SuperAdminFile $superadminfile)
    // {
    //     $superadminfile->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // public function AdminIndexMap()
    // {
    //     $map = Map::index();
    //     return view('superadmin.map.index', compact('map'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminCreateMap()
    // {
    //     $city = City::index();
    //     return view('superadmin.map.create', compact('city'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
   
    // public function AdminStoreMap(Request $request)
    // {

    //     $city = new City;
    //     $city->id = $request->get('city_id');
        
    //     $map = new Map;
    //     $map->name = $request->name;
    //     $map->image = $request->file('image')->store('images', 'public');

    //     $map->city()->associate($city);

    //     $map->save();

    //     Alert::toast('Informasi Berhasil Disimpan', 'success');
    //     return redirect()->route('superadmin.table.map.index');
    // }

    
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminShowMap($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminEditMap(Map $map)
    // {
    //     $city = City::index();
    //     return view('superadmin.map.edit', compact('city', 'map'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminUpdateMap(Request $request, Map $map)
    // {
    //     $map = Map::findOrFail($map->id);

    //     $city = new City;

    //     if($request->file('image') == "") {

    //         $map->update([
    //             'name'=>$request->name,
    //             'city_id' => $request->city_id,
    //         ]);

    //         $map->city()->associate($city);

    //     } else {

    //         if ($map->image&&file_exists(storage_path('app/public/'.$map->image))) {
    //             \Storage::delete('public/'.$map->image);
    //         }

    //     $path = $request->file('image');
    //     $path->storeAs('public/', $path->hashName());

    //     $map->update([
    //         'name'     => $request->name,
    //         'city_id' => $request->city_id,
    //         'image'     => $path->hashName(),
    //     ]);
    //     }

    //     Alert::toast('Informasi Berhasil Diganti', 'success');
    //     return redirect()->route('superadmin.table.map.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function AdminDestroyMap(Map $map)
    // {
    //     $map->delete();

    //     Alert::toast('Data Berhasil Dihapus', 'success');
    //     return redirect()->back();
    // }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */

    //  public function AdminIndexComment()
    //  {
    //     $comment = Comment::index();
    //     return view('superadmin.comment.index', compact('comment'));
    //  }
 
    //  public function AdminDestroyComment(Comment $comment)
    //  {
    //      $comment->delete();
 
    //      Alert::toast('Data Berhasil Dihapus', 'success');
    //      return redirect()->back();
    //  }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
