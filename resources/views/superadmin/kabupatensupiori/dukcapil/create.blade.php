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
                      <h2>Halaman Tambah Data Tabel Dinas Dukcapil</h2>
                      <h2>Kabupaten Supiori <span class="bread-ntd"> </span></h2>
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
        <form method="POST" action="{{ route('superadmin.airbersih.kabupatensupiori.dukcapil.store') }}" enctype="multipart/form-data">
        @csrf
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
                                        <input type="text" name="city_id" value="Kabupaten Supiori" class="form-control" required="required" data-validation-required-message="Silahkan Masukkan Data" Disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:30px;">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                      <label>Nama Berkas</label>
                                      <input type="text" name="name" class="form-control" required="required" data-validation-required-message="Silahkan Masukkan Data" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:30px;">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        <label>Berkas PDF</label>
                                        <input type="file" name="file" class="form-control" required="required" data-validation-required-message="Silahkan Masukkan Data" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:30px;">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                    </div>
                                    <div class="nk-int-st">
                                        <label>Tampil Pada Halaman Website</label>
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select class="selectpicker" name="show" data-live-search="true">
                                                <option value="Yes">Tampil</option>
                                                <option value="No">Tidak Tampil</option>
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
      </div>
    </div>
    <!-- Form Element area End-->
@endsection