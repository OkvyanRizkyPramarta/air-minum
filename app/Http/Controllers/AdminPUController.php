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
use App\Models\WaterResource;
use App\Models\Waterwell;
use App\Models\WaterSpring;
use App\Models\Population;
use App\Models\SubAdminFile;
use App\Models\Map;
use App\Models\Dukcapil;
use App\Models\Statistic;
use App\Models\DataProces;


class AdminPUController extends Controller
{


    public function AdminPUAirBersihKotaJayapuraWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.waterresource.index', compact('waterresource'));
    }

    public function AdminPUAirBersihKotaJayapuraRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKotaJayapuraWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKotaJayapuraWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKotaJayapuraWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.waterspring.index', compact('waterspring'));
    }

    public function AdminPUAirBersihKotaJayapuraMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKotaJayapuraDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKotaJayapuraStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.statistic.index', compact('statistic'));
    }

    
    public function AdminPUAirBersihKotaJayapuraDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '9')->get();
        return view('adminpu.kotajayapura.dataproces.index', compact('dataproces'));
    }

    public function AdminPUAirBersihKabJayapuraWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.waterresource.index', compact('waterresource'));
    }


    public function AdminPUAirBersihKabJayapuraRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKabJayapuraWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabJayapuraWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKabJayapuraWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.waterspring.index', compact('waterspring'));
    }

    public function AdminPUAirBersihKabJayapuraMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKabJayapuraDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKabJayapuraStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.statistic.index', compact('statistic'));
    }

    public function AdminPUAirBersihKabJayapuraDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '2')->get();
        return view('adminpu.kabupatenjayapura.dataproces.index', compact('dataproces'));
    }

    public function AdminPUAirBersihKabBiakNumforWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.waterresource.index', compact('waterresource'));
    }

    public function AdminPUAirBersihKabBiakNumforRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.riverintake.index', compact('riverintake'));
    }


    public function AdminPUAirBersihKabBiakNumforWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabBiakNumforWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKabBiakNumforWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.waterspring.index', compact('waterspring'));
    }

    public function AdminPUAirBersihKabBiakNumforMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKabBiakNumforDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKabBiakNumforStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.statistic.index', compact('statistic'));
    }

    public function AdminPUAirBersihKabBiakNumforDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '1')->get();
        return view('adminpu.kabupatenbiaknumfor.dataproces.index', compact('dataproces'));
    }

    public function AdminPUAirBersihKabKeeromWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.waterresource.index', compact('waterresource'));
    }

    public function AdminPUAirBersihKabKeeromRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKabKeeromWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabKeeromWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKabKeeromWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.waterspring.index', compact('waterspring'));
    }


    public function AdminPUAirBersihKabKeeromMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKabKeeromDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKabKeeromStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.statistic.index', compact('statistic'));
    }

    public function AdminPUAirBersihKabKeeromDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '3')->get();
        return view('adminpu.kabupatenkeerom.dataproces.index', compact('dataproces'));
    }

    public function AdminPUAirBersihKabSarmiWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.waterresource.index', compact('waterresource'));
    }

    public function AdminPUAirBersihKabSarmiRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKabSarmiWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabSarmiWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKabSarmiWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.waterspring.index', compact('waterspring'));
    }

    public function AdminPUAirBersihKabSarmiMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKabSarmiDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKabSarmiStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.statistic.index', compact('statistic'));
    }

    public function AdminPUAirBersihKabSarmiDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '6')->get();
        return view('adminpu.kabupatensarmi.dataproces.index', compact('dataproces'));
    }

    public function AdminPUAirBersihKabSupioriWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.waterresource.index', compact('waterresource'));
    }

    public function AdminPUAirBersihKabSupioriRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKabSupioriWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabSupioriWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.watertank.index', compact('watertank'));
    }


    public function AdminPUAirBersihKabSupioriWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.waterspring.index', compact('waterspring'));
    }

    public function AdminPUAirBersihKabSupioriMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKabSupioriDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKabSupioriStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.statistic.index', compact('statistic'));
    }

    public function AdminPUAirBersihKabSupioriDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '7')->get();
        return view('adminpu.kabupatensupiori.dataproces.index', compact('dataproces'));
    }

    public function AdminPUAirBersihKabKepulauanYapenWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.waterresource.index', compact('waterresource'));
    }

    public function AdminPUAirBersihKabKepulauanYapenRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKabKepulauanYapenWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabKepulauanYapenWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKabKepulauanYapenWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.waterspring.index', compact('waterspring'));
    }

    public function AdminPUAirBersihKabKepulauanYapenMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKabKepulauanYapenDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKabKepulauanYapenStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.statistic.index', compact('statistic'));
    }

    public function AdminPUAirBersihKabKepulauanYapenDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '4')->get();
        return view('adminpu.kabupatenkepulauanyapen.dataproces.index', compact('dataproces'));
    }


    public function AdminPUAirBersihKabWaropenWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.waterresource.index', compact('waterresource'));
    }

    public function AdminPUAirBersihKabWaropenRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKabWaropenWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabWaropenWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKabWaropenWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.waterspring.index', compact('waterspring'));
    }

    public function AdminPUAirBersihKabWaropenMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function AdminPUAirBersihKabWaropenDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.dukcapil.index', compact('dukcapil'));
    }

    public function AdminPUAirBersihKabWaropenStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.statistic.index', compact('statistic'));
    }

    
    public function AdminPUAirBersihKabWaropenDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '8')->get();
        return view('adminpu.kabupatenwaropen.dataproces.index', compact('dataproces'));
    }

    public function AdminPUAirBersihKabMamberamoRayaWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.waterresource.index', compact('waterresource'));
    }
    
    public function AdminPUAirBersihKabMamberamoRayaRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.riverintake.index', compact('riverintake'));
    }

    public function AdminPUAirBersihKabMamberamoRayaWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.waterwell.index', compact('waterwell'));
    }

    public function AdminPUAirBersihKabMamberamoRayaWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.watertank.index', compact('watertank'));
    }

    public function AdminPUAirBersihKabMamberamoRayaWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.waterspring.index', compact('waterspring'));
    }
    
    public function AdminPUAirBersihKabMamberamoRayaMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.municipalwaterwork.index', compact('municipalwaterwork'));
    }
    
    public function AdminPUAirBersihKabMamberamoRayaDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.dukcapil.index', compact('dukcapil'));
    }
    
    public function AdminPUAirBersihKabMamberamoRayaStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.statistic.index', compact('statistic'));
    }
    
    public function AdminPUAirBersihKabMamberamoRayaDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '5')->get();
        return view('adminpu.kabupatenmamberamoraya.dataproces.index', compact('dataproces'));
    }
}