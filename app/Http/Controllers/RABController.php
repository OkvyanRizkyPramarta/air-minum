<?php

namespace App\Http\Controllers;

use App\Models\DetailRAB;
use App\Models\RAB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;
use PDF;

class RABController extends Controller
{
    public function index(){

        $rab = RAB::all();

        return view("/superadmin/rab/index", compact("rab"));
    }

    public function create(){
        return view("/superadmin/rab/create");
    }

    public function store(Request $request){
        $total_cost = $real_cost = $ppn = $dibulatkan = 0;
        $kode_rab = "RAB_".date("ymdhis");
        foreach($request->kode_kategori_pekerjaan as $x => $kkp){
            foreach($request->input("uraian_pekerjaan_$kkp") as $i => $up){
                $jumlah_harga = str_replace(".", "", $request->input("jumlah_harga_{$kkp}")[$i]);
                DetailRAB::create([
                    "kode_rab" => $kode_rab,
                    "number_row" => $request->input("number_row_{$kkp}")[$i],
                    "kode_kategori_pekerjaan" => $kkp,
                    "nama_kategori_pekerjaan" => $request->nama_kategori_pekerjaan[$x],
                    "uraian_pekerjaan" => $up,
                    "volume" => $request->input("volume_{$kkp}")[$i],
                    "harga_satuan" => str_replace(".", "", $request->input("harga_satuan_{$kkp}")[$i]),
                    "jumlah_harga" => $jumlah_harga,
                ]);
                $real_cost += $jumlah_harga;
            }
        }
        $ppn = $real_cost * 0.11;
        $total_cost = $real_cost + $ppn;
        RAB::create([
            "kode_rab" => $kode_rab,
            "pekerjaan" => $request->judul_pekerjaan,
            "tahun_anggaran" => date("Y"),
            "real_cost" => $real_cost,
            "ppn" => $ppn,
            "total_cost" => $total_cost,
            "dibulatkan" => $total_cost
        ]);

        return redirect("/superadmin/rab");
    }

    public function edit($id){
        $rab = RAB::where("kode_rab", $id)->first();
        $detail_rab = DetailRAB::where("kode_rab", $id)->get();
        $data = $detail_rab->unique("kode_kategori_pekerjaan");
        $result = [];
        $obj = new stdClass();
        foreach($data as $d){
            $key = $d->kode_kategori_pekerjaan;
            // array_push($result, (object)[
            //     $key => DetailRAB::where(["kode_rab" => $id, "kode_kategori_pekerjaan" => $key])->count()
            // ]);
            $obj->$key = DetailRAB::where(["kode_rab" => $id, "kode_kategori_pekerjaan" => $key])->count();
        }

        $obj = json_encode($obj);

        return view("/superadmin/rab/edit", compact("detail_rab", "obj", "rab"));
    }

    public function update(Request $request){
        $total_cost = $real_cost = $ppn = $dibulatkan = 0;
        $kode_rab = $request->kode_rab;
        foreach($request->kode_kategori_pekerjaan as $x => $kkp){
            foreach($request->input("uraian_pekerjaan_$kkp") as $i => $up){
                $jumlah_harga = str_replace(".", "", $request->input("jumlah_harga_{$kkp}")[$i]);
                $number_row = $request->input("number_row_{$kkp}")[$i];
                $query = DetailRAB::where(["kode_rab" =>  $kode_rab, "kode_kategori_pekerjaan" => $kkp, "number_row" => $number_row]);
                if($query->exists()){
                    $query->update([
                        "number_row" => $number_row,
                        "kode_kategori_pekerjaan" => $kkp,
                        "nama_kategori_pekerjaan" => $request->nama_kategori_pekerjaan[$x],
                        "uraian_pekerjaan" => $up,
                        "volume" => $request->input("volume_{$kkp}")[$i],
                        "harga_satuan" => str_replace(".", "", $request->input("harga_satuan_{$kkp}")[$i]),
                        "jumlah_harga" => $jumlah_harga,
                    ]);
                }else{
                    DetailRAB::create([
                        "kode_rab" => $kode_rab,
                        "number_row" => $number_row,
                        "kode_kategori_pekerjaan" => $kkp,
                        "nama_kategori_pekerjaan" => $request->nama_kategori_pekerjaan[$x],
                        "uraian_pekerjaan" => $up,
                        "volume" => $request->input("volume_{$kkp}")[$i],
                        "harga_satuan" => str_replace(".", "", $request->input("harga_satuan_{$kkp}")[$i]),
                        "jumlah_harga" => $jumlah_harga,
                    ]);
                }
                $real_cost += $jumlah_harga;
            }
        }
        $ppn = $real_cost * 0.11;
        $total_cost = $real_cost + $ppn;
        RAB::where("kode_rab", $kode_rab)->update([
            "pekerjaan" => $request->judul_pekerjaan,
            "tahun_anggaran" => date("Y"),
            "real_cost" => $real_cost,
            "ppn" => $ppn,
            "total_cost" => $total_cost,
            "dibulatkan" => $total_cost
        ]);

        return redirect("/superadmin/rab");
    }

    public function destroy($id){
        RAB::where("kode_rab", $id)->delete();
        DetailRAB::where("kode_rab", $id)->delete();

        return redirect("/superadmin/rab");
    }

    public function detail($id){
        $rab = RAB::where("kode_rab", $id)->first();
        $detail_rab = DetailRAB::where("kode_rab", $id)->get();
        $pdf = PDF::loadView('/superadmin/rab/view_pdf', ["detail_rab" => $detail_rab, "rab" => $rab]);
        return $pdf->download("{$rab->kode_rab}.pdf");
        // return view("/superadmin/rab/view_pdf", ["detail_rab" => $detail_rab, "rab" => $rab]);
    }
}
