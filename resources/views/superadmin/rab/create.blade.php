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
    <style>
        .input-transparent{
            border: none !important;
            background: transparent !important;
        }

        td{
            background-color: white !important;
        }

        .my-row{
            color: red;
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
                                        <li><a href="{{ url ('/superadmin/table/village/index') }}">Tabel Desa / Kelurahan</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/population/index') }}">Tabel Populasi</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/riverintake/index') }}">Tabel Intake Sungai</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/waterwell/index')}}">Tabel Sumur</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/watertank/index') }}">Tabel Tampungan Air</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/municipalwaterwork/index') }}">Tabel PDAM</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/waterspring/index') }}">Tabel Mata Air</a>
                                        </li>
                                        <li><a href="{{ url ('/superadmin/table/file/index') }}">Tabel Berkas</a>
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
                                <li><a href="{{ url ('/superadmin/table/village/index') }}">Tabel Desa / Kelurahan</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/population/index') }}">Tabel Populasi</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/riverintake/index') }}">Tabel Intake Sungai</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/waterwell/index')}}">Tabel Sumur</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/watertank/index') }}">Tabel Tampungan Air</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/municipalwaterwork/index') }}">Tabel PDAM</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/waterspring/index') }}">Tabel Mata Air</a>
                                </li>
                                <li><a href="{{ url ('/superadmin/table/file/index') }}">Tabel Berkas</a>
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
            <form method="POST" action="{{ route('superadmin.rab.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="data-table-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="data-table-list">
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-2">
                                          <label for="judul_pekerjaan">Judul Pekerjaan : </label>
                                        </div>
                                        <div class="col-md-3">
                                          <input type="text" name="judul_pekerjaan" class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data-table-basic" class="table table-striped form-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="80px">No</th>
                                                    <th class="text-center" width="auto">Uraian Pekerjaan</th>
                                                    <th class="text-center" width="auto">Volume</th>
                                                    <th class="text-center" width="auto">Harga Satuan (Rp)</th>
                                                    <th class="text-center" width="auto">Jumlah Harga (Rp)</th>
                                                    <th class="text-center" width="auto">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="kategori-A">
                                                    <td>
                                                        <input type="text" class="form-control input-transparent" value="A" name="kode_kategori_pekerjaan[]" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="" name="nama_kategori_pekerjaan[]" placeholder="Kategori Uraian Pekerjaan" required>
                                                    </td>
                                                </tr>
                                                <tr class="kategori-A">
                                                    <td>
                                                        <input type="number" class="form-control input-transparent" value="1" name="number_row_A[]" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control uraian-pekerjaan" value="" name="uraian_pekerjaan_A[]" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control volume" value="" name="volume_A[]" id-row="1" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control harga-satuan" value="" name="harga_satuan_A[]" id-row="1" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control jumlah-harga" value="" name="jumlah_harga_A[]" id-row="1" required readonly>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-danger btn-remove" data-kategori="A" id-row="1"><i class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-success btn-add-row" data-kategori="A"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                                <tr id="rowKategori">
                                                    <td><button type="button" class="btn btn-success btn-add-kategori"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/superadmin/rab/') }}" style="color:black;" class="btn btn-default btn-icon-notika col-md-2"><i class="notika-icon notika-left-arrow"></i> BACK</a>
                        <button class="btn btn-default btn-icon-notika col-md-2" style="float: right;">                
                            SEND
                            <i class="notika-icon notika-right-arrow"></i> 
                        </button>
                    </div>
                </div>    
            </form>
    </div>
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

    <script>
        let countRow = {'A': 1};
        let id_row = 1;
        let kategori = 'A';

        function btnFunction(){
            $(".btn-remove").click(function(){
                let kodeKategori = this.getAttribute("data-kategori");
                let countedRow = $(".kategori-"+kodeKategori+"").length;
                let olderKey = Object.keys(countRow)[0];
                let rowLength = Object.keys(countRow).length;
                let charCodeX = kodeKategori.charCodeAt(0);
                let charCodeY = olderKey.charCodeAt(0);
                $(this).closest("tr").remove();
                // alert((kodeKategori > olderKey)+"|"+rowLength+"|"+countedRow);
                if((kodeKategori > olderKey) && rowLength > 1 && countedRow == 2){
                    $(".kategori-"+kodeKategori+"").remove();
                    delete countRow[kodeKategori];
                    kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                }
                // if((kodeKategori > olderKey) && rowLength > 1 && countedRow > 2){
                //     // $(".kategori-"+kodeKategori+"").remove();
                //     // delete countRow[kodeKategori];
                //     // kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                //     $(this).closest("tr").remove();
                // }else{
                //     $(this).closest("tr").remove();
                //     Object.keys(countRow).forEach(function(val){
                //       console.log(val);
                //         if(val != 'A'){
                //             $(".kategori-"+kodeKategori+"").remove();
                //             delete countRow[kodeKategori];
                //         }
                //     });
                // }
                // if((kodeKategori > latestKey) && rowLength > 1 && countedRow > 2){
                //     $(".kategori-"+kodeKategori+"").remove();
                //     delete countRow[kodeKategori];
                //     kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                // }else if((kodeKategori < latestKey) && rowLength > 1 && countedRow > 2){
                //     $(this).closest("tr").remove();
                //     Object.keys(countRow).forEach(function(val){
                //         if(val != 'A'){
                //             $(".kategori-"+kodeKategori+"").remove();
                //             delete countRow[kodeKategori];
                //             kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                //         }
                //     })
                // }
            })

            $(".btn-add-row").unbind("click").bind("click", function(){
                ++countRow[kategori];
                let curKategori = this.getAttribute("data-kategori");
                ++id_row;
                let row = '<tr class="kategori-'+curKategori+'">'+
                            '<td><input type="number" class="form-control input-transparent no-data" value="'+countRow[kategori]+'" name="number_row_'+curKategori+'[]" readonly></td>'+
                            '<td><input type="text" class="form-control uraian-pekerjaan" value="" name="uraian_pekerjaan_'+curKategori+'[]" required></td>'+
                            '<td><input type="text" class="form-control volume" value="" name="volume_'+curKategori+'[]" id-row="'+id_row+'" required></td>'+
                            '<td><input type="text" class="form-control harga-satuan" value="" name="harga_satuan_'+curKategori+'[]" id-row="'+id_row+'" required></td>'+
                            '<td><input type="text" class="form-control jumlah-harga" value="" name="jumlah_harga_'+curKategori+'[]" id-row="'+id_row+'" required readonly></td>'+
                            '<td class="text-center">'+
                                '<button type="button" class="btn btn-danger btn-remove" data-kategori="'+curKategori+'" id-row="'+id_row+'"><i class="fa fa-trash"></i></button>'+
                                ' <button type="button" class="btn btn-success btn-add-row" data-kategori="'+curKategori+'"><i class="fa fa-plus"></i></button>'+
                            '</td>'+
                        '</tr>';
                // $(".form-table.kategori-"+curKategori+"").last().append(row);
                $(row).insertAfter(".form-table .kategori-"+curKategori+":last");
                // $(".form-table .kategori-A:last").insertAfter();
                btnFunction();
            });

            $("#rowKategori").unbind("click").bind("click", function(){
                kategori = String.fromCharCode(kategori.charCodeAt(0) + 1);
                countRow[kategori] = 1;
                ++id_row;
                let row = '<tr class="kategori-'+kategori+'"><td><input type="text" class="form-control input-transparent" value="'+kategori+'" name="kode_kategori_pekerjaan[]" readonly></td>'+
                            '<td><input type="text" class="form-control" value="" name="nama_kategori_pekerjaan[]" placeholder="Kategori Uraian Pekerjaan" required></td>'+
                            '</tr>'+
                            '<tr class="kategori-'+kategori+'">'+
                            '<td><input type="number" class="form-control input-transparent no-data" value="'+countRow[kategori]+'" name="number_row_'+kategori+'[]" readonly></td>'+
                            '<td><input type="text" class="form-control uraian-pekerjaan" value="" name="uraian_pekerjaan_'+kategori+'[]" required></td>'+
                            '<td><input type="text" class="form-control volume" value="" name="volume_'+kategori+'[]" id-row="'+id_row+'" required></td>'+
                            '<td><input type="text" class="form-control harga-satuan" value="" name="harga_satuan_'+kategori+'[]" id-row="'+id_row+'" required></td>'+
                            '<td><input type="text" class="form-control jumlah-harga" value="" name="jumlah_harga_'+kategori+'[]" id-row="'+id_row+'" required readonly></td>'+
                            '<td class="text-center">'+
                                '<button type="button" class="btn btn-danger btn-remove" data-kategori="'+kategori+'" id-row="'+id_row+'"><i class="fa fa-trash"></i></button>'+
                                ' <button type="button" class="btn btn-success btn-add-row" data-kategori="'+kategori+'"><i class="fa fa-plus"></i></button>'+
                            '</td>'+
                        '</tr>';
                $(row).insertBefore("#rowKategori");
                btnFunction();
            })

            $(".harga-satuan").keyup(function(){
                let idRow = this.getAttribute("id-row");
                let volume = $(".volume[id-row="+idRow+"]").val().split(" ")[0];
                this.value = formatRupiah(this.value);
                let hasil = volume * Number(this.value.split(".").join(""));
                $(".jumlah-harga[id-row="+idRow+"]").val(formatRupiah(String(hasil)));
            });

            $(".volume").keyup(function(){
                let idRow = this.getAttribute("id-row");
                let harga_satuan = $(".harga-satuan[id-row="+idRow+"]").val().split(".")[0];
                let volume = this.value.split(" ")[0];
                let hasil = harga_satuan * volume;
                $(".jumlah-harga[id-row="+idRow+"]").val(formatRupiah(String(hasil)));
            });


        }

        btnFunction();
        
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
            }
    </script>
</body>

</html>