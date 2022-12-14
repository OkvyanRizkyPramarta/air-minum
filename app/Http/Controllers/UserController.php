<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Creation;
use App\Models\DataManagement;
use App\Models\Population; 
use App\Models\MunicipalWaterwork; 
use App\Models\WaterResource; 
use App\Models\RiverIntake;
use App\Models\DataProces;
use App\Models\Dukcapil;
use App\Models\Statistic;

class UserController extends Controller
{
    public function UserIndex(Request $request)
    {
        $jayapuraWaterResource = WaterResource::where(["city_id" => 9, "show" => "Yes"])->get();
        $statisticJayapura = Statistic::where(["city_id" => 9, "show" => "Yes"])->get();
        $kotaJayapuraPDAM = MunicipalWaterwork::where(["city_id" => 9, "show" => "Yes"])->get();
        $dukcapil = Dukcapil::where(["city_id" => 9, "show" => "Yes"])->get();
        $dataproces = DataProces::where(["city_id" => 9, "show" => "Yes"])->get();
        $bws = RiverIntake::where(["city_id" => 9, "show" => "Yes"])->get();
        
        return view('user.index', compact("jayapuraWaterResource", "statisticJayapura", "kotaJayapuraPDAM", "dukcapil", "dataproces", "bws"));
    }

    public function UserStoreComment(Request $request)
    {
        Comment::store($request);
        Alert::toast('Kritik Dan Saran Berhasil Disimpan', 'success');
        return redirect()->back();
    }



    // Kota Jayapura
    public function CapaianAirBersihWaterResourceKotaJayapura(Request $request)
    {
        $waterresource = WaterResource::where('city_id', '9')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kotajayapura.waterresource.index', compact('waterresource'));
    }

    public function CapaianAirBersihRiverIntakeKotaJayapura(Request $request)
    {
        $riverintake = RiverIntake::where('city_id', '9')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kotajayapura.riverintake.index', compact('riverintake'));
    }

