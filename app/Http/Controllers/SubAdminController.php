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
use App\Models\File;
use App\Models\Map;

class SubAdminController extends Controller
{
    public function SubAdminIndexCity()
    {
        $city = City::index();
        return view('subadmin.city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateCity()
    {
        return view('subadmin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminStoreCity(Request $request)
    {
        City::store($request);
        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.table.city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowCity($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditCity(City $city)
    {
        return view('subadmin.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateCity(Request $request, City $city)
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
        return redirect()->route('subadmin.table.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyCity(City $city)
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
    public function SubAdminIndexDistrict()
    {
        $district = District::index();
        return view('subadmin.district.index', compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateDistrict()
    {
        return view('subadmin.district.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminStoreDistrict(Request $request)
    {
        District::store($request);
        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.table.district.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowDistrict($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditDistrict(District $district)
    {
        return view('subadmin.district.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateDistrict(Request $request, District $district)
    {
        $district = District::findOrFail($district->id);

        $district->update([
            'name'     => $request->name,
            'postal_code'=>$request->postal_code,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.table.district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyDistrict(District $district)
    {
        $district->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexVillage()
    {
        $village = Village::index();
        return view('subadmin.village.index', compact('village'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateVillage()
    {
        return view('subadmin.village.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminStoreVillage(Request $request)
    {
        Village::store($request);
        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.table.village.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowVillage($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditVillage(Village $village)
    {
        return view('subadmin.village.edit', compact('village'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateVillage(Request $request, Village $village)
    {
        $village = Village::findOrFail($village->id);

        $village->update([
            'name'     => $request->name,
        ]);

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.table.village.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyVillage(Village $village)
    {
        $village->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexPopulation()
    {
        $population = Population::index();
        return view('subadmin.population.index', compact('population'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreatePopulation()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.population.create', compact('city', 'district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminStorePopulation(Request $request)
    {
        Population::store($request);
        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.table.population.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowPopulation($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditPopulation(Population $population)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.population.edit', compact('city', 'population', 'district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdatePopulation(Request $request, Population $population)
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
        return redirect()->route('subadmin.table.population.index');
    }

    /**
     * Remove the specified resource from stpopuorage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyPopulation(Population $population)
    {
        $population->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexRiverIntake()
    {
        $riverintake = RiverIntake::index();
        return view('subadmin.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateRiverIntake()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.riverintake.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminStoreRiverIntake(Request $request)
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
        return redirect()->route('subadmin.table.riverintake.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowRiverIntake($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditRiverIntake(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.riverintake.edit', compact('city', 'district', 'village', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateRiverIntake(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.table.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyRiverIntake(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexWatertank()
    {
        $watertank = Watertank::index();
        return view('subadmin.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateWatertank()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.watertank.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminStoreWatertank(Request $request)
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
        return redirect()->route('subadmin.table.watertank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowWatertank($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditWatertank(Watertank $watertank)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.watertank.edit', compact('city', 'district', 'village', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateWatertank(Request $request, Watertank $watertank)
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
        return redirect()->route('subadmin.table.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyWatertank(Watertank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexWaterwell()
    {
        $waterwell = Waterwell::index();
        return view('subadmin.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateWaterwell()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.waterwell.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function SubAdminStoreWaterwell(Request $request)
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
        return redirect()->route('subadmin.table.waterwell.index');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowWaterwell($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditWaterwell(Waterwell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.waterwell.edit', compact('city', 'district', 'village', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateWaterwell(Request $request, Waterwell $waterwell)
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
        return redirect()->route('subadmin.table.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyWaterwell(Waterwell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexMunicipalWaterwork()
    {
        $municipalwaterwork = MunicipalWaterwork::index();
        return view('subadmin.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateMunicipalWaterwork()
    {
        return view('subadmin.municipalwaterwork.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminStoreMunicipalWaterwork(Request $request)
    {
        MunicipalWaterwork::store($request);

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.table.municipalwaterwork.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowMunicipalWaterwork($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditMunicipalWaterwork(MunicipalWaterwork $municipalwaterwork)
    {
        return view('subadmin.municipalwaterwork.edit', compact('municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateMunicipalWaterwork(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.table.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyMunicipalWaterwork(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexWaterSpring()
    {
        $waterspring = WaterSpring::index();
        return view('subadmin.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateWaterSpring()
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.waterspring.create', compact('city','district','village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function SubAdminStoreWaterSpring(Request $request)
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
        return redirect()->route('subadmin.table.waterspring.index');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowWaterSpring($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditWaterSpring(WaterSpring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        $village = Village::index();
        return view('subadmin.waterspring.edit', compact('city', 'district', 'village', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateWaterSpring(Request $request, WaterSpring $waterspring)
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
        return redirect()->route('subadmin.table.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyWaterSpring(WaterSpring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexFile()
    {
        $file = File::index();
        return view('subadmin.file.index', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateFile()
    {
        $city = City::index();
        return view('subadmin.file.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function SubAdminStoreFile(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id');
        
        $file = new File;
        $file->name = $request->name;
        $file->file = $request->file('file')->store('files', 'public');
        $file->year = $request->year;
        $file->show = $request->show;

        $file->city()->associate($city);

        $file->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.table.file.index');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowFile($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditFile(File $file)
    {
        $city = City::index();
        return view('subadmin.file.edit', compact('city', 'file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateFile(Request $request, File $file)
    {
        $file = File::findOrFail($file->id);

        $city = new City;

        if($request->file('file') == "") {

            $file->update([
                'name'=>$request->name,
                'city_id' => $request->city_id,
                'year'     => $request->year,
                'show'     => $request->show,
            ]);

            $file->city()->associate($city);

        } else {

            if ($file->file&&file_exists(storage_path('app/public/'.$file->file))) {
                \Storage::delete('public/'.$file->file);
            }

        $path = $request->file('file');
        $path->storeAs('public/', $path->hashName());

        $file->update([
            'name'     => $request->name,
            'city_id' => $request->city_id,
            'file'     => $path->hashName(),
            'year'     => $request->year,
            'show'     => $request->show,
        ]);
        }


        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.table.file.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyFile(File $file)
    {
        $file->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminIndexMap()
    {
        $map = Map::index();
        return view('subadmin.map.index', compact('map'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminCreateMap()
    {
        $city = City::index();
        return view('subadmin.map.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function SubAdminStoreMap(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id');
        
        $map = new Map;
        $map->name = $request->name;
        $map->image = $request->file('image')->store('images', 'public');

        $map->city()->associate($city);

        $map->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.table.map.index');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminShowMap($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminEditMap(Map $map)
    {
        $city = City::index();
        return view('subadmin.map.edit', compact('city', 'map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminUpdateMap(Request $request, Map $map)
    {
        $map = Map::findOrFail($map->id);

        $city = new City;

        if($request->file('image') == "") {

            $map->update([
                'name'=>$request->name,
                'city_id' => $request->city_id,
            ]);

            $map->city()->associate($city);

        } else {

            if ($map->image&&file_exists(storage_path('app/public/'.$map->image))) {
                \Storage::delete('public/'.$map->image);
            }

        $path = $request->file('image');
        $path->storeAs('public/', $path->hashName());

        $map->update([
            'name'     => $request->name,
            'city_id' => $request->city_id,
            'image'     => $path->hashName(),
        ]);
        }

        Alert::toast('Informasi Berhasil Diganti', 'success');
        return redirect()->route('subadmin.table.map.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminDestroyMap(Map $map)
    {
        $map->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function SubAdminIndexComment()
     {
        $comment = Comment::index();
        return view('subadmin.comment.index', compact('comment'));
     }
 
     public function SubAdminDestroyComment(Comment $comment)
     {
         $comment->delete();
 
         Alert::toast('Data Berhasil Dihapus', 'success');
         return redirect()->back();
     }

    public function SubAdminIndexChart()
    {
        $district = District::all();
        $population_total = Population::all();
        //$population_total = Population::where('district_id')->get('population_total');
        return view('subadmin.index', compact('district','population_total'));
    }
}
