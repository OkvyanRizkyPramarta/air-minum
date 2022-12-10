@extends('layouts.user.master')

@section('content')
    <!-- banner section start -->
    <div class="banner_section layout_padding" style="padding-top:-300px;">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2 class="banner_taital" style="color:white;">SISTEM INFORMASI DATABASE</h2>
            <h1 class="banner_taital" style="color:white;">AIR MINUM Provinsi Papua</h1>
          </div>
          <div class="col-sm-3">
            <div>
              <img src="{{ asset('user/images/pemerintah_papua.png') }} " style="height:200px;padding-left:50px;">
            </div>
          </div>
          <div class="col-sm-2">
            <div>
              <img src="{{ asset('user/images/pu_papua.png') }}" style="height:200px;">
            </div>
        </div>
      </div>
    </div>
    <!-- banner section end -->
    </div>
    </div>
    </div>
    <!-- header section end -->
    <!-- newsletter section start -->
    <h1 class="banner_taital text-center" style="color:#10597D;padding-bottom:10%;">Ulasan</h1>
    @foreach($comment as $c )
    <div class="" style="background-color:white;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="" style="color:#10597D;"><img src="{{ asset('user/images/profile.jpg') }}" style="height:40px;border-radius:50%;"> &nbsp; {{($c->name)}}</h1>
            <p class="tempor_text" style="color:black;padding-left:11%;padding-top:4%;">
              {{($c->description)}}
            </p>
          </div> 
        </div>
      </div>
    </div>
    @endforeach
    <!-- newsletter section end -->

@endsection