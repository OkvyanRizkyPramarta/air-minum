@extends('layouts.superadmin.master')
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
                    <h2>Halaman Tambah Berkas Usulan Teknis</h2>
										<h2>Provinsi Papua<span class="bread-ntd"></span></h2>
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
            <form method="POST" action="{{ route('superadmin.rab.upload_file', $rab->kode_rab) }}" enctype="multipart/form-data">
                @csrf
                <div class="data-table-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="data-table-list">
                                    <div class="form-group">
                                      <div class="row">
                                        <div class="col-md-2">
                                          <label for="judul_pekerjaan">Attachment/Berkas</label>
                                        </div>
                                      </div>
                                    </div>
                                          <hr>
                                    <div class="form-group">
                                        <label for="#pilihBerkas">Pilih Berkas</label>
                                        <input type="file" class="form-control" id="pilihBerkas" name="file" required>
                                        @if($rab->file != "none")
                                        <iframe src="{{asset('storage/'.$rab->file)}}" type="{{$content_type}}" frameborder="0" width="50%" height="350px">
                                            Berkas tidak ditemukan
                                        </iframe>
                                        @endif
                                    </div>
                                    <!-- <div class="table-responsive">
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
                                    </div> -->
                                    <!-- <div class="form-group">
                                      <label for="#inputFile">Pilih Berkas ( pdf/gambar )</label>
                                      <input type="file" class="form-control" name="file" id="inputFile" required>
                                    </div> -->
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
    </script>
@endsection