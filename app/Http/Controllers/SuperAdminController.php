<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Village;
use App\Models\RiverIntake;
use App\Models\Watertank;
use App\Models\Population;

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
            'oap'     => $request->oap,
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminIndexDistrict()
    {
        $district = District::index();
        return view('superadmin.district.index', compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreateDistrict()
    {
        return view('superadmin.district.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStoreDistrict(Request $request)
    {
        District::store($request);
        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.table.district.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminShowDistrict($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditDistrict(District $district)
    {
        return view('superadmin.district.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateDistrict(Request $request, District $district)
    {
        $district = District::findOrFail($district->id);

        $district->update([
            'name'     => $request->name,
            'postal_code'=>$request->postal_code,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyDistrict(District $district)
    {
        $district->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function AdminIndexPopulation()
    {
        $population = Population::index();
        return view('superadmin.population.index', compact('population'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreatePopulation()
    {
        $city = City::index();
        return view('superadmin.population.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStorePopulation(Request $request)
    {
        // $validator = Validator::make($request->all(), [

        // ]);

        // if ($validator->fails()) {
        //     Alert::toast($validator->messages()->all()[0], 'error');
        //     return redirect()->back()->withInput();
        // }

        Population::store($request);
        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.table.population.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminShowPopulation($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditPopulation(Population $population)
    {
        $city = City::index();
        return view('superadmin.population.edit', compact('city', 'population'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdatePopulation(Request $request, Population $population)
    {
        $population = Population::findOrFail($population->id);

        $population->update([
            'city_id'     => $request->city_id,
            'male_total'=>$request->male_total,
            'female_total'=>$request->female_total,
            'population_total'=>$request->population_total,
            'year'    => $request->year,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.population.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyPopulation(Population $population)
    {
        $population->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function AdminIndexRiverIntake()
    {
        $riverintake = RiverIntake::index();
        return view('superadmin.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreateRiverIntake()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.riverintake.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStoreRiverIntake(Request $request)
    {

        RiverIntake::create([
            'id_river_intake' => $request->id_river_intake,
            'bmm_code' => $request->bmm_code,
            'name' => $request->name,
            'unit' => $request->unit,
            'region_river' => $request->region_river,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.table.riverintake.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminShowRiverIntake($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditRiverIntake(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.riverintake.edit', compact('city', 'district', 'village', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateRiverIntake(Request $request, RiverIntake $riverintake)
    {
        $riverintake = RiverIntake::findOrFail($riverintake->id);

        $riverintake->update([
            'id_river_intake' => $request->id_river_intake,
            'bmm_code' => $request->bmm_code,
            'name' => $request->name,
            'unit' => $request->unit,
            'region_river' => $request->region_river,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyRiverIntake(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function AdminIndexWatertank()
    {
        $watertank = Watertank::index();
        return view('superadmin.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreateWatertank()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.watertank.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStoreWatertank(Request $request)
    {

        Watertank::create([
            'id_watertank' => $request->id_watertank,
            'bmm_code' => $request->bmm_code,
            'name' => $request->name,
            'unit' => $request->unit,
            'region_river' => $request->region_river,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.table.watertank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminShowWatertank($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditWatertank(Watertank $watertank)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.watertank.edit', compact('city', 'district', 'village', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateWatertank(Request $request, Watertank $watertank)
    {
        $watertank = Watertank::findOrFail($watertank->id);

        $watertank->update([
            'id_watertank' => $request->id_watertank,
            'bmm_code' => $request->bmm_code,
            'name' => $request->name,
            'unit' => $request->unit,
            'region_river' => $request->region_river,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyWatertank(Watertank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
