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
                                        <h2> Data Tabel Dinas Dukcapil</h2>
										<h2> Kabupaten Waropen <span class="bread-ntd"> </span></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                                    <a href="{{url('/superadmin/airbersih/kabupaten/waropen/dukcapil/create')}}" type="button" data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" class="btn"><b>Buat Data Baru</b></a>
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
                                        <th class="text-center" width="auto">Nama</th>
                                        <th class="text-center" width="auto">Menampilkan</th>
                                        <th class="text-center" width="auto">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dukcapil as $d)
                                    <tr>
                                        <td class="text-center">{{ $d -> city -> name }}</td>
                                        <td class="text-center"><p><a href="{{ asset ('storage/'.$d->file)}}" target="_blank">{{ $d->name }}</a>.</p></td>
                                        <td class="text-center">
											<span>
												@if ($d->show == 'Yes')
													<span>Menampilkan</span>
												@else
													<span>Tidak Menampilkan</span>
												@endif
											</span>
										</td>
                                        <div class="row">
                                            <td class="text-center">
                                                <div class="col-lg-6">
                                                    <a href="{{ route('superadmin.airbersih.kabupatenwaropen.dukcapil.edit', $d->id) }}" class="btn notika-btn-black" style="color:white;"><i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <form action="{{ route('superadmin.airbersih.kabupatenwaropen.dukcapil.destroy', $d->id) }}" method="POST" class="d-inline">
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