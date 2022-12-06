<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Form Input Data | Notika - Notika Admin Template</title>
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
										<h2>Form Components</h2>
										<p>Welcome to PDAM TOYO </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Form Element area Start-->
    <div class="form-element-area">
        <div class="container">
        <form method="POST" action="{{ route('superadmin.table.district.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        <label>Nama Kecamatan</label>
                                        <input type="text" name="name" class="form-control" required="required" data-validation-required-message="Silahkan Masukkan Data" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        <label>Kode Pos</label>
                                        <input type="number" name="postal_code" class="form-control" required="required" data-validation-required-message="Silahkan Masukkan Data" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-default btn-icon-notika col-md-2">
                            <i class="notika-icon notika-left-arrow"></i> 
                            <a href="{{ url('/superadmin/table/district/index') }}" style="color:black;">BACK</a>
                        </button>
                        <button class="btn btn-default btn-icon-notika col-md-2" style="float: right;">                
                            SEND
                            <i class="notika-icon notika-right-arrow"></i> 
                        </button>
                    </div>
                </div>
            </div>
        </form>
    <!-- Form Element area End-->

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