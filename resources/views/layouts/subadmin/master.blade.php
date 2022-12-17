<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Halaman Sub Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.transitions.css') }}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/animate.css') }}">
    <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
    <!-- Range Slider CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/themesaller-forms.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/notika-custom-icon.css') }}">
    <!-- bootstrap select CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-select/bootstrap-select.css') }}">
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/datapicker/datepicker3.css') }}">
    <!-- Color Picker CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/color-picker/farbtastic.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/chosen/chosen.css') }}">
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/notification/notification.css') }}">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone/dropzone.css') }}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/wave/waves.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .dropbtn {
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        }

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
        display: block;
        }

        .scrollable-menu {
            height: auto;
            max-height: 200px;
            overflow-x: hidden;
        }

    </style>
  </head>

<body>
    @include('sweetalert::alert')
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">    
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-chat"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Account</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                <h3>{{ Auth::user()->name }}</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="{{ route('signout') }}">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
      <!-- Mobile Menu start -->
      <div class="mobile-menu-area" style="background-color:#61BDEB;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-target="#Charts" href="{{ url('/subadmin/index') }}">Halaman Utama</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Halaman Data</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                    <li><a href="{{ url ('/subadmin/table/city/index') }}">Tabel Kota/Kabupaten</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/district/index') }}">Tabel Kecamatan</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/village/index') }}">Tabel Desa/Kelurahan</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/population/index') }}">Tabel Populasi</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/riverintake/index') }}">Tabel Intake Sungai</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/waterwell/index')}}">Tabel Sumur</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/watertank/index') }}">Tabel Tampungan Air</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/municipalwaterwork/index') }}">Tabel PDAM</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/waterspring/index') }}">Tabel Mata Air</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/file/index') }}">Tabel Berkas</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/comment/index') }}">Tabel Kritik Dan Saran</a>
                                        </li>
                                        <li><a href="{{ url ('/subadmin/table/map/index') }}">Tabel Peta</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="{{ url('/subadmin/index') }}"><i class="notika-icon notika-house"></i> Halaman Utama</a>
                        </li>
                        <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Capaian Air Minum </a>
                        </li>
                        <li><a href="{{ url ('/subadmin/comment') }}"><i class="notika-icon notika-windows"></i> Ulasan </a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Tables" class="tab-pane active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kota Jayapura
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="{{ url('/subadmin/airbersih/kota/jayapura/waterresource/index') }}">Dinas PU Bidang SDA</a>
                                        <a href="{{ url('/subadmin/airbersih/kota/jayapura/riverintake/index') }}">Balai WIlayah Sungai Intake Sungai</a>
                                        <a href="{{ url('/subadmin/airbersih/kota/jayapura/municipalwaterwork/index') }}">PDAM Kota Jayapura</a>
                                        <a href="{{ url('/subadmin/airbersih/kota/jayapura/dukcapil/index') }}">Dinas Dukcapil</a>
                                        <a href="{{ url('/subadmin/airbersih/kota/jayapura/statistic/index') }}">Badan Pusat Statistik</a>
                                        <a href="{{ url('/subadmin/airbersih/kota/jayapura/dataproces/index') }}">Badan Pengelolaan dan Pendataan Daerah</a>
                                    </div>
                                </div> 
                                <div class="dropdown" style="margin-top:10px;margin-bottom:20px;">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Jayapura
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/jayapura/creation/index') }}">Dinas PU Bidang Cipta Karya</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/jayapura/municipalwaterwork/index') }}">PDAM Kabupaten Jayapura</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/jayapura/dukcapil/index') }}">Dinas Dukcapil</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/jayapura/statistic/index') }}">Badan Pusat Statistik</a>
                                    </div>
                                </div> 
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Keerom
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/keerom/creation/index') }}">Dinas PU Bidang Cipta Karya</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/keerom/statistic/index') }}">Badan Pusat Statistik</a>
                                    </div>
                                </div> 
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Sarmi
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/sarmi/creation/index') }}">Dinas PU Bidang Cipta Karya</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/sarmi/statistic/index') }}">Badan Pusat Statistik</a>
                                    </div>
                                </div> 
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Biak Numfor
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/biaknumfor/riverintake/index') }}">Balai WIlayah Sungai</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/biaknumfor/municipalwaterwork/index') }}">PDAM Kabupaten Biak Numfor</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/biaknumfor/dukcapil/index') }}">Dinas Dukcapil</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/biaknumfor/statistic/index') }}">Badan Pusat Statistik</a>
                                    </div>
                                </div> 
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Supiori
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/supiori/creation/index') }}">Dinas PU Bidang Cipta Karya</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/supiori/dukcapil/index') }}">Dinas Dukcapil</a>
                                    </div>
                                </div> 
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Kepulauan Yapen
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/kepulauanyapen/creation/index') }}">Dinas PU Bidang Cipta Karya</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/kepulauanyapen/municipalwaterwork/index') }}">PDAM Kabupaten Kepulauan Yapen</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/kepulauanyapen/dukcapil/index') }}">Dinas Dukcapil</a>
                                        <a href="{{ url('/subadmin/airbersih/kabupaten/kepulauanyapen/statistic/index') }}">Badan Pusat Statistik</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Waropen
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="#">Tidak Mempunyai data</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropbtn" href="#" style="color:black;">
                                        Kabupaten Mamberamo Raya
                                    </a>
                                    <div class="dropdown-content scrollable-menu" >
                                        <a href="#">Tidak Mempunyai data</a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->

    @yield('content')
    
    @include('sweetalert::alert')

    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="{{ asset('admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('admin/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('admin/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('admin/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('admin/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('admin/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('admin/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/js/sparkline/sparkline-active.js') }}"></script>
    <!-- flot JS
		============================================ -->
    <script src="{{ asset('admin/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{ asset('admin/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('admin/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('admin/js/knob/knob-active.js') }}"></script>
    <!-- Input Mask JS
		============================================ -->
    <script src="{{ asset('admin/js/jasny-bootstrap.min.js') }}"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{ asset('admin/js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('admin/js/icheck/icheck-active.js') }}"></script>
    <!-- rangle-slider JS
		============================================ -->
    <script src="{{ asset('admin/js/rangle-slider/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/rangle-slider/jquery-ui-touch-punch.min.js') }}"></script>
    <script src="{{ asset('admin/js/rangle-slider/rangle-active.js') }}"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="{{ asset('admin/js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/js/datapicker/datepicker-active.js') }}"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="{{ asset('admin/js/bootstrap-select/bootstrap-select.js') }}"></script>
    <!--  color-picker JS
		============================================ -->
    <script src="{{ asset('admin/js/color-picker/farbtastic.min.js') }}"></script>
    <script src="{{ asset('admin/js/color-picker/color-picker.js') }}"></script>
    <!--  notification JS
		============================================ -->
    <script src="{{ asset('admin/js/notification/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('admin/js/notification/notification-active.js') }}"></script>
    <!--  summernote JS
		============================================ -->
    <script src="{{ asset('admin/js/summernote/summernote-updated.min.js') }}"></script>
    <script src="{{ asset('admin/js/summernote/summernote-active.js') }}"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="{{ asset('admin/js/dropzone/dropzone.js') }}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{ asset('admin/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('admin/js/wave/wave-active.js') }}"></script>
    <!--  chosen JS
		============================================ -->
    <script src="{{ asset('admin/js/chosen/chosen.jquery.js') }}"></script>
    <!--  Chat JS
		============================================ -->
    <script src="{{ asset('admin/js/chat/jquery.chat.js') }}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{ asset('admin/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>