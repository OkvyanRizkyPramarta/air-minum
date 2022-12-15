<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Comment;
use App\Models\Creation;
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

     public function SuperAdminIndex()
     {
         return view('superadmin.index');
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





    public function SuperAdminAirBersihKabJayapuraWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '2');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.waterresource.index');
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
    public function SuperAdminAirBersihKabJayapuraWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabJayapuraRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '2');

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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.riverintake.index');
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
    public function SuperAdminAirBersihKabJayapuraRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabJayapuraWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '2');

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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.waterwell.index');
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
    public function SuperAdminAirBersihKabJayapuraWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabJayapuraWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '2');

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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.watertank.index');
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
    public function SuperAdminAirBersihKabJayapuraWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabJayapuraWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '2');

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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.waterspring.index');
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
    public function SuperAdminAirBersihKabJayapuraWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabJayapuraMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '2');
            
        $municipalwaterwork = new MunicipalWaterwork;
        $municipalwaterwork->name = $request->name;
        $municipalwaterwork->file = $request->file('file')->store('files', 'public');
        $municipalwaterwork->show = $request->show;
        $municipalwaterwork->data = $request->data;
        $municipalwaterwork->city()->associate($city);
        $municipalwaterwork->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabJayapuraMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabJayapuraDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '2');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.dukcapil.index');
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
    public function SuperAdminAirBersihKabJayapuraDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabJayapuraStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '2');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.statistic.index');
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
    public function SuperAdminAirBersihKabJayapuraStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKabJayapuraDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '2');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.dataproces.index');
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
    public function SuperAdminAirBersihKabJayapuraDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatenjayapura.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabJayapuraCreationIndex()
    {
        $creation = Creation::where('city_id', '2')->get();
        return view('superadmin.kabupatenjayapura.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraCreationStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '2');
            
        $creation = new Creation;
        $creation->name = $request->name;
        $creation->file = $request->file('file')->store('files', 'public');
        $creation->show = $request->show;
        $creation->data = $request->data;
        $creation->city()->associate($city);
        $creation->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.creation.index');
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
    public function SuperAdminAirBersihKabJayapuraCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenjayapura.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraCreationUpdate(Request $request, Creation $creation)
    {
        $creation = Creation::findOrFail($creation->id);

        $city = new City;

        if($request->file('file') == "") {

            $creation->update([
                'name'      =>$request->name,
                'data'      => $request->data,
                'show'      => $request->show,
            ]);

            $creation->city()->associate($city);

        } else {

            if ($creation->file&&file_exists(storage_path('app/public/'.$creation->file))) {
                \Storage::delete('public/'.$creation->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $creation->update([
            'name'          => $request->name,
            'file'          => $path->hashName(),
            'data'          => $request->data,
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenjayapura.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabJayapuraCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }







    public function SuperAdminAirBersihKabBiakNumforWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '1');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.waterresource.index');
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
    public function SuperAdminAirBersihKabBiakNumforWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabBiakNumforRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '1');

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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.riverintake.index');
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
    public function SuperAdminAirBersihKabBiakNumforRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabBiakNumforWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '1');

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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.waterwell.index');
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
    public function SuperAdminAirBersihKabBiakNumforWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabBiakNumforWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '1');

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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.watertank.index');
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
    public function SuperAdminAirBersihKabBiakNumforWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabBiakNumforWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '1');

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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.waterspring.index');
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
    public function SuperAdminAirBersihKabBiakNumforWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabBiakNumforMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '1');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabBiakNumforMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenbiaknumfor.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabBiakNumforDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '1');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.index');
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
    public function SuperAdminAirBersihKabBiakNumforDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabBiakNumforStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '1');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.statistic.index');
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
    public function SuperAdminAirBersihKabBiakNumforStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKabBiakNumforDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '1')->get();
        return view('superadmin.kabupatenbiaknumfor.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '1');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.dataproces.index');
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
    public function SuperAdminAirBersihKabBiakNumforDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatenbiaknumfor.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatenbiaknumfor.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabBiakNumforDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }






    public function SuperAdminAirBersihKabKeeromWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '3');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.waterresource.index');
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
    public function SuperAdminAirBersihKabKeeromWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKeeromRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '3');

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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.riverintake.index');
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
    public function SuperAdminAirBersihKabKeeromRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKeeromWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '3');

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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.waterwell.index');
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
    public function SuperAdminAirBersihKabKeeromWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKeeromWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '3');

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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.watertank.index');
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
    public function SuperAdminAirBersihKabKeeromWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKeeromWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '3');

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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.waterspring.index');
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
    public function SuperAdminAirBersihKabKeeromWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKeeromMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '3');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabKeeromMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKeeromDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '3');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.dukcapil.index');
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
    public function SuperAdminAirBersihKabKeeromDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabKeeromStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '3');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.statistic.index');
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
    public function SuperAdminAirBersihKabKeeromStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKabKeeromDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '3');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.dataproces.index');
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
    public function SuperAdminAirBersihKabKeeromDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatenkeerom.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKeeromCreationIndex()
    {
        $creation = Creation::where('city_id', '3')->get();
        return view('superadmin.kabupatenkeerom.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromCreationStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '3');
            
        $creation = new Creation;
        $creation->name = $request->name;
        $creation->file = $request->file('file')->store('files', 'public');
        $creation->show = $request->show;
        $creation->data = $request->data;
        $creation->city()->associate($city);
        $creation->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.creation.index');
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
    public function SuperAdminAirBersihKabKeeromCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkeerom.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromCreationUpdate(Request $request, Creation $creation)
    {
        $creation = Creation::findOrFail($creation->id);

        $city = new City;

        if($request->file('file') == "") {

            $creation->update([
                'name'      =>$request->name,
                'data'      => $request->data,
                'show'      => $request->show,
            ]);

            $creation->city()->associate($city);

        } else {

            if ($creation->file&&file_exists(storage_path('app/public/'.$creation->file))) {
                \Storage::delete('public/'.$creation->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $creation->update([
            'name'          => $request->name,
            'file'          => $path->hashName(),
            'data'          => $request->data,
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkeerom.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKeeromCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }










    public function SuperAdminAirBersihKabSarmiWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '6');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensarmi.waterresource.index');
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
    public function SuperAdminAirBersihKabSarmiWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSarmiRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '6');

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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.riverintake.index');
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
    public function SuperAdminAirBersihKabSarmiRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSarmiWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '6');

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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.waterwell.index');
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
    public function SuperAdminAirBersihKabSarmiWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSarmiWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '6');

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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.watertank.index');
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
    public function SuperAdminAirBersihKabSarmiWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSarmiWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '6');

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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.waterspring.index');
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
    public function SuperAdminAirBersihKabSarmiWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSarmiMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '6');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensarmi.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabSarmiMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSarmiDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '6');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensarmi.dukcapil.index');
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
    public function SuperAdminAirBersihKabSarmiDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabSarmiStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '6');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensarmi.statistic.index');
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
    public function SuperAdminAirBersihKabSarmiStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKabSarmiDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '6');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensarmi.dataproces.index');
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
    public function SuperAdminAirBersihKabSarmiDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatensarmi.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatensarmi.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSarmiCreationIndex()
    {
        $creation = Creation::where('city_id', '6')->get();
        return view('superadmin.kabupatensarmi.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiCreationStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '6');
            
        $creation = new Creation;
        $creation->name = $request->name;
        $creation->file = $request->file('file')->store('files', 'public');
        $creation->show = $request->show;
        $creation->data = $request->data;
        $creation->city()->associate($city);
        $creation->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensarmi.creation.index');
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
    public function SuperAdminAirBersihKabSarmiCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensarmi.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiCreationUpdate(Request $request, Creation $creation)
    {
        $creation = Creation::findOrFail($creation->id);

        $city = new City;

        if($request->file('file') == "") {

            $creation->update([
                'name'      =>$request->name,
                'data'      => $request->data,
                'show'      => $request->show,
            ]);

            $creation->city()->associate($city);

        } else {

            if ($creation->file&&file_exists(storage_path('app/public/'.$creation->file))) {
                \Storage::delete('public/'.$creation->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $creation->update([
            'name'          => $request->name,
            'file'          => $path->hashName(),
            'data'          => $request->data,
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensarmi.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSarmiCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }





    public function SuperAdminAirBersihKabSupioriWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '7');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensupiori.waterresource.index');
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
    public function SuperAdminAirBersihKabSupioriWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSupioriRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '7');

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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.riverintake.index');
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
    public function SuperAdminAirBersihKabSupioriRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSupioriWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '7');

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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.waterwell.index');
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
    public function SuperAdminAirBersihKabSupioriWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSupioriWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '7');

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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.watertank.index');
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
    public function SuperAdminAirBersihKabSupioriWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSupioriWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '7');

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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.waterspring.index');
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
    public function SuperAdminAirBersihKabSupioriWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSupioriMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '7');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensupiori.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabSupioriMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSupioriDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '7');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensupiori.dukcapil.index');
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
    public function SuperAdminAirBersihKabSupioriDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabSupioriStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '7');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensupiori.statistic.index');
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
    public function SuperAdminAirBersihKabSupioriStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKabSupioriDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '7');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensupiori.dataproces.index');
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
    public function SuperAdminAirBersihKabSupioriDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatensupiori.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatensupiori.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabSupioriCreationIndex()
    {
        $creation = Creation::where('city_id', '7')->get();
        return view('superadmin.kabupatensupiori.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriCreationStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '7');
            
        $creation = new Creation;
        $creation->name = $request->name;
        $creation->file = $request->file('file')->store('files', 'public');
        $creation->show = $request->show;
        $creation->data = $request->data;
        $creation->city()->associate($city);
        $creation->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensupiori.creation.index');
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
    public function SuperAdminAirBersihKabSupioriCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatensupiori.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriCreationUpdate(Request $request, Creation $creation)
    {
        $creation = Creation::findOrFail($creation->id);

        $city = new City;

        if($request->file('file') == "") {

            $creation->update([
                'name'      =>$request->name,
                'data'      => $request->data,
                'show'      => $request->show,
            ]);

            $creation->city()->associate($city);

        } else {

            if ($creation->file&&file_exists(storage_path('app/public/'.$creation->file))) {
                \Storage::delete('public/'.$creation->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $creation->update([
            'name'          => $request->name,
            'file'          => $path->hashName(),
            'data'          => $request->data,
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.airbersih.kabupatensupiori.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabSupioriCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }









    public function SuperAdminAirBersihKabKepulauanYapenWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '4');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '4');

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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '4');

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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '4');

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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.watertank.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '4');

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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '4');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '4');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabKepulauanYapenStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '4');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.statistic.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '4');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatenkepulauanyapen.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabKepulauanYapenCreationIndex()
    {
        $creation = Creation::where('city_id', '4')->get();
        return view('superadmin.kabupatenkepulauanyapen.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenCreationStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '4');
            
        $creation = new Creation;
        $creation->name = $request->name;
        $creation->file = $request->file('file')->store('files', 'public');
        $creation->show = $request->show;
        $creation->data = $request->data;
        $creation->city()->associate($city);
        $creation->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.creation.index');
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
    public function SuperAdminAirBersihKabKepulauanYapenCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenkepulauanyapen.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenCreationUpdate(Request $request, Creation $creation)
    {
        $creation = Creation::findOrFail($creation->id);

        $city = new City;

        if($request->file('file') == "") {

            $creation->update([
                'name'      =>$request->name,
                'data'      => $request->data,
                'show'      => $request->show,
            ]);

            $creation->city()->associate($city);

        } else {

            if ($creation->file&&file_exists(storage_path('app/public/'.$creation->file))) {
                \Storage::delete('public/'.$creation->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $creation->update([
            'name'          => $request->name,
            'file'          => $path->hashName(),
            'data'          => $request->data,
            'show'          => $request->show,
        ]);
        }
       
        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenkepulauanyapen.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabKepulauanYapenCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }








    public function SuperAdminAirBersihKabWaropenWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '8');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.waterresource.index');
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
    public function SuperAdminAirBersihKabWaropenWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabWaropenRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '8');

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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.riverintake.index');
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
    public function SuperAdminAirBersihKabWaropenRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabWaropenWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '8');

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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.waterwell.index');
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
    public function SuperAdminAirBersihKabWaropenWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabWaropenWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '8');

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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.watertank.index');
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
    public function SuperAdminAirBersihKabWaropenWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabWaropenWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '8');

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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.waterspring.index');
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
    public function SuperAdminAirBersihKabWaropenWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabWaropenMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '8');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabWaropenMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenwaropen.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabWaropenDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '8');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.dukcapil.index');
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
    public function SuperAdminAirBersihKabWaropenDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabWaropenStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '8');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.statistic.index');
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
    public function SuperAdminAirBersihKabWaropenStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKabWaropenDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '8')->get();
        return view('superadmin.kabupatenwaropen.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '8');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.dataproces.index');
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
    public function SuperAdminAirBersihKabWaropenDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatenwaropen.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatenwaropen.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabWaropenDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }





    public function SuperAdminAirBersihKabMamberamoRayaWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterResourceCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterResourceStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '5');
            
        $waterresource = new WaterResource;
        $waterresource->name = $request->name;
        $waterresource->file = $request->file('file')->store('files', 'public');
        $waterresource->show = $request->show;
        $waterresource->city()->associate($city);
        $waterresource->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.waterresource.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabMamberamoRayaRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaRiverintakeStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '5');

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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.riverintake.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabMamberamoRayaWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterwellStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '5');

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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.waterwell.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabMamberamoRayaWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWatertankStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '5');

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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.watertank.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabMamberamoRayaWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterspringStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '5');

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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.waterspring.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '5');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('superadmin.kabupatenmamberamoraya.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SuperAdminAirBersihKabMamberamoRayaDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDukcapilCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDukcapilStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '5');
            
        $dukcapil = new Dukcapil;
        $dukcapil->name = $request->name;
        $dukcapil->file = $request->file('file')->store('files', 'public');
        $dukcapil->show = $request->show;
        $dukcapil->city()->associate($city);
        $dukcapil->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SuperAdminAirBersihKabMamberamoRayaStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaStatisticCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaStatisticStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '5');
            
        $statistic = new Statistic;
        $statistic->name = $request->name;
        $statistic->file = $request->file('file')->store('files', 'public');
        $statistic->show = $request->show;
        $statistic->city()->associate($city);
        $statistic->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.statistic.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SuperAdminAirBersihKabMamberamoRayaDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '5')->get();
        return view('superadmin.kabupatenmamberamoraya.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDataProcesCreate()
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDataProcesStore(Request $request)
    {
        $city = new City;
        $city->id = $request->get('city_id', '5');
            
        $dataproces = new DataProces;
        $dataproces->name = $request->name;
        $dataproces->file = $request->file('file')->store('files', 'public');
        $dataproces->show = $request->show;
        $dataproces->city()->associate($city);
        $dataproces->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.dataproces.index');
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
    public function SuperAdminAirBersihKabMamberamoRayaDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('superadmin.kabupatenmamberamoraya.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('superadmin.airbersih.kabupatenmamberamoraya.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SuperAdminAirBersihKabMamberamoRayaDataProcesDestroy(DataProces $dataproces)
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
    //      Alert::toast('Data Berhasil Dihapus', 'success');
    //      return redirect()->back();
    //  }

    public function AdminIndexChart()
    {
        // $district = District::all();
        $population_total = Population::all();
        //$population_total = Population::where('district_id')->get('population_total');
        return view('superadmin.index', compact(/*'district',*/'population_total'));
    }

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
