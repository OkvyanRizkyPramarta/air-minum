<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\MunicipalWaterwork;
use App\Models\District;
use App\Models\Village;
use App\Models\RiverIntake;
use App\Models\Watertank;
use App\Models\Waterwell;
use App\Models\WaterSpring;
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
        $district = District::index();
        return view('superadmin.population.create', compact('city', 'district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStorePopulation(Request $request)
    {
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
        $district = District::index();
        return view('superadmin.population.edit', compact('city', 'population', 'district'));
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
        'city_id' => $request->city_id,
        'district_id' => $request->district_id,
        'male_total' => $request->male_total,
        'female_total' => $request->female_total,
        'population_total' => $request->population_total,
        'maleoap_total' => $request->maleoap_total,
        'femaleoap_total' => $request->femaleoap_total,
        'populationoap_total' => $request->populationoap_total,
        'malenonoap_total' => $request->malenonoap_total,
        'femalenonoap_total' => $request->femalenonoap_total,
        'populationnonoap_total' => $request->populationnonoap_total,
        'year' => $request->year,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.population.index');
    }

    /**
     * Remove the specified resource from stpopuorage.
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
            'bmm_code' => $request->bmm_code,
            'name' => $request->name,
            'intake_type' => $request->intake_type,
            'unit' => $request->unit,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'people' => $request->people,
            'debit' => $request->debit, 
            'pump_type' => $request->pump_type, 
            'head_pompa' => $request->head_pompa, 
            'production_year' => $request->production_year, 
            'operating_state' => $request->operating_state, 
            'updated_date' => $request->updated_date, 
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
            'bmm_code' => $request->bmm_code,
            'name' => $request->name,
            'intake_type' => $request->intake_type,
            'unit' => $request->unit,
            'region_river' => $request->region_river,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'people' => $request->people,
            'debit' => $request->debit, 
            'pump_type' => $request->pump_type, 
            'head_pompa' => $request->head_pompa, 
            'production_year' => $request->production_year, 
            'operating_state' => $request->operating_state, 
            'updated_date' => $request->updated_date, 
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

    public function AdminIndexWaterwell()
    {
        $waterwell = Waterwell::index();
        return view('superadmin.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreateWaterwell()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.waterwell.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function AdminStoreWaterwell(Request $request)
    {

        Waterwell::create([
            'bmm_code' => $request->bmm_code,
            'unit' => $request->unit,
            'name' => $request->name,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'well_function' => $request->well_function,
            'operating_state' => $request->operating_state,
            'debit' => $request->debit,
            'people' => $request->people,
            'luas' => $request->luas,
            'well_depth' => $request->well_depth,
            'pump_type' => $request->pump_type,
            'development_year' => $request->development_year,
            'well_condition' => $request->well_condition,
            'updated_date' => $request->update_date,
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
    public function AdminShowWaterwell($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditWaterwell(Waterwell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.waterwell.edit', compact('city', 'district', 'village', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateWaterwell(Request $request, Waterwell $waterwell)
    {
        $waterwell = Waterwell::findOrFail($waterwell->id);

        $waterwell->update([
            'bmm_code' => $request->bmm_code,
            'unit' => $request->unit,
            'name' => $request->name,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'well_function' => $request->well_function,
            'operating_state' => $request->operating_state,
            'debit' => $request->debit,
            'people' => $request->people,
            'luas' => $request->luas,
            'well_depth' => $request->well_depth,
            'pump_type' => $request->pump_type,
            'development_year' => $request->development_year,
            'well_condition' => $request->well_condition,
            'updated_date' => $request->update_date,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyWaterwell(Waterwell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function AdminIndexMunicipalWaterwork()
    {
        $municipalwaterwork = MunicipalWaterwork::index();
        return view('superadmin.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreateMunicipalWaterwork()
    {
        return view('superadmin.municipalwaterwork.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AdminStoreMunicipalWaterwork(Request $request)
    {
        MunicipalWaterwork::store($request);

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.table.municipalwaterwork.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminShowMunicipalWaterwork($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditMunicipalWaterwork(MunicipalWaterwork $municipalwaterwork)
    {
        return view('superadmin.municipalwaterwork.edit', compact('municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateMunicipalWaterwork(Request $request, MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork = MunicipalWaterwork::findOrFail($municipalwaterwork->id);

        $municipalwaterwork->update([
            'name' => $request->name,
            'area' => $request->area,
            'koord_x' => $request->koord_x,
            'koord_y' => $request->koord_y,
            'elevasi_mdpl' => $request->elevasi_mdpl,
            'installed' => $request->installed,
            'operation' => $request->operation,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyMunicipalWaterwork(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function AdminIndexWaterSpring()
    {
        $waterspring = WaterSpring::index();
        return view('superadmin.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminCreateWaterSpring()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.waterspring.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function AdminStoreWaterSpring(Request $request)
    {

        WaterSpring::create([
            'integration_code' => $request->integration_code,
            'administrator' => $request->administrator,
            'sub_sistem' => $request->sub_sistem,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'people' => $request->people,
            'debit' => $request->debit,
            'spring_name' => $request->spring_name,
            'water_intake_system' => $request->water_intake_system,
            'pump_type' => $request->pump_type,
            'production_year' => $request->production_year,
            'operating_state' => $request->operating_state,
            'updated_date' => $request->updated_date,
        ]);

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('superadmin.table.waterspring.index');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminShowWaterSpring($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminEditWaterSpring(WaterSpring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('superadmin.waterspring.edit', compact('city', 'district', 'village', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdateWaterSpring(Request $request, WaterSpring $waterspring)
    {
        $waterspring = WaterSpring::findOrFail($waterspring->id);

        $waterspring->update([
            'integration_code' => $request->integration_code,
            'administrator' => $request->administrator,
            'sub_sistem' => $request->sub_sistem,
            'watershed' => $request->watershed,
            'province' => "Papua",
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'people' => $request->people,
            'debit' => $request->debit,
            'spring_name' => $request->spring_name,
            'water_intake_system' => $request->water_intake_system,
            'pump_type' => $request->pump_type,
            'production_year' => $request->production_year,
            'operating_state' => $request->operating_state,
            'updated_date' => $request->updated_date,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('superadmin.table.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminDestroyWaterSpring(WaterSpring $waterspring)
    {
        $waterspring->delete();

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