    public function CapaianAirBersihMunicipalWaterworkKotaJayapura(Request $request)
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '9')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kotajayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function CapaianAirBersihDukcapilKotaJayapura(Request $request)
    {
        $dukcapil = Dukcapil::where('city_id', '9')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kotajayapura.dukcapil.index', compact('dukcapil'));
    }

    public function CapaianAirBersihStatisticKotaJayapura(Request $request)
    {
        $statistic = Statistic::where('city_id', '9')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kotajayapura.statistic.index', compact('statistic'));
    }

    public function CapaianAirBersihDataProcesKotaJayapura(Request $request)
    {
        $dataproces = DataProces::where('city_id', '9')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kotajayapura.dataproces.index', compact('dataproces'));
    }





    // Kabupaten Jayapura
    public function CapaianAirBersihCreationKabJayapura(Request $request)
    {
        $creation = Creation::where('city_id', '2')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenjayapura.creation.index', compact('creation'));
    }

    public function CapaianAirBersihMunicipalWaterworkKabJayapura(Request $request)
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '2')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenjayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function CapaianAirBersihDukcapilKabJayapura(Request $request)
    {
        $dukcapil = Dukcapil::where('city_id', '2')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenjayapura.dukcapil.index', compact('dukcapil'));
    }

    public function CapaianAirBersihStatisticKabJayapura(Request $request)
    {
        $statistic = Statistic::where('city_id', '2')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenjayapura.statistic.index', compact('statistic'));
    }
    



    //Kabupaten Keerom
    public function CapaianAirBersihCreationKabKeerom(Request $request)
    {
        $creation = Creation::where('city_id', '3')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenkeerom.creation.index', compact('creation'));
    }
    public function CapaianAirBersihStatisticKabKeerom(Request $request)
    {
        $statistic = Statistic::where('city_id', '3')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenkeerom.statistic.index', compact('statistic'));
    }



    //Kabupaten Sarmi
    public function CapaianAirBersihCreationKabSarmi(Request $request)
    {
        $creation = Creation::where('city_id', '6')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatensarmi.creation.index', compact('creation'));
    }

    public function CapaianAirBersihStatisticKabSarmi(Request $request)
    {
        $statistic = Statistic::where('city_id', '6')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatensarmi.statistic.index', compact('statistic'));
    }





    //Kabupaten Biak Numfor
    public function CapaianAirBersihRiverIntakeKabBiakNumfor(Request $request)
    {
        $riverintake = RiverIntake::where('city_id', '1')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenbiaknumfor.riverintake.index', compact('riverintake'));
    }

    public function CapaianAirBersihMunicipalWaterworkKabBiakNumfor(Request $request)
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '1')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenbiaknumfor.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function CapaianAirBersihDukcapilKabBiakNumfor(Request $request)
    {
        $dukcapil = Dukcapil::where('city_id', '1')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenbiaknumfor.dukcapil.index', compact('dukcapil'));
    }

    public function CapaianAirBersihStatisticKabBiakNumfor(Request $request)
    {
        $statistic = Statistic::where('city_id', '1')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenbiaknumfor.statistic.index', compact('statistic'));
    }





    //Kabupaten Supiori
    public function CapaianAirBersihCreationKabSupiori(Request $request)
    {
        $creation = Creation::where('city_id', '7')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatensupiori.creation.index', compact('creation'));
    }

    public function CapaianAirBersihDukcapilKabSupiori(Request $request)
    {
        $dukcapil = Dukcapil::where('city_id', '7')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatensupiori.dukcapil.index', compact('dukcapil'));
    }



    //Kabupaten Kepulauan Yapen
    public function CapaianAirBersihCreationKabKepulauanYapen(Request $request)
    {
        $creation = Creation::where('city_id', '4')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenkepulauanyapen.creation.index', compact('creation'));
    }

    public function CapaianAirBersihMunicipalWaterworkKabKepulauanYapen(Request $request)
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '4')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenkepulauanyapen.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    public function CapaianAirBersihDukcapilKabKepulauanYapen(Request $request)
    {
        $dukcapil = Dukcapil::where('city_id', '4')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenkepulauanyapen.dukcapil.index', compact('dukcapil'));
    }

    public function CapaianAirBersihStatisticKabKepulauanYapen(Request $request)
    {
        $statistic = Statistic::where('city_id', '4')->where('show', 'Yes')->get();
        return view('user.capaianairbersih.kabupatenkepulauanyapen.statistic.index', compact('statistic'));
    }
    // public function UserPeta(Request $request)
    // {
    //     return view('user.peta');
    // }

    // public function UserPetaKotaJayapura(Request $request)
    // {
    //     $kotajayapuramap = Map::where('city_id', '10')->get();
    //     return view('user.peta.kotajayapura.index', compact('kotajayapuramap'));
    // }

    // public function UserPetaKabupatenJayapura(Request $request)
    // {
    //     $kabjayapuramap = Map::where('city_id', '2')->get();
    //     return view('user.peta.kabjayapura.index', compact('kabjayapuramap'));
    // }

    // public function UserPetaPDAM(Request $request)
    // {
    //     $municipalwaterwork = MunicipalWaterwork::index();
    //     return view('user.peta.pdam', compact('municipalwaterwork'));
    // }

    //    public function UserPetaIntakeSUngai(Request $request)
    // {
    //     $riverintake = RiverIntake::index();
    //     return view('user.peta.intakesungai', compact('riverintake'));
    // }

    // public function UserPetaMataAir(Request $request)
    // {
    //     $waterspring = WaterSpring::index();
    //     return view('user.peta.mataair', compact('waterspring'));
    // }

    // public function UserPetaTangkiAir(Request $request)
    // {
    //     $watertank = WaterTank::index();
    //     return view('user.peta.tangkiair', compact('watertank'));
    // }

    // public function UserPetaPopulasi(Request $request)
    // {
    //     $population = Population::index();
    //     return view('user.peta.populasi', compact('population'));
    // }


    //Air Minum
    public function UserAirMinumKotaJayapura(Request $request)
    {
        return view('user.airminum.kotajayapura.index');
    }

    public function UserAirMinumKotaJayapuraPDAM(Request $request)
    {
        $municipalwaterwork = MunicipalWaterwork::index();
        return view('user.airminum.kotajayapura.pdam', compact('municipalwaterwork'));
    }

    public function UserUlasan(Request $request)
    {
        $comment = Comment::index();
        return view('user.ulasan', compact('comment'));
    }

    public function showFile($id){
        // $bps = Statistic::find($id);
        $id = decrypt($id);
        $path = storage_path()."/app/public/{$id}";
        $content_type = mime_content_type($path);
        // return $pdf->stream("", array("Attachments" => false));
        // return $pdf->stream();
        return response()->make(file_get_contents($path), 200, [
            "content-type" => $content_type
        ]);
    }
}
