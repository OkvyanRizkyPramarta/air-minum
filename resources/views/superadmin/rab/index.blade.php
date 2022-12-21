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
										<h2>Data Tabel RAB</h2>
										<h2>Provinsi Papua<span class="bread-ntd"></span></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                                    <a href="{{url('/superadmin/rab/create')}}" type="button" data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" class="btn"><b>Buat Data Baru</b></a>
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
                                        <th class="text-center" width="auto">Pekerjaan</th>
                                        <th class="text-center" width="auto">Tahun Anggaran</th>
                                        <th class="text-center" width="auto">Total Cost</th>
                                        <th class="text-center" width="220px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($rab as $w)
                                    <tr>
                                        <td class="text-center">{{ $w->pekerjaan }}</td>
                                        <td class="text-center">{{ $w->tahun_anggaran }}</td>
                                        <td class="text-center">Rp. {{ number_format($w->total_cost,0, 0,'.') }}</td>
                                        <div class="row">
                                            <td class="text-center">
                                                <div class="form-group">
                                                    <a href="{{ route('superadmin.rab.edit', $w->kode_rab) }}" class="btn notika-btn-black" style="color:white;"><i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div>
                                                    <form action="{{ route('superadmin.rab.destroy', $w->kode_rab) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                        Delete</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <a href="{{ route('superadmin.rab.detail', $w->kode_rab) }}" class="btn notika-btn-blue" style="color: white;" target="_blank"><i class="fa fa-info"></i>
                                                        Detail
                                                    </a>
                                                </div>
                                            </td>
                                        </div>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center" width="auto">Pekerjaan</th>
                                        <th class="text-center" width="auto">Tahun Anggaran</th>
                                        <th class="text-center" width="auto">Total Cost</th>
                                        <th class="text-center" width="auto">Action</th>
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