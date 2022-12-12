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
            <h1 class="banner_taital text-center" style="color:white;">Capaian Air Minum Provinsi Papua</h1>
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
          <div class="col-md-12 col-md-12 col-sm-12">
            <h3 class="text-center" style="color:#10597D;">
            <a href="{{ url ('/airminum/kota/jayapura/pdam') }}" style="font-size:1.5vw; padding-right:30px; color: inherit;text-decoration: none;">
                <span style=""><b>PDAM</b></span>
            </a>
            <a href="" style="font-size:1.5vw; padding-right:30px; color: inherit;text-decoration: none;">
                <span style=""><b>Populasi</b></span>
            </a>
            <a href="" style="font-size:1.5vw; padding-right:30px; color: inherit;text-decoration: none;">
                <span style=""><b>Intake Sungai</b></span>
            </a>
            <a href="" style="font-size:1.5vw; padding-right:30px; color: inherit;text-decoration: none;">
                <span style=""><b>Mata Air</b></span>
            </a>
            <a href="" style="font-size:1.5vw; padding-right:30px; color: inherit;text-decoration: none;">
                <span style=""><b>Tangki Air</b></span>
            </a>
            </h3>
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