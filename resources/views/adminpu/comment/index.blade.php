@extends('layouts.adminpu.master')

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
									    <h2>Data Tabel Kritik Dan Saran</h2>
										<h2>Provinsi Papua <span class="bread-ntd"> </span></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
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
                                        <th class="text-center" width="auto">ID</th>
                                        <th class="text-center" width="auto">Nama Pengguna</th>
                                        <th class="text-center" width="auto">Nomer Telepon</th>
                                        <th class="text-center" width="auto">Email</th>
                                        <th class="text-center" width="auto">Kritik Dan Saran</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($comment as $c)
                                    <tr>
                                        <td class="text-center">{{ $c->id }}</td>
                                        <td class="text-center">{{ $c->name }}</td>
                                        <td class="text-center">{{ $c->telp_number }}</td>
                                        <td class="text-center">{{ $c->email }}</td>
                                        <td class="text-center">{{ $c->description }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center" width="auto">ID</th>
                                        <th class="text-center" width="auto">Nama Pengguna</th>
                                        <th class="text-center" width="auto">Nomer Telepon</th>
                                        <th class="text-center" width="auto">Email</th>
                                        <th class="text-center" width="auto">Kritik Dan Saran</th>
                                      
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