@extends('layouts.adminpu.beranda')

@section('content')
<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-ctn">
                                    <h2> Data Tabel Dinas PU Bidang Sumber Daya Air</h2>
                                    <h2>Kabupaten Jayapura <span class="bread-ntd"> </span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" width="auto">Kota/Kabupaten</th>
                                    <th class="text-center" width="auto">Nama</th>
                                    <th class="text-center" width="auto">Menampilkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($waterresource as $w)
                                <tr>
                                    <td class="text-center">{{ $w -> city -> name }}</td>
                                    <td class="text-center">
                                        <p><a href="{{ asset ('storage/'.$w->file)}}" target="_blank">{{ $w->name }}</a>.</p>
                                    </td>
                                    <td class="text-center">
                                        <span>
                                            @if ($w->show == 'Yes')
                                            <span>Menampilkan</span>
                                            @else
                                            <span>Tidak Menampilkan</span>
                                            @endif
                                        </span>
                                    </td>
                                    <div class="row">
                                        <td class="text-center">
                                        </td>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center" width="auto">Kota/Kabupaten</th>
                                    <th class="text-center" width="auto">Nama</th>
                                    <th class="text-center" width="auto">Menampilkan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->
@endsection