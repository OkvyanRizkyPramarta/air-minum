<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Table | Notika - Notika Admin Template</title>
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
      <!-- Bootstrap CSS
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
      <!-- wave CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/wave/waves.min.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/css/wave/button.css') }}">
      <!-- mCustomScrollbar CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
      <!-- jvectormap CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/jvectormap/jquery-jvectormap-2.0.3.css') }}">
      <!-- mCustomScrollbar CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
      <!-- notika icon CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/notika-custom-icon.css') }}">
      <!-- bootstrap select CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-select/bootstrap-select.css') }}">
      <!-- datapicker CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/datapicker/datepicker3.css') }}">
      <!-- main CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/chosen/chosen.css') }}">
      <!-- notification CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/notification/notification.css') }}">
      <!-- dropzone CSS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/dropzone/dropzone.css') }}">
      <!-- Data Table JS
      ============================================ -->
      <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.min.css') }}">
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
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">Logout</a>
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
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Halaman Utama</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard One</a></li>
                                        <li><a href="index-2.html">Dashboard Two</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Halaman Data</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="{{ url ('/superadmin/table/city/index') }}">Tabel Kota</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/district/index') }}">Tabel Kecamatan</a>
                                        </li>
                                        <li><a href="">Tabel Desa / Kelurahan</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/population/index') }}">Tabel Populasi</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/riverintake/index') }}">Tabel Intake Sungai</a>
                                        </li>
                                        <li><a href="">Tabel Sumur</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/watertank/index') }}">Tabel Tampungan Air</a>
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
                        <li><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Halaman Utama</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Halaman Data</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.html">Dashboard One</a>
                                </li>
                                <li><a href="index-2.html">Dashboard Two</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ url ('/superadmin/table/city/index') }}">Tabel Kota</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/district/index') }}">Tabel Kecamatan</a>
                                </li>
                                <li><a href="">Tabel Desa / Kelurahan</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/population/index') }}">Tabel Populasi</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/riverintake/index') }}">Tabel Intake Sungai</a>
                                </li>
                                <li><a href="">Tabel Sumur</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/watertank/index') }}">Tabel Tampungan Air</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
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
										<h2>Data Table</h2>
										<p>Welcome to PDAM TOYO <span class="bread-ntd">Admin </span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                                    <a href="{{url('/superadmin/table/riverintake/create')}}" type="button" data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" class="btn"><b>Buat Data Baru</b></a>
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
                                        <th class="text-center" width="auto">Kode Integrasi </th>
                                        <th class="text-center" width="auto">Nama </th>
                                        <th class="text-center" width="auto">Jenis Type</th>
                                        <th class="text-center" width="auto">Unit</th>
                                        <th class="text-center" width="auto">Wilayah Sungai</th>
                                        <th class="text-center" width="auto">Provinsi</th>
                                        <th class="text-center" width="auto">Kabupaten / Kota</th>
                                        <th class="text-center" width="auto">Kecamatan</th>
                                        <th class="text-center" width="auto">Kelurahan</th>
                                        <th class="text-center" width="auto">Latitude</th>
                                        <th class="text-center" width="auto">Longitude</th>
                                        <th class="text-center" width="auto">Jiwa (orang)</th>
                                        <th class="text-center" width="auto">Debit (l/detik)</th>
                                        <th class="text-center" width="auto">Jenis Pompa</th>
                                        <th class="text-center" width="auto">Head Pompa (m)</th>
                                        <th class="text-center" width="auto">Tahun Pembuatan</th>
                                        <th class="text-center" width="auto">Status Operasi</th>
                                        <th class="text-center" width="auto">Tanggal Diperbarui</th>
                                        <th class="text-center" width="220px;">Action</th>
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
                                        <div class="row">
                                            <td class="text-center">
                                                <div>
                                                    <a href="{{ route('superadmin.table.riverintake.edit', $r->id) }}" class="btn notika-btn-black" style="color:white;"><i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div>
                                                    <form action="{{ route('superadmin.table.riverintake.destroy', $r->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                        Delete</a>
                                                    </form>
                                                </div>
                                            </td>
                                        </div>
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
                                        <th class="text-center" width="auto">Kabupaten / Kota</th>
                                        <th class="text-center" width="auto">Kecamatan</th>
                                        <th class="text-center" width="auto">Kelurahan</th>
                                        <th class="text-center" width="auto">Latitude</th>
                                        <th class="text-center" width="auto">Longitude</th>
                                        <th class="text-center" width="auto">Jiwa (orang)</th>
                                        <th class="text-center" width="auto">Debit (l/detik)</th>
                                        <th class="text-center" width="auto">Jenis Pompa</th>
                                        <th class="text-center" width="auto">Head Pompa (m)</th>
                                        <th class="text-center" width="auto">Tahun Pembuatan</th>
                                        <th class="text-center" width="auto">Status Operasi</th>
                                        <th class="text-center" width="auto">Tanggal Diperbarui</th>
                                        <th class="text-center" width="220px;">Action</th>
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
    <!--  Chat JS
		============================================ -->
    <script src="{{ asset('admin/js/chat/jquery.chat.js') }}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{ asset('admin/js/todo/jquery.todo.js') }}"></script>
	<!--  wave JS
		============================================ -->
    <script src="{{ asset('admin/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('admin/js/wave/wave-active.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="{{ asset('admin/js/data-table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/data-table/data-table-act.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>

</html>