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
use App\Models\Creation;

class SubAdminController extends Controller
{

    public function SubAdminIndex()
     {
         return view('subadmin.index');
     }

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

    public function SubAdminAirBersihKabJayapuraWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.waterresource.index');
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
    public function SubAdminAirBersihKabJayapuraWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabJayapuraRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.riverintake.index');
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
    public function SubAdminAirBersihKabJayapuraRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabJayapuraWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.waterwell.index');
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
    public function SubAdminAirBersihKabJayapuraWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabJayapuraWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.watertank.index');
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
    public function SubAdminAirBersihKabJayapuraWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabJayapuraWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.waterspring.index');
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
    public function SubAdminAirBersihKabJayapuraWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabJayapuraMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraMunicipalWaterworkStore(Request $request)
    {

        $city = new City;
        $city->id = $request->get('city_id', '2');
            
        $watertank = new MunicipalWaterwork;
        $watertank->name = $request->name;
        $watertank->file = $request->file('file')->store('files', 'public');
        $watertank->show = $request->show;
        $watertank->data = $request->data;
        $watertank->city()->associate($city);
        $watertank->save();

        Alert::toast('Informasi Berhasil Disimpan', 'success');
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabJayapuraMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabJayapuraDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.dukcapil.index');
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
    public function SubAdminAirBersihKabJayapuraDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabJayapuraStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.statistic.index');
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
    public function SubAdminAirBersihKabJayapuraStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabJayapuraDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.dataproces.index');
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
    public function SubAdminAirBersihKabJayapuraDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatenjayapura.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabJayapuraCreationIndex()
    {
        $creation = Creation::where('city_id', '2')->get();
        return view('subadmin.kabupatenjayapura.creation.index', compact('creation'));
    }

    public function SubAdminAirBersihKabJayapuraCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraCreationStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.creation.index');
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
    public function SubAdminAirBersihKabJayapuraCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenjayapura.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraCreationUpdate(Request $request, Creation $creation)
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
        return redirect()->route('subadmin.airbersih.kabupatenjayapura.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabJayapuraCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }





    public function SubAdminAirBersihKabBiakNumforWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.waterresource.index');
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
    public function SubAdminAirBersihKabBiakNumforWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabBiakNumforRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.riverintake.index');
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
    public function SubAdminAirBersihKabBiakNumforRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabBiakNumforWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.waterwell.index');
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
    public function SubAdminAirBersihKabBiakNumforWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabBiakNumforWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.watertank.index');
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
    public function SubAdminAirBersihKabBiakNumforWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabBiakNumforWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.waterspring.index');
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
    public function SubAdminAirBersihKabBiakNumforWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabBiakNumforMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabBiakNumforMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenbiaknumfor.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabBiakNumforDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.index');
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
    public function SubAdminAirBersihKabBiakNumforDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabBiakNumforStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.statistic.index');
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
    public function SubAdminAirBersihKabBiakNumforStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabBiakNumforDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '1')->get();
        return view('subadmin.kabupatenbiaknumfor.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.dataproces.index');
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
    public function SubAdminAirBersihKabBiakNumforDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatenbiaknumfor.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatenbiaknumfor.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabBiakNumforDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }






    public function SubAdminAirBersihKabKeeromWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.waterresource.index');
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
    public function SubAdminAirBersihKabKeeromWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKeeromRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.riverintake.index');
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
    public function SubAdminAirBersihKabKeeromRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subradmin.airbersih.kabupatenkeerom.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKeeromWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.waterwell.index');
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
    public function SubAdminAirBersihKabKeeromWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKeeromWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.watertank.index');
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
    public function SubAdminAirBersihKabKeeromWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKeeromWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.waterspring.index');
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
    public function SubAdminAirBersihKabKeeromWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKeeromMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabKeeromMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKeeromDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.dukcapil.index');
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
    public function SubAdminAirBersihKabKeeromDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabKeeromStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.statistic.index');
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
    public function SubAdminAirBersihKabKeeromStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabKeeromDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.dataproces.index');
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
    public function SubAdminAirBersihKabKeeromDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatenkeerom.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKeeromCreationIndex()
    {
        $creation = Creation::where('city_id', '3')->get();
        return view('subadmin.kabupatenkeerom.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromCreationStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.creation.index');
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
    public function SubAdminAirBersihKabKeeromCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkeerom.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromCreationUpdate(Request $request, Creation $creation)
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
        return redirect()->route('subadmin.airbersih.kabupatenkeerom.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKeeromCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }





    public function SubAdminAirBersihKabSarmiWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.waterresource.index');
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
    public function SubAdminAirBersihKabSarmiWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSarmiRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.riverintake.index');
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
    public function SubAdminAirBersihKabSarmiRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSarmiWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.waterwell.index');
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
    public function SubAdminAirBersihKabSarmiWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSarmiWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.watertank.index');
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
    public function SubAdminAirBersihKabSarmiWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSarmiWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.waterspring.index');
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
    public function SubAdminAirBersihKabSarmiWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSarmiMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabSarmiMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSarmiDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.dukcapil.index');
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
    public function SubAdminAirBersihKabSarmiDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabSarmiStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.statistic.index');
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
    public function SubAdminAirBersihKabSarmiStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabSarmiDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.dataproces.index');
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
    public function SubAdminAirBersihKabSarmiDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatensarmi.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiCreationIndex()
    {
        $creation = Creation::where('city_id', '6')->get();
        return view('subadmin.kabupatensarmi.creation.index', compact('creation'));
    }

    public function SubAdminAirBersihKabSarmiCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiCreationStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.creation.index');
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
    public function SubAdminAirBersihKabSarmiCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensarmi.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiCreationUpdate(Request $request, Creation $creation)
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
        return redirect()->route('subadmin.airbersih.kabupatensarmi.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSarmiCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }





    public function SubAdminAirBersihKabSupioriWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.waterresource.index');
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
    public function SubAdminAirBersihKabSupioriWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSupioriRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.riverintake.index');
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
    public function SubAdminAirBersihKabSupioriRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSupioriWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.waterwell.index');
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
    public function SubAdminAirBersihKabSupioriWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSupioriWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.watertank.index');
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
    public function SubAdminAirBersihKabSupioriWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSupioriWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.waterspring.index');
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
    public function SubAdminAirBersihKabSupioriWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSupioriMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabSupioriMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSupioriDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.dukcapil.index');
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
    public function SubAdminAirBersihKabSupioriDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabSupioriStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.statistic.index');
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
    public function SubAdminAirBersihKabSupioriStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabSupioriDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.dataproces.index');
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
    public function SubAdminAirBersihKabSupioriDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatensupiori.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabSupioriCreationIndex()
    {
        $creation = Creation::where('city_id', '7')->get();
        return view('subadmin.kabupatensupiori.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriCreationStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.creation.index');
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
    public function SubAdminAirBersihKabSupioriCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatensupiori.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriCreationUpdate(Request $request, Creation $creation)
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
        return redirect()->route('subadmin.airbersih.kabupatensupiori.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabSupioriCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }






    public function SubAdminAirBersihKabKepulauanYapenWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.index');
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
    public function SubAdminAirBersihKabKepulauanYapenWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKepulauanYapenRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.index');
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
    public function SubAdminAirBersihKabKepulauanYapenRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKepulauanYapenWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.index');
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
    public function SubAdminAirBersihKabKepulauanYapenWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKepulauanYapenWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.watertank.index');
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
    public function SubAdminAirBersihKabKepulauanYapenWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKepulauanYapenWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.index');
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
    public function SubAdminAirBersihKabKepulauanYapenWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKepulauanYapenDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.index');
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
    public function SubAdminAirBersihKabKepulauanYapenDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabKepulauanYapenStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.statistic.index');
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
    public function SubAdminAirBersihKabKepulauanYapenStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabKepulauanYapenDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.index');
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
    public function SubAdminAirBersihKabKepulauanYapenDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatenkepulauanyapen.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabKepulauanYapenCreationIndex()
    {
        $creation = Creation::where('city_id', '4')->get();
        return view('subadmin.kabupatenkepulauanyapen.creation.index', compact('creation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenCreationCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.creation.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenCreationStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.creation.index');
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
    public function SubAdminAirBersihKabKepulauanYapenCreationEdit(Creation $creation)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenkepulauanyapen.creation.edit', compact('city', 'district', 'creation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenCreationUpdate(Request $request, Creation $creation)
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
        return redirect()->route('subadmin.airbersih.kabupatenkepulauanyapen.creation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabKepulauanYapenCreationDestroy(Creation $creation)
    {
        $creation->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }





    public function SubAdminAirBersihKabWaropenWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.waterresource.index');
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
    public function SubAdminAirBersihKabWaropenWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabWaropenRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.riverintake.index');
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
    public function SubAdminAirBersihKabWaropenRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabWaropenWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.waterwell.index');
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
    public function SubAdminAirBersihKabWaropenWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabWaropenWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.watertank.index');
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
    public function SubAdminAirBersihKabWaropenWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabWaropenWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.waterspring.index');
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
    public function SubAdminAirBersihKabWaropenWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabWaropenMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabWaropenMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenwaropen.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabWaropenDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.dukcapil.index');
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
    public function SubAdminAirBersihKabWaropenDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabWaropenStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.statistic.index');
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
    public function SubAdminAirBersihKabWaropenStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabWaropenDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '8')->get();
        return view('subadmin.kabupatenwaropen.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.dataproces.index');
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
    public function SubAdminAirBersihKabWaropenDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatenwaropen.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatenwaropen.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabWaropenDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }





    public function SubAdminAirBersihKabMamberamoRayaWaterResourceIndex()
    {
        $waterresource = WaterResource::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.waterresource.index', compact('waterresource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterResourceCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.waterresource.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterResourceStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.waterresource.index');
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
    public function SubAdminAirBersihKabMamberamoRayaWaterResourceEdit(WaterResource $waterresource)
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.waterresource.edit', compact('waterresource', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterResourceUpdate(Request $request, WaterResource $waterresource)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.waterresource.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterResourceDestroy(WaterResource $waterresource)
    {
        $waterresource->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabMamberamoRayaRiverintakeIndex()
    {
        $riverintake = RiverIntake::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.riverintake.index', compact('riverintake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaRiverintakeCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.riverintake.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaRiverintakeStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.riverintake.index');
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
    public function SubAdminAirBersihKabMamberamoRayaRiverintakeEdit(RiverIntake $riverintake)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.riverintake.edit', compact('city', 'district', 'riverintake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaRiverintakeUpdate(Request $request, RiverIntake $riverintake)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.riverintake.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaRiverintakeDestroy(RiverIntake $riverintake)
    {
        $riverintake->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabMamberamoRayaWaterwellIndex()
    {
        $waterwell = WaterWell::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.waterwell.index', compact('waterwell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterwellCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.waterwell.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterwellStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.waterwell.index');
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
    public function SubAdminAirBersihKabMamberamoRayaWaterwellEdit(WaterWell $waterwell)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.waterwell.edit', compact('city', 'district', 'waterwell'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterwellUpdate(Request $request, WaterWell $waterwell)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.waterwell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterwellDestroy(WaterWell $waterwell)
    {
        $waterwell->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabMamberamoRayaWatertankIndex()
    {
        $watertank = Watertank::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.watertank.index', compact('watertank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWatertankCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.watertank.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWatertankStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.watertank.index');
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
    public function SubAdminAirBersihKabMamberamoRayaWatertankEdit(WaterTank $watertank)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.watertank.edit', compact('city', 'district', 'watertank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWatertankUpdate(Request $request, WaterTank $watertank)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.watertank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWatertankDestroy(WaterTank $watertank)
    {
        $watertank->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabMamberamoRayaWaterspringIndex()
    {
        $waterspring = Waterspring::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.waterspring.index', compact('waterspring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterspringCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.waterspring.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterspringStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.waterspring.index');
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
    public function SubAdminAirBersihKabMamberamoRayaWaterspringEdit(Waterspring $waterspring)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.waterspring.edit', compact('city', 'district', 'waterspring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterspringUpdate(Request $request, Waterspring $waterspring)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.waterspring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaWaterspringDestroy(Waterspring $waterspring)
    {
        $waterspring->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkIndex()
    {
        $municipalwaterwork = MunicipalWaterwork::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.municipalwaterwork.index', compact('municipalwaterwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkCreate()
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.municipalwaterwork.create', compact('city','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.index');
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
    public function SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkEdit(MunicipalWaterwork $municipalwaterwork)
    {
        $city = City::index();
        $district = District::index();
        return view('subadmin.kabupatenmamberamoraya.municipalwaterwork.edit', compact('city', 'district', 'municipalwaterwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkUpdate(Request $request, MunicipalWaterwork $municipalwaterwork)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.municipalwaterwork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaMunicipalWaterworkDestroy(MunicipalWaterwork $municipalwaterwork)
    {
        $municipalwaterwork->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

    public function SubAdminAirBersihKabMamberamoRayaDukcapilIndex()
    {
        $dukcapil = Dukcapil::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.dukcapil.index', compact('dukcapil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDukcapilCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.dukcapil.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDukcapilStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.index');
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
    public function SubAdminAirBersihKabMamberamoRayaDukcapilEdit(Dukcapil $dukcapil)
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.dukcapil.edit', compact('dukcapil', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDukcapilUpdate(Request $request, Dukcapil $dukcapil)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.dukcapil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDukcapilDestroy(Dukcapil $dukcapil)
    {
        $dukcapil->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

  public function SubAdminAirBersihKabMamberamoRayaStatisticIndex()
    {
        $statistic = Statistic::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.statistic.index', compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaStatisticCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.statistic.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaStatisticStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.statistic.index');
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
    public function SubAdminAirBersihKabMamberamoRayaStatisticEdit(Statistic $statistic)
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.statistic.edit', compact('statistic', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaStatisticUpdate(Request $request, Statistic $statistic)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.statistic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaStatisticDestroy(Statistic $statistic)
    {
        $statistic->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }

 public function SubAdminAirBersihKabMamberamoRayaDataProcesIndex()
    {
        $dataproces = DataProces::where('city_id', '5')->get();
        return view('subadmin.kabupatenmamberamoraya.dataproces.index', compact('dataproces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDataProcesCreate()
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.dataproces.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDataProcesStore(Request $request)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.dataproces.index');
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
    public function SubAdminAirBersihKabMamberamoRayaDataProcesEdit(DataProces $dataproces)
    {
        $city = City::all();
        return view('subadmin.kabupatenmamberamoraya.dataproces.edit', compact('dataproces', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDataProcesUpdate(Request $request, DataProces $dataproces)
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
        return redirect()->route('subadmin.airbersih.kabupatenmamberamoraya.dataproces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SubAdminAirBersihKabMamberamoRayaDataProcesDestroy(DataProces $dataproces)
    {
        $dataproces->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();
    }
}
