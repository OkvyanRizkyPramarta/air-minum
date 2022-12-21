<!DOCTYPE html>
<html>
<head>
	<title>RAB PUPRPKP PAPUA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}"> -->
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        td{
            background-color: white;
        }

        .input-transparent{
            background: transparent;
            border: none;
        }
	</style>
	<center>
		<h2>Perusahaan Air Minum</h2>
	</center>
 
	<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4 for="judul_pekerjaan">Judul Pekerjaan : {{$rab->pekerjaan}}</h4>
                                    <h4 for="">Tahun Anggaran : {{$rab->tahun_anggaran}}</h4>
                                </div>
                                <!-- <div class="col-md-7 text-right">
                                    <button class="btn btn-primary" id="export">Export PDF</button>
                                </div> -->
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
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($detail_rab->unique("kode_kategori_pekerjaan") as $k)
                                    <tr class="kategori-{{$k->kode_kategori_pekerjaan}}">
                                        <td class="text-center"><b>{{$k->kode_kategori_pekerjaan}}</b></td>
                                        <td ><b>{{$k->nama_kategori_pekerjaan}}</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                        @foreach($detail_rab as $dr)
                                            @if($dr->kode_kategori_pekerjaan == $k->kode_kategori_pekerjaan)
                                            <tr>
                                                <td class="text-center">{{$dr->number_row}}</td>
                                                <td>{{$dr->uraian_pekerjaan}}</td>
                                                <td class="text-center">{{$dr->volume}}</td>
                                                <td class="text-right">Rp. {{number_format($dr->harga_satuan, 0, ',', '.')}}</td>
                                                <td class="text-right">Rp. {{number_format($dr->jumlah_harga, 0, ',', '.')}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row float-right">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <table>
                        <tr>
                            <th>Real Cost</th>
                            <th style="padding-left: 100px; white-space: nowrap;">Rp. {{number_format($rab->real_cost, 0, ',', '.')}}</th>
                        </tr>
                        <tr>
                            <th>PPN(11%)</th>
                            <th style="padding-left: 100px; white-space: nowrap;">Rp. {{number_format($rab->ppn, 0, ',', '.')}}</th>
                        </tr>
                        <tr>
                            <th>Total Cost</th>
                            <th style="padding-left: 100px; white-space: nowrap;">Rp. {{number_format($rab->total_cost, 0, ',', '.')}}</th>
                        </tr>
                        <tr>
                            <th>Dibulatkan</th>
                            <th style="padding-left: 100px; white-space: nowrap;">Rp. {{number_format(round($rab->total_cost, 2), 0, ',', '.')}}</th>
                        </tr>
                    </table>
                </div>
               
            </div>
            <!-- <a href="{{ url('/superadmin/rab') }}" style="color:black;" class="btn btn-default btn-icon-notika col-md-2"><i class="notika-icon notika-left-arrow"></i> BACK</a>
            <button class="btn btn-default btn-icon-notika col-md-2" style="float: right;">                
                SEND
                <i class="notika-icon notika-right-arrow"></i> 
            </button> -->
        </div>
    </div>
    <!-- <object data="" type="{{$content_type}}"></object> -->
    <!-- <object width="100%" height="650" type="{{$content_type}}" data="{{asset('storage/'.$rab->file)}}" id="pdf_content" style="pointer-events: none;">
        <p>Insert your error message here, if the PDF cannot be displayed.</p>
    </object> -->

</body>
</html>

@if($berkas_type != "application/pdf")
<div>
    <img src="{{public_path().'/storage/'.$rab->file}}" alt="">
</div>
@endif
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#export').click(function () {
        doc.fromHTML($('html').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('{{$rab->kode_rab}}.pdf');
    }); -->
</script>