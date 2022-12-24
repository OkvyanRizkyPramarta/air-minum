@extends('layouts.superadmin.beranda')
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
										<h2>Data Tabel Usulan Teknis</h2>
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
                                                <div class="form-group">
                                                    <a href="{{ route('superadmin.rab.detail', $w->kode_rab) }}" class="btn notika-btn-blue" style="color: white;" target="_blank"><i class="fa fa-info"></i>
                                                        Detail
                                                    </a>
                                                </div>
                                                <div class="form-group">
                                                    <a href="/superadmin/rab/upload/{{$w->kode_rab}}" class="btn notika-btn-green btn-berkas" style="color: white;"><i class="fa fa-file"></i>
                                                    Berkas
                                                    </a>
                                                    <!-- <button type="button" class="btn notika-btn-green btn-berkas" data-id="{{$w->kode_rab}}" data-toggle="modal" data-target="#myModalone" style="color: white;"><i class="fa fa-file"></i>
                                                    Berkas
                                                    </button> -->
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
    <div class="modal fade in" id="myModalone" role="dialog" style="">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <form action="#" class="" enctype="multipart/form-data" id="formBerkas" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <h2>Attachment</h2>
                        <hr>
                            <div class="form-group">
                                <label for="#pilihBerkas">Pilih Berkas</label>
                                <input type="file" class="form-control" name="file" id="pilihBerkas">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-default waves-effect">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section("script")
<script>
    $(".btn-berkas").click(function(){
        let id_rab = this.getAttribute("data-id");
        let url = "/superadmin/rab/upload/"+id_rab;
        $("#formBerkas").attr("action", url);
    });
</script>
@endsection