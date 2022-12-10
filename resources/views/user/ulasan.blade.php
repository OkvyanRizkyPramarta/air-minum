@extends('layouts.user.master')

@section('content')
    <!-- banner section start -->
    <div class="banner_section layout_padding" style="padding-top:-300px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="padding-top:30px;">
            <h1 class="banner_taital text-center" style="color:white;">Ulasan Sistem Informasi Provinsi Papua</h1>
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
            <h1 class="" style="color:#10597D;"><img src="{{ asset('user/images/profile.jpg') }}" style="height:40px;border-radius:50%;"> &nbsp; {{($c->name)}} <br></h1>
            <p class="tempor_text" style="color:color;color:black;padding-left:11%;padding-bottom:10%;">
              {{($c->description)}}
            </p>
          </div> 
        </div>
      </div>
    </div>
    @endforeach
    <!-- newsletter section end -->

@endsection