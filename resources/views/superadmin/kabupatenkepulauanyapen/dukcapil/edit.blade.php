@extends('layouts.superadmin.master')

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
                      <h2>Halaman Ubah Data Tabel Dinas Dukcapil</h2>
                      <h2>Kabupaten Kepulauan Yapen <span class="bread-ntd"> </span></h2>
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
        <div class="container">
        <form method="POST" action="{{ route('superadmin.airbersih.kabupatenkepulauanyapen.dukcapil.update', $dukcapil->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:30px;">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        <label>Nama Kota</label>
                                        <input type="text" name="city_id" value="{{ $dukcapil->city->name }}" class="form-control" Disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:30px;">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                      <label>Nama Berkas</label>
                                      <input type="text" name="name" value="{{ $dukcapil->name }}" class="form-control" required="required" data-validation-required-message="Silahkan Masukkan Data" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:30px;">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                      <label>Berkas PDF</label>
                                      <input type="file" name="file" value="{{ $dukcapil->file }}" class="form-control" >
                                      </br>
                                      <iframe width="550px" width="250px" src="{{asset('storage/'.$dukcapil->file)}}"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:30px;">
                                <div class="form-group ic-cmp-int">
                                    <div class="nk-int-st">
                                        <label>Tampil Pada Halaman Website</label>
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select class="selectpicker" name="show" value="{{($dukcapil->show)}}" data-live-search="true">
                                            <option value="Yes" @if(old('show', $dukcapil->show) === 'Yes')  'selected' @endif>Menampilkan</option>
                                            <option value="No" @if(old('show', $dukcapil->show) === 'No')  'selected' @endif>Tidak Menampilkan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-default btn-icon-notika col-md-2" style="float: right;">                
                            SEND
                            <i class="notika-icon notika-right-arrow"></i> 
                        </button>
                    </div>
                </div>
            </div>
        </form>
    <!-- Form Element area End-->
@endsection