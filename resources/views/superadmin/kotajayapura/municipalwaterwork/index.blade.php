
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
                                        <h2>Data Tabel PDAM</h2>
										<h2>Provinsi Papua <span class="bread-ntd"> </span></h2>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
                                    <a href="{{url('/superadmin/table/municipalwaterwork/create')}}" type="button" data-toggle="tooltip" style="background-color:white; color:black;" data-placement="left" class="btn"><b>Buat Data Baru</b></a>
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
                                        <th class="text-center" width="auto">ID PDAM</th>
                                        <th class="text-center" width="auto">Nama</th>
                                        <th class="text-center" width="auto">Wilayah</th>
                                        <th class="text-center" width="auto">Koord X (KM<sup>2</sup>)</th>
                                        <th class="text-center" width="auto">Koord Y (KM<sup>2</sup>)</th>
                                        <th class="text-center" width="auto">Elevasi (mdpl)</th>
                                        <th class="text-center" width="auto">Terpasang L/d</th>
                                        <th class="text-center" width="auto">Operasi L/d</th>
                                        <th class="text-center" width="auto">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($municipalwaterwork as $m)
                                    <tr>
                                        <td class="text-center">{{ $m->id }}</td>
                                        <td class="text-center">{{ $m->name }}</td>
                                        <td class="text-center">{{ $m->area }}</td>
                                        <td class="text-center">{{ $m->koord_x }}</td>
                                        <td class="text-center">{{ $m->koord_y }}</td>
                                        <td class="text-center">{{ $m->elevasi_mdpl }}</td>
                                        <td class="text-center">{{ $m->installed }}</td>
                                        <td class="text-center">{{ $m->operation }}</td>
                                        <div class="row">
                                            <td class="text-center">
                                                <div class="col-lg-6">
                                                    <a href="" class="btn notika-btn-black" style="color:white;"><i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <form action="" method="POST" class="d-inline">
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
                                        <th class="text-center" width="auto">ID</th>
                                        <th class="text-center" width="auto">Nama Kota</th>
                                        <th class="text-center" width="auto">Nama</th>
                                        <th class="text-center" width="auto">File</th>
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