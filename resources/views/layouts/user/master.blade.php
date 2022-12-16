<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>PU Papua</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content=""> 
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}">
<!-- Responsive-->
<link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="{{ asset('user/css/jquery.mCustomScrollbar.min.css') }}">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('user/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style>
.dropbtn {
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}

.nav-list{
  font-size:1.5vw;
  padding-right:15px;
  color:white !important;
}

.parent {
    display: block;
    position: relative;
    float: left;
    line-height: 30px;
    z-index: 1;
}

.parent a {
    margin: 10px;
    color: #000;
    text-decoration: none;
}

.parent:hover>ul {
    display: block;
    position: absolute;
}

.child {
    display: none;
    background-color: white;
}

.child li {
    background-color: none;
    line-height: 50px;
    border-bottom: #CCC 1px solid;
    width: 100%;
    white-space: nowrap;
}
.child li a {
    color: #000;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0px;
    min-width: 10em;
}

ul ul ul {
    left: 100%;
    top: 0;
}

li:hover {
    background-color: none;
}

.parent li:hover {
    background-color: #4287f5;
    cursor: pointer;
}

.expand {
    font-size: 12px;
    float: right;
    margin-right: 5px;
}

#menu .parent > li a{
  color: #000 !important;
  font-size: 1vw;
}

.scrollable-dropdown{
  /* overflow-x:scroll; */
  overflow-y: visible;
  max-width: 100%;
  /* height: 200px; */
}

</style>
</head>
<body>
<!--header section start -->
  <div class="header_section" style="background-image:url({{url('user/images/TelukCenderawasih.jpg')}})">
      <div class="container">
        <div class="row">
          <div class="col-sm-2 col-md-2">
            <div><img src="{{ asset('user/images/pemerintah_papua.png') }}" style="" width="100px;"></div>  
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="text-center" style="padding-top:2%">
            <ul id="menu" style="display: flex; justify-content: center;">
                <li class="parent"><a href="{{ url ('/') }}" class="nav-list">Beranda</a></li>
                  <li class="parent"><a href="#" class="nav-list">Capaian Air Bersih</a>
                      <ul class="child scrollable-dropdown">
                          <li class="parent"><a href="#">Kabupaten Biak Numfor<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Balai Wilayah Sungai <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($BwsKabupatenBiakNumfor as $bkbn)
                                    <li><a href="/showFile/{{encrypt($bkbn->file)}}" target="_blank">{{$bkbn->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>PDAM <span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($PdamKabupatenBiakNumfor as $pkbn)
                                    <li><a href="/showFile/{{encrypt($pkbn->file)}}" target="_blank">{{$pkbn->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Dinas Dukcapil<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($DukcapilKabupatenBiakNumfor as $dkbn)
                                    <li><a href="/showFile/{{encrypt($dkbn->file)}}" target="_blank">{{$dkbn->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Badan Pusat Statistik<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($StatistikKabupatenBiakNumfor as $skbn)
                                    <li><a href="/showFile/{{encrypt($skbn->file)}}" target="_blank">{{$skbn->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                            </ul>
                          </li>
                          <li class="parent"><a href="#">Kabupaten Jayapura<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Dinas PU Bidang Cipta Karya <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($CiptaKaryaKabupatenJayapura as $ckkj)
                                    <li><a href="/showFile/{{encrypt($ckkj->file)}}" target="_blank">{{$ckkj->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>PDAM <span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($PdamKabupatenJayapura as $pkj)
                                    <li><a href="/showFile/{{encrypt($pkj->file)}}" target="_blank">{{$pkj->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Dinas Dukcapil<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($DukcapilKabupatenJayapura as $dkj)
                                    <li><a href="/showFile/{{encrypt($dkj->file)}}" target="_blank">{{$dkj->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Badan Pusat Statistik<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($StatistikKabupatenJayapura as $skj)
                                    <li><a href="/showFile/{{encrypt($skj->file)}}" target="_blank">{{$skj->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                            </ul>
                          </li>
                          <li class="parent"><a href="#">Kabupaten Keerom<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Dinas PU Bidang Cipta Karya <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($CiptaKaryaKabupatenKeerom as $ckkk)
                                    <li><a href="/showFile/{{encrypt($ckkk->file)}}" target="_blank">{{$ckkk->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Badan Pusat Statistik <span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($StatistikKabupatenKeerom as $skk)
                                    <li><a href="/showFile/{{encrypt($skk->file)}}" target="_blank">{{$skk->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                            </ul>
                          </li>
                          <li class="parent"><a href="#">Kab Kepulauan Yapen<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Dinas PU Bidang Cipta Karya <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($CiptaKaryaKabupatenKepulauanYapen as $ckkky)
                                    <li><a href="/showFile/{{encrypt($ckkky->file)}}" target="_blank">{{$ckkky->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>PDAM <span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($PdamKabupatenKepulauanYapen as $pkky)
                                    <li><a href="/showFile/{{encrypt($pkky->file)}}" target="_blank">{{$pkky->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Dinas Dukcapil <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($DukcapilKabupatenKepulauanYapen as $dkky)
                                    <li><a href="/showFile/{{encrypt($dkky->file)}}" target="_blank">{{$dkky->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Badan Pusat Statistik <span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($StatistikKabupatenKepulauanYapen as $skky)
                                    <li><a href="/showFile/{{encrypt($skky->file)}}" target="_blank">{{$skky->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                            </ul>
                          </li>
                          <li class="parent"><a href="#">Kab Mamberamo Raya<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Tidak Ada Data </a>
                                </li>
                            </ul>  
                          </li>
                          <li class="parent"><a href="#">Kabupaten Sarmi<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Dinas PU Bidang Cipta Karya <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($CiptaKaryaKabupatenSarmi as $ckks)
                                    <li><a href="/showFile/{{encrypt($ckks->file)}}" target="_blank">{{$ckks->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Badan Pusat Statistik <span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($StatistikKabupatenSarmi as $sks)
                                    <li><a href="/showFile/{{encrypt($sks->file)}}" target="_blank">{{$sks->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                            </ul>
                          </li>
                          <li class="parent"><a href="#">Kabupaten Supiori<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                          <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Dinas PU Bidang Cipta Karya <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($CiptaKaryaKabupatenSarmi as $ckks)
                                    <li><a href="/showFile/{{encrypt($ckks->file)}}" target="_blank">{{$ckks->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Badan Pusat Statistik <span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($StatistikKabupatenSarmi as $sks)
                                    <li><a href="/showFile/{{encrypt($sks->file)}}" target="_blank">{{$sks->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                            </ul>
                          </li>
                          <li class="parent"><a href="#">Kabupaten Waropen<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child" style="width:300px;">
                                <li class="parent"><a href="#" nowrap>Tidak Ada Data </a>
                                </li>
                            </ul> 
                          </li>
                          <li class="parent "><a href="{{url('/usulan_teknik/kota/jayapura')}}">Kota Jayapura<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="child">
                                <li class="parent"><a href="#" nowrap>Dinas PU Bidang SDA <span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($jayapuraWaterResource as $jwr)
                                    <li><a href="/showFile/{{encrypt($jwr->file)}}" target="_blank">{{$jwr->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="#" nowrap>Balai Wilayah Sungai (BWS)<span class="expand"><i class="fa fa-chevron-right"></i></span></a>
                                  <ul class="child">
                                    @foreach($bws as $bws)
                                    <li><a href="/showFile/{{encrypt($bws->file)}}" target="_blank">{{$bws->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="{{url('/usulan_teknik/kota/jayapura/dinas_pdam')}}" nowrap>PDAM<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($kotaJayapuraPDAM as $pdam)
                                    <li><a href="/showFile/{{encrypt($pdam->file)}}" target="_blank">{{$pdam->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="{{url('/usulan_teknik/kota/jayapura/dinas_dukcapil')}}" nowrap>Dinas Dukcapil<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($dukcapil as $d)
                                    <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank">{{$d->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="{{url('/usulan_teknik/kota/jayapura/dinas_badan_pusat_statistik')}}" nowrap>Badan Pusat Statistik (BPS)<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($statisticJayapura as $sj)
                                      <!-- <li><a href="/showFile/{{$sj->id}}" target="_blank">{{$sj->name}}</a></li> -->
                                      <li><a href="/showFile/{{encrypt($sj->id)}}" target="_blank">{{$sj->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li class="parent"><a href="{{url('/usulan_teknik/kota/jayapura/badan_pengelolahan_dan_pendapatan_daerah')}}" nowrap>Badan Pengelolahan Dan Pendataan Daerah<span class="expand"><i class="fa fa-chevron-right"></span></i></a>
                                  <ul class="child">
                                    @foreach($dataproces as $d)
                                    <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank">{{$d->name}}</a></li>
                                    @endforeach
                                  </ul>
                                </li>
                            </ul>
                          </li>
                      </ul>
                    </li>
                  <li class="parent"><a href="{{ url ('/ulasan') }}" class="nav-list">Ulasan</a></li>
            </ul>
              <!-- <ul>
                  <div class="text-center" style="">
                    <a class="nav-list" href="{{ url ('/') }}">Beranda</a> -->

                    <!-- <div class="dropdown">
                      <a class="dropbtn" href="{{ url ('/peta') }}" style="font-size:1.5vw;padding-right:15px;color:white;">Peta</a>
                      <div class="dropdown-content scrollable-menu">
                        <a href="{{ url ('/peta/kota/jayapura') }}">Kota Jayapura</a>
                        <a href="{{ url ('/peta/kabupaten/jayapura') }}">Kabupaten Jayapura</a>
                        <a href="#">Kabupaten Biak Numfor</a>
                        <a href="#">Kabupaten Keerom</a>
                        <a href="#">Kabupaten Kepulauan Yapen</a>
                        <a href="#">Kabupaten Mamberamo Raya</a>
                        <a href="#">Kabupaten Sarmi</a>
                        <a href="#">Kabupaten Supiori</a>
                        <a href="#">Kabupaten Waropen</a>
                      </div>
                    </div> -->
                    <!-- <div class="dropdown">
                      <a class="dropbtn" href="#" style="font-size:1.5vw;padding-right:15px;color:white;">Usulan Teknik</a>
                      <div class="dropdown-content scrollable-menu" style="overflow-y: hidden">
                        <ul class="mx-3">
                          <li>
                            <a href="{{ url ('/airminum/kota/jayapura') }}">
                              <div class="row">
                                <div class="md-lg-8 mx-auto">Kota Jayapura</div>
                                <div class="md-lg-4 ml-2"><i class="fa fa-chevron-right"></i></div>
                              </div>
                              </a>
                            </li>
                          <li>
                            <a href="#">
                              <div class="row">
                                <div class="md-lg-8 mx-auto">Kabupaten Jayapura</div>
                                <div class="md-lg-4 ml-1"><i class="fa fa-chevron-right"></i></div>
                              </div>
                            </a>
                          </li>
                          <a href="#">Kabupaten Biak Numfor</a>
                        <a href="#">Kabupaten Keerom</a>
                        <a href="#">Kabupaten Kepulauan Yapen</a>
                        <a href="#">Kabupaten Mamberamo Raya</a>
                        <a href="#">Kabupaten Sarmi</a>
                        <a href="#">Kabupaten Supiori</a>
                        <a href="#">Kabupaten Waropen</a>
                        </ul>
                      </div>
                    </div> -->
                    <!-- <div class="dropdown">
                      <a class="dropbtn" href="#" style="font-size:1.5vw;padding-right:15px;color:white;">Open Data</a>
                      <div class="dropdown-content scrollable-menu">
                        <a href="#">Kota Jayapura</a>
                        <a href="#">Kabupaten Jayapura</a>
                        <a href="#">Kabupaten Biak Numfor</a>
                        <a href="#">Kabupaten Keerom</a>
                        <a href="#">Kabupaten Kepulauan Yapen</a>
                        <a href="#">Kabupaten Mamberamo Raya</a>
                        <a href="#">Kabupaten Sarmi</a>
                        <a href="#">Kabupaten Supiori</a>
                        <a href="#">Kabupaten Waropen</a>
                      </div>
                    </div> -->
                    <!-- <a href="{{ url ('/ulasan') }}" style="font-size:1.5vw;padding-right:15px;color:white;">Ulasan</a>
                  </div>
              </ul> -->
            </div>      
          </div>
          <div class="col-sm-2 col-md-2">
            <div><img src="{{ asset('user/images/pu_papua.jpg') }}" style="padding-right:-30px;" width="100px;"></div>  
          </div>
        </div>
      </div>
      
    @yield('content')
    
    @include('sweetalert::alert')

    <!-- copyright section start -->
    <div class="copyright_section" style="background-color:#10597D;">
      <div class="container">
        <p class="" style="color:white;">Copyright 2020 All Right Reserved By <a>PU Papua Air Bersih</a></p>
        <p class="" style="color:white;">Terms Of Use / Privacy Policy</p>
      </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('user/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('user/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <!-- javascript --> 
    <script src="{{ asset('user/js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
    $(document).ready(function(){
    $(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none"
    });
         
    $(".zoom").hover(function(){
         
    $(this).addClass('transition');
    }, function(){
         
    $(this).removeClass('transition');
    });
    });
    </script> 
    <script>
     function openNav() {
     document.getElementById("myNav").style.width = "100%";
    }
     function closeNav() {
     document.getElementById("myNav").style.width = "0%";
    }
    </script>  
</body>
</html>