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
                    <h2>Halaman Ubah Data Tabel Usulan Teknis</h2>
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
            <form method="POST" action="{{ route('superadmin.rab.update') }}" enctype="multipart/form-data">
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
                                          <input type="text" name="judul_pekerjaan" class="form-control" value="{{$rab->pekerjaan}}">
                                          <input type="hidden" name="kode_rab" value="{{$rab->kode_rab}}">
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
                                              <?php $id_row = 1 ?>
                                                @foreach($detail_rab->unique("kode_kategori_pekerjaan") as $k)
                                                <tr class="kategori-{{$k->kode_kategori_pekerjaan}}">
                                                    <td>
                                                        <input type="text" class="form-control input-transparent" value="{{$k->kode_kategori_pekerjaan}}" name="kode_kategori_pekerjaan[]" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="{{$k->nama_kategori_pekerjaan}}" name="nama_kategori_pekerjaan[]" placeholder="Kategori Uraian Pekerjaan" required>
                                                    </td>
                                                </tr>
                                                @foreach($detail_rab as $dr)
                                                  @if($dr->kode_kategori_pekerjaan == $k->kode_kategori_pekerjaan)
                                                  <?php ++$id_row?>
                                                  <tr class="kategori-{{$k->kode_kategori_pekerjaan}}">
                                                    <td>
                                                        <input type="number" class="form-control input-transparent" value="{{$dr->number_row}}" name="number_row_{{$k->kode_kategori_pekerjaan}}[]" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control uraian-pekerjaan" value="{{$dr->uraian_pekerjaan}}" name="uraian_pekerjaan_{{$k->kode_kategori_pekerjaan}}[]" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control volume" value="{{$dr->volume}}" name="volume_{{$k->kode_kategori_pekerjaan}}[]" id-row="{{$id_row}}" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control harga-satuan" value="{{number_format($dr->harga_satuan, 0, ',', '.')}}" name="harga_satuan_{{$k->kode_kategori_pekerjaan}}[]" id-row="{{$id_row}}" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control jumlah-harga" value="{{number_format($dr->jumlah_harga, 0, ',', '.')}}" name="jumlah_harga_{{$k->kode_kategori_pekerjaan}}[]" id-row="{{$id_row}}" required readonly>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-danger btn-remove" data-kategori="A"><i class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-success btn-add-row" data-kategori="{{$k->kode_kategori_pekerjaan}}"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                                  @endif
                                                @endforeach
                                                @endforeach
                                                <tr id="rowKategori">
                                                    <td><button type="button" class="btn btn-success btn-add-kategori"><i class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="form-group">
                                      <label for="#inputFile">Pilih Berkas ( pdf/gambar )</label>
                                      <input type="file" class="form-control" name="file" id="inputFile">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/superadmin/rab') }}" style="color:black;" class="btn btn-default btn-icon-notika col-md-2"><i class="notika-icon notika-left-arrow"></i> BACK</a>
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
        
        let countRow = JSON.parse("{{$obj}}".split("&quot;").join('"'));
        let id_row = {{$id_row}};
        let kategori = $(".btn-add-row:last").attr("data-kategori");
        
        function btnFunction(){

            $(".btn-remove").click(function(){
                let kodeKategori = this.getAttribute("data-kategori");
                let countedRow = $(".kategori-"+kodeKategori+"").length -1;
                let latestKey = Object.keys(countRow)[Object.keys(countRow).length-1];
                let rowLength = Object.keys(countRow).length;
                if(kodeKategori > 'A'){
                  if(rowLength > 1 && countedRow > 1){
                    $(this).closest("tr").remove();
                  }else{
                    $(".kategori-"+kodeKategori+"").remove();
                    delete countRow[kodeKategori];
                    kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                  }
                }else{
                  let countRow = $(".kategori-"+kodeKategori).length - 1;
                  if(countRow > 1){
                    $(this).closest("tr").remove();
                  }
                }
                // if((kodeKategori > latestKey) && rowLength > 1 && countedRow == 2){
                //     $(".kategori-"+kodeKategori+"").remove();
                //     delete countRow[kodeKategori];
                //     kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                // }else{
                //   $(this).closest("tr").remove();
                // }
                // if((kodeKategori > latestKey) && rowLength > 1 && countedRow > 2){
                //     $(".kategori-"+kodeKategori+"").remove();
                //     delete countRow[kodeKategori];
                //     kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                // }else if((kodeKategori < latestKey) && rowLength > 1 && countedRow > 2 && kodeKategori != 'A'){
                //     $(this).closest("tr").remove();
                //     Object.keys(countRow).forEach(function(val){
                //         if(val != 'A'){
                //             $(".kategori-"+kodeKategori+"").remove();
                //             delete countRow[kodeKategori];
                //             kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                //         }
                //     })
                //     $(".kategori-"+kodeKategori+"").remove();
                //       delete countRow[kodeKategori];
                //       kategori = String.fromCharCode(kategori.charCodeAt(0) - 1);
                // }
            })

            $(".btn-add-row").unbind("click").bind("click", function(){
                let curKategori = this.getAttribute("data-kategori");
                ++countRow[curKategori];
                ++id_row;
                let row = '<tr class="kategori-'+curKategori+'">'+
                            '<td><input type="number" class="form-control input-transparent no-data" value="'+countRow[curKategori]+'" name="number_row_'+curKategori+'[]" readonly></td>'+
                            '<td><input type="text" class="form-control uraian-pekerjaan" value="" name="uraian_pekerjaan_'+curKategori+'[]" required></td>'+
                            '<td><input type="text" class="form-control volume" value="" name="volume_'+curKategori+'[]" id-row="'+id_row+'" required></td>'+
                            '<td><input type="text" class="form-control harga-satuan" value="" name="harga_satuan_'+curKategori+'[]" id-row="'+id_row+'" required></td>'+
                            '<td><input type="text" class="form-control jumlah-harga" value="" name="jumlah_harga_'+curKategori+'[]" id-row="'+id_row+'" required readonly></td>'+
                            '<td class="text-center">'+
                                '<button type="button" class="btn btn-danger btn-remove" data-kategori="'+curKategori+'"><i class="fa fa-trash"></i></button>'+
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
                            '<td><input type="text" class="form-control jumlah-harga" value="" name="jumlah_harga_'+kategori+'[]" id-row="'+id_row+'" required></td>'+
                            '<td class="text-center">'+
                                '<button type="button" class="btn btn-danger btn-remove" data-kategori="'+kategori+'"><i class="fa fa-trash"></i></button>'+
                                ' <button type="button" class="btn btn-success btn-add-row" data-kategori="'+kategori+'"><i class="fa fa-plus"></i></button>'+
                            '</td>'+
                        '</tr>';
                $(row).insertBefore("#rowKategori");
                btnFunction();
            });

            $(".harga-satuan").keyup(function(){
                let idRow = this.getAttribute("id-row");
                let volume = $(".volume[id-row="+idRow+"]").val().split(" ")[0];
                this.value = formatRupiah(this.value);
                let hasil = volume * Number(this.value.split(".").join(""));
                $(".jumlah-harga[id-row="+idRow+"]").val(formatRupiah(String(hasil)));
            });

            $(".volume").keyup(function(){
                let idRow = this.getAttribute("id-row");
                let harga_satuan = $(".harga-satuan[id-row="+idRow+"]").val().split(".").join("");
                let volume = this.value.split(" ")[0];
                let hasil = Number(harga_satuan) * volume;
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

          function resetNumbering(){

          }
    </script>
@endsection