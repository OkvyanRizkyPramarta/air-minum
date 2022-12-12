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
use App\Models\Map;
use App\Models\SubAdminFile;


class AdminPUController extends Controller
{
    public function AdminPUIndexCity()
    {
        $city = City::index();
        return view('adminpu.city.index', compact('city'));
    }

    public function AdminPUIndexComment()
    {
       $comment = Comment::index();
       return view('adminpu.comment.index', compact('comment'));
    }

    public function AdminPUIndexDistrict()
    {
        $district = District::index();
        return view('adminpu.district.index', compact('district'));
    }

    public function AdminPUIndexMap()
    {
        $map = Map::index();
        return view('adminpu.map.index', compact('map'));
    }

    public function AdminPUIndexMunicipalWaterwork()
    {
        $municipalwaterwork = MunicipalWaterwork::index();
        return view('adminpu.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUIndexPopulation()
    {
        $population = Population::index();
        return view('adminpu.population.index', compact('population'));
    }

    public function AdminPUIndexRiverIntake()
    {
        $riverintake = RiverIntake::index();
        return view('adminpu.riverintake.index', compact('riverintake'));
    }

    public function AdminPUIndexVillage()
    {
        $village = Village::index();
        return view('adminpu.village.index', compact('village'));
    }

    public function AdminPUIndexWaterSpring()
    {
        $waterspring = WaterSpring::index();
        return view('adminpu.waterspring.index', compact('waterspring'));
    }

    public function AdminPUIndexWatertank()
    {
        $watertank = Watertank::index();
        return view('adminpu.watertank.index', compact('watertank'));
    }

    public function AdminPUIndexWaterwell()
    {
        $waterwell = Waterwell::index();
        return view('adminpu.waterwell.index', compact('waterwell'));
    }

    public function AdminPUIndexChart()
    {
        $district = District::all();
        $population_total = Population::all();
        //$population_total = Population::where('district_id')->get('population_total');
        return view('adminpu.index', compact('district','population_total'));
    }

    public function AdminPUIndexFile()
    {
        $adminpufile = SubAdminFile::index();
        return view('adminpu.file.index', compact('adminpufile'));
    }
}