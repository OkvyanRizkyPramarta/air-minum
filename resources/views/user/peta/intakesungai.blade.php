@extends('layouts.user.master')

      <!-- Bootstrap CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
      <!-- Bootstrap CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
      <!-- normalize CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
      <!-- Data Table JS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.min.css') }}">

      <!-- main CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
      <!-- style CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/style.css') }}">

@section('content')
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- banner section start -->
    <div class="banner_section layout_padding" style="padding-top:-300px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="padding-top:30px;">
            <h1 class="banner_taital text-center" style="color:white;">Peta Persebaran Air Minum Provinsi Papua</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- banner section end -->
    </div>
    </div>
    </div>
    <!-- header section end -->
    <!-- about section start -->
    <div class="about_section layout_padding" style="background-color:white;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-center" style="color:#10597D;padding-right:50px;">
            <a href="{{ url ('/peta/pdam') }}" style="color: inherit;text-decoration: none;">
                <span style="padding-right:50px;"><b>PDAM</b></span>
            </a>
            <a href="{{ url ('/peta/populasi') }}" style="color: inherit;text-decoration: none;">
                <span style="padding-right:50px;"><b>Populasi</b></span>
            </a>
            <a href="{{ url ('/peta/intakesungai') }}" style="color: inherit;text-decoration: none;">
                <span style="padding-right:50px;"><b>Intake Sungai</b></span>
            </a>
            <a href="{{ url ('/peta/mataair') }}" style="color: inherit;text-decoration: none;">
                <span style="padding-right:50px;"><b>Mata Air</b></span>
            </a>
            <a href="{{ url ('/peta/tangkiair') }}" style="color: inherit;text-decoration: none;">
                <span style="padding-right:50px;"><b>Tangi Air</b></span>
            </a>
            <a href="{{ url ('/peta') }}" style="color: inherit;text-decoration: none;">
                <span style=""><b>Peta Persebaran</b></span>
            </a>
            </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h3 class="text-center" style="color:#10597D;padding-right:50px;">
                    <span style=""><b>Intake Sungai</b></span>
                  </h3>
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="auto">Kode Integrasi </th>
                                        <th class="text-center" width="auto">Nama </th>
                                        <th class="text-center" width="auto">Jenis Type</th>
                                        <th class="text-center" width="auto">Unit</th>
                                        <th class="text-center" width="auto">Wilayah Sungai</th>
                                        <th class="text-center" width="auto">Provinsi</th>
                                        <th class="text-center" width="auto">Kota/Kabupaten</th>
                                        <th class="text-center" width="auto">Kecamatan</th>
                                        <th class="text-center" width="auto">Desa/Kelurahan</th>
                                        <th class="text-center" width="auto">Latitude</th>
                                        <th class="text-center" width="auto">Longitude</th>
                                        <th class="text-center" width="auto">Jiwa (orang)</th>
                                        <th class="text-center" width="auto">Debit (l/detik)</th>
                                        <th class="text-center" width="auto">Jenis Pompa</th>
                                        <th class="text-center" width="auto">Head Pompa (m)</th>
                                        <th class="text-center" width="auto">Tahun Pembuatan</th>
                                        <th class="text-center" width="auto">Status Operasi</th>
                                        <th class="text-center" width="auto">Tanggal Diperbarui</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($riverintake as $r)
                                <tr>
                                 <td class="text-center">{{ $r->bmm_code }}</td>
                                        <td class="text-center">{{ $r->name }}</td>
                                        <td class="text-center">{{ $r->intake_type }}</td>
                                        <td class="text-center">{{ $r->unit }}</td>
                                        <td class="text-center">{{ $r->watershed }}</td>
                                        <td class="text-center">{{ $r->province }}</td>
                                        <td class="text-center">{{ $r->city->name }}</td>
                                        <td class="text-center">{{ $r->district->name }}</td>
                                        <td class="text-center">{{ $r->village->name }}</td>
                                        <td class="text-center">{{ $r->latitude }}</td>
                                        <td class="text-center">{{ $r->longitude }}</td>
                                        <td class="text-center">{{ $r->people }}</td>
                                        <td class="text-center">{{ $r->debit }}</td>
                                        <td class="text-center">{{ $r->pump_type }}</td>
                                        <td class="text-center">{{ $r->head_pompa }}</td>
                                        <td class="text-center">{{ $r->production_year }}</td>
                                        <td class="text-center">{{ $r->operating_state }}</td>
                                        <td class="text-center">{{ $r->updated_date }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center" width="auto">Kode Integrasi </th>
                                        <th class="text-center" width="auto">Nama </th>
                                        <th class="text-center" width="auto">Jenis Type</th>
                                        <th class="text-center" width="auto">Unit</th>
                                        <th class="text-center" width="auto">Wilayah Sungai</th>
                                        <th class="text-center" width="auto">Provinsi</th>
                                        <th class="text-center" width="auto">Kota/Kabupaten</th>
                                        <th class="text-center" width="auto">Kecamatan</th>
                                        <th class="text-center" width="auto">Desa/Kelurahan</th>
                                        <th class="text-center" width="auto">Latitude</th>
                                        <th class="text-center" width="auto">Longitude</th>
                                        <th class="text-center" width="auto">Jiwa (orang)</th>
                                        <th class="text-center" width="auto">Debit (l/detik)</th>
                                        <th class="text-center" width="auto">Jenis Pompa</th>
                                        <th class="text-center" width="auto">Head Pompa (m)</th>
                                        <th class="text-center" width="auto">Tahun Pembuatan</th>
                                        <th class="text-center" width="auto">Status Operasi</th>
                                        <th class="text-center" width="auto">Tanggal Diperbarui</th>
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
        <!-- jquery
		============================================ -->
    <script src="{{ asset('admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="{{ asset('admin/js/data-table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/data-table/data-table-act.js') }}"></script>
@endsection