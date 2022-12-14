@extends('layouts.subadmin.beranda')

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
                                        <h2>Data Tabel Balai Wilayah Sungai (BWS)</h2>
                                        <h2>Kabupaten Kepulauan Yapen <span class="bread-ntd"> </span></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                                    <a href="{{url('/subadmin/airbersih/kabupaten/kepulauanyapen/riverintake/create')}}" type="button" data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" class="btn"><b>Buat Data Baru</b></a>
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
                                        <th class="text-center" width="auto">Kecamatan</th>
                                        <th class="text-center" width="auto">Nama</th>
                                        <th class="text-center" width="auto">Menampilkan</th>
                                        <th class="text-center" width="auto">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($riverintake as $r)
                                    <tr>
                                        <td class="text-center">{{ $r -> city -> name }}</td>
                                        <td class="text-center">{{ $r -> district -> name }}</td>
                                        <td class="text-center"><p><a href="{{ asset ('storage/'.$r->file)}}" target="_blank">{{ $r->name }}</a>.</p></td>
                                        <td class="text-center">
											<span>
												@if ($r->show == 'Yes')
													<span>Menampilkan</span>
												@else
													<span>Tidak Menampilkan</span>
												@endif
											</span>
										</td>
                                        <div class="row">
                                            <td class="text-center">
                                                <div class="col-lg-6">
                                                    <a href="{{ route('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.edit', $r->id) }}" class="btn notika-btn-black" style="color:white;"><i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <form action="{{ route('subadmin.airbersih.kabupatenkepulauanyapen.riverintake.destroy', $r->id) }}" method="POST" class="d-inline">
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
                                        <th class="text-center" width="auto">Kota/Kabupaten</th>
                                        <th class="text-center" width="auto">Kecamatan</th>
                                        <th class="text-center" width="auto">Nama</th>
                                        <th class="text-center" width="auto">Menampilkan</th>
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