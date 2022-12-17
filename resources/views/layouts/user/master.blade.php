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
  overflow-x:scroll; 
  overflow-y: visible;
  max-width: 100%;
  height: 200px;
}

.navbar-nav a.nav-link{
  color: white !important;
  font-size: 1.5vw;
}

.dropdown-item:hover{
  background-color: #589cf5 !important;
}

@media (min-width: 768px) {
  .navbar-nav.navbar-center {
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
  }

  .navbar-nav.navbar-right {
    position: absolute;
    left: 90%;
    transform: translatex(-100%);
  }

  .mobile-logo{
    display: none !important;
  }

}

@media (max-width: 768px) {
  .desktop-logo{
    display: none !important;
  }
  
  .dropdown-menu.show{
    font-size: 3vw !important;
  }

  .navbar-nav a.nav-link{
    color: white !important;
    font-size: 3vw;
  }

}

.navbar-nav{
  z-index: 1;
}

.dropdown-item.active{
  color: white !important;
}

.dropdown-menu.show{
  font-size: 1vw;
}

</style>
<script>
 document.addEventListener("keyup", function (e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 44) {
                stopPrntScr();
            }
        });
function stopPrntScr() {

            var inpFld = document.createElement("input");
            inpFld.setAttribute("value", ".");
            inpFld.setAttribute("width", "0");
            inpFld.style.height = "0px";
            inpFld.style.width = "0px";
            inpFld.style.border = "0px";
            document.body.appendChild(inpFld);
            inpFld.select();
            document.execCommand("copy");
            inpFld.remove(inpFld);
        }
       function AccessClipboardData() {
            try {
                window.clipboardData.setData('text', "Access   Restricted");
            } catch (err) {
            }
        }
        setInterval("AccessClipboardData()", 300);
</script>
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<!--header section start -->
  <div class="header_section" style="background-image:url({{url('user/images/TelukCenderawasih.jpg')}})">
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: transparent !important;">
          <a href="#" class="navbar-brand">
            <img src="{{ asset('user/images/pemerintah_papua.png') }}" width="25" height="25" class="d-inline-block align-top mobile-logo" alt="">
            <img src="{{ asset('user/images/pu_papua.jpg') }}" width="25" height="25" class="d-inline-block align-top mobile-logo" alt="">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <!-- <img src="{{ asset('user/images/pemerintah_papua.png') }}" width="25" height="25" class="d-inline-block align-top mobile-logo" alt=""> -->
            <!-- <img src="{{ asset('user/images/pu_papua.jpg') }}" width="25" height="25" class="d-inline-block align-top mobile-logo" alt=""> -->
            <img src="{{ asset('user/images/pemerintah_papua.png') }}" width="75" height="75" class="d-inline-block align-top desktop-logo" alt="" style="margin-left: 100%;">
          </ul>
            <ul class="navbar-nav mr-auto navbar-center">
              <li class="nav-item"><a href="{{ url ('/') }}" class="nav-link">Beranda</a></li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Capaian Air Bersih
                  </a>
                  {{-- 
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @foreach($city as $c)
                      <li>
                        <a class="dropdown-item dropdown-toggle" href="#">{{$c->name}}</a>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Cipta Karya</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li>
                          </ul>
                      </li>
                      @endforeach
                      <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Submenu action</a></li>
                              <li><a class="dropdown-item" href="#">Another submenu action</a></li>


                              <li><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Subsubmenu action aa</a></li>
                                      <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                  </ul>
                              </li>
                              <li><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Subsubmenu action bb</a></li>
                                      <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                      <li><a class="dropdown-item dropdown-toggle" href="#">Submenu 2</a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Submenu action 2</a></li>
                              <li><a class="dropdown-item" href="#">Another submenu action 2</a></li>


                              <li><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Subsubmenu action 1 3</a></li>
                                      <li><a class="dropdown-item" href="#">Another subsubmenu action 2 3</a></li>
                                  </ul>
                              </li>
                              <li><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu 3</a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Subsubmenu action 3 </a></li>
                                      <li><a class="dropdown-item" href="#">Another subsubmenu action 3</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </li> -->
                  </ul>
                  --}}
                  {{-- 
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <!-- ======================== BEGIN KABUPATEN BIAK NUMFOR ============================== -->
                      <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Biak Numfor</a>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                  
                              </ul>
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                                @foreach($StatistikKabupatenBiakNumfor as $skbn)
                                  <li><a href="/showFile/{{encrypt($skbn->file)}}" target="_blank">{{$skbn->name}}</a></li>
                                @endforeach
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                                @foreach($BwsKabupatenBiakNumfor as $bkbn)
                                  <li><a href="/showFile/{{encrypt($bkbn->file)}}" class="dropdown-item" target="_blank">{{$bkbn->name}}</a></li>
                                @endforeach
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Cipta Karya</a></li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                                @foreach($DukcapilKabupatenBiakNumfor as $dkbn)
                                  <li><a href="/showFile/{{encrypt($dkbn->file)}}" target="_blank">{{$dkbn->name}}</a></li>
                                @endforeach
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                                @foreach($PdamKabupatenBiakNumfor as $pkbn)
                                <li><a href="/showFile/{{encrypt($pkbn->file)}}" target="_blank">{{$pkbn->name}}</a></li>
                                @endforeach
                            </li>
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN BIAK NUMFOR ============================== -->

                    <!-- ======================== BEGIN KABUPATEN JAYAPURA ============================== -->
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Jayapura</a>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <!-- <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul> -->
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                                @foreach($StatistikKabupatenJayapura as $skj)
                                <li><a href="/showFile/{{encrypt($skj->file)}}" target="_blank">{{$skj->name}}</a></li>
                                @endforeach
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                              @foreach($CiptaKaryaKabupatenJayapura as $ckkj)
                                <li><a href="/showFile/{{encrypt($ckkj->file)}}" target="_blank">{{$ckkj->name}}</a></li>
                              @endforeach
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                                @foreach($DukcapilKabupatenJayapura as $dkj)
                                  <li><a href="/showFile/{{encrypt($dkj->file)}}" target="_blank">{{$dkj->name}}</a></li>
                                @endforeach
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                                @foreach($PdamKabupatenJayapura as $pkj)
                                  <li><a href="/showFile/{{encrypt($pkj->file)}}" target="_blank">{{$pkj->name}}</a></li>
                                @endforeach
                            </li>
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN JAYAPURA ============================== -->

                    <!-- ======================== BEGIN KABUPATEN KEEROM ============================== -->
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Keerom</a>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <!-- <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul> -->
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                                @foreach($StatistikKabupatenKeerom as $skk)
                                  <li><a href="/showFile/{{encrypt($skk->file)}}" target="_blank">{{$skk->name}}</a></li>
                                @endforeach
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                                @foreach($CiptaKaryaKabupatenKeerom as $ckkk)
                                  <li><a href="/showFile/{{encrypt($ckkk->file)}}" target="_blank">{{$ckkk->name}}</a></li>
                                @endforeach
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li>
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN KEEROM ============================== -->

                    <!-- ======================== BEGIN KABUPATEN KEPULAUAN YAPEN ============================== -->
                      <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Kepulauan Yapen</a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul>
                            </li> -->
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                              @foreach($StatistikKabupatenKepulauanYapen as $skky)
                                <li><a href="/showFile/{{encrypt($skky->file)}}" target="_blank">{{$skky->name}}</a></li>
                              @endforeach
                            </li>
                            <!-- <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li> -->
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                                @foreach($CiptaKaryaKabupatenKepulauanYapen as $ckkky)
                                  <li><a href="/showFile/{{encrypt($ckkky->file)}}" target="_blank">{{$ckkky->name}}</a></li>
                                @endforeach
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                                @foreach($DukcapilKabupatenKepulauanYapen as $dkky)
                                  <li><a href="/showFile/{{encrypt($dkky->file)}}" target="_blank">{{$dkky->name}}</a></li>
                                @endforeach
                            </li>
                            <!-- <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li> -->
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                                @foreach($PdamKabupatenKepulauanYapen as $pkky)
                                  <li><a href="/showFile/{{encrypt($pkky->file)}}" target="_blank">{{$pkky->name}}</a></li>
                                @endforeach
                            </li>
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN KEPULAUAN YAPEN ============================== -->

                    <!-- ======================== BEGIN KABUPATEN MAMBERAMO RAYA ============================== -->
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Mamberamo Raya</a>
                        <ul class="dropdown-menu">
                          <li>Tidak ada data</li>
                            <!-- <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Cipta Karya</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li> -->
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN MAMBERAMO RAYA ============================== -->

                    <!-- ======================== BEGIN KABUPATEN SARMI ============================== -->
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Sarmi</a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul>
                            </li> -->
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                              @foreach($StatistikKabupatenSarmi as $sks)
                                <li><a href="/showFile/{{encrypt($sks->file)}}" target="_blank">{{$sks->name}}</a></li>
                                @endforeach
                            </li>
                            <!-- <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li> -->
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                                @foreach($CiptaKaryaKabupatenSarmi as $ckks)
                                  <li><a href="/showFile/{{encrypt($ckks->file)}}" target="_blank">{{$ckks->name}}</a></li>
                                @endforeach
                            </li>
                            <!-- <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li> -->
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN SARMI ============================== -->

                    <!-- ======================== BEGIN KABUPATEN SUPIORI ============================== -->
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Supiori</a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul>
                            </li> -->
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                                @foreach($StatistikKabupatenSarmi as $sks)
                                  <li><a href="/showFile/{{encrypt($sks->file)}}" target="_blank">{{$sks->name}}</a></li>
                                @endforeach
                            </li>
                            <!-- <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li> -->
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                                @foreach($CiptaKaryaKabupatenSarmi as $ckks)
                                <li><a href="/showFile/{{encrypt($ckks->file)}}" target="_blank">{{$ckks->name}}</a></li>
                                @endforeach
                            </li>
                            <!-- <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li> -->
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN SUPIORI ============================== -->

                    <!-- ======================== BEGIN KABUPATEN WAROPEN ============================== -->
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Waropen</a>
                        <ul class="dropdown-menu">
                          <li>Tidak Ada Data</li>
                            <!-- <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Item 1</a></li>
                              </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Cipta Karya</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li> -->
                          </ul>
                      </li>
                    <!-- ======================== END KABUPATEN WAROPEN ============================== -->

                    <!-- ======================== BEGIN KOTA JAYAPURA ============================== -->
                    <li>
                        <a class="dropdown-item dropdown-toggle" href="#">Kota Jayapura</a>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                              <ul class="dropdown-menu">
                                  @foreach($jayapuraWaterResource as $jwr)
                                    <li><a href="/showFile/{{encrypt($jwr->file)}}" class="dropdown-item" target="_blank">{{$jwr->name}}</a></li>
                                  @endforeach
                              </ul>
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                              <ul class="dropdown-menu">
                                  @foreach($bws as $bws)
                                    <li><a href="/showFile/{{encrypt($bws->file)}}" target="_blank">{{$bws->name}}</a></li>
                                  @endforeach
                              </ul>
                            </li>
                            <li>
                                <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                                  <ul class="dropdown-menu">
                                      @foreach($kotaJayapuraPDAM as $pdam)
                                        <li><a href="/showFile/{{encrypt($pdam->file)}}" target="_blank">{{$pdam->name}}</a></li>
                                      @endforeach
                                  </ul>
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                                <ul class="dropdown-menu">
                                    @foreach($ciptaKaryaKotaJayapura as $d)
                                      <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                                <ul class="dropdown-menu">
                                  @if($dukcapil->count() == 0)
                                  <li> Tidak Ada Data</li>
                                  @else
                                    @foreach($dukcapil as $d)
                                      <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
                                    @endforeach
                                  @endif
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                                <ul class="dropdown-menu">
                                    @foreach($statisticJayapura as $sj)
                                      <li><a href="/showFile/{{encrypt($sj->id)}}" target="_blank">{{$sj->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                              <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                                <ul class="dropdown-menu">
                                @if($dataproces->count() == 0)
                                  <li> Tidak Ada Data</li>
                                @else
                                @foreach($dataproces as $d)
                                <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
                                @endforeach
                                @endif
                                </ul>
                            </li>
                          </ul>
                      </li>
                    <!-- ======================== END KOTA JAYAPURA ============================== -->

                  </ul>
                  --}}
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <!-- ======================== BEGIN KABUPATEN BIAK NUMFOR ============================== -->
                    <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Biak Numfor</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                                <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                              <ul class="dropdown-menu">
                              @if($StatistikKabupatenBiakNumfor->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                              @foreach($StatistikKabupatenBiakNumfor as $skbn)
                                <li><a href="/showFile/{{encrypt($skbn->file)}}" target="_blank">{{$skbn->name}}</a></li>
                              @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                              <ul class="dropdown-menu">
                              @if($BwsKabupatenBiakNumfor->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                              @foreach($BwsKabupatenBiakNumfor as $bkbn)
                                <li><a href="/showFile/{{encrypt($bkbn->file)}}" class="dropdown-item" target="_blank">{{$bkbn->name}}</a></li>
                              @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                              <ul class="dropdown-menu">
                              @if($DukcapilKabupatenBiakNumfor->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                              @foreach($DukcapilKabupatenBiakNumfor as $dkbn)
                                <li><a href="/showFile/{{encrypt($dkbn->file)}}" target="_blank">{{$dkbn->name}}</a></li>
                              @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                              <ul class="dropdown-menu">
                              @if($PdamKabupatenBiakNumfor->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                              @foreach($PdamKabupatenBiakNumfor as $pkbn)
                              <li><a href="/showFile/{{encrypt($pkbn->file)}}" target="_blank">{{$pkbn->name}}</a></li>
                              @endforeach
                              @endif
                              </ul>
                          </li>
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN BIAK NUMFOR ============================== -->

                  <!-- ======================== BEGIN KABUPATEN JAYAPURA ============================== -->
                  <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Jayapura</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                              <ul class="dropdown-menu">
                              @if($StatistikKabupatenJayapura->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($StatistikKabupatenJayapura as $skj)
                                <li><a href="/showFile/{{encrypt($skj->file)}}" target="_blank">{{$skj->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                            <ul class="dropdown-menu">
                              @if($CiptaKaryaKabupatenJayapura->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($CiptaKaryaKabupatenJayapura as $ckkj)
                                  <li><a href="/showFile/{{encrypt($ckkj->file)}}" target="_blank">{{$ckkj->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                              <ul class="dropdown-menu">
                              @if($DukcapilKabupatenJayapura->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($DukcapilKabupatenJayapura as $dkj)
                                  <li><a href="/showFile/{{encrypt($dkj->file)}}" target="_blank">{{$dkj->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                              <ul class="dropdown-menu">
                              @if($PdamKabupatenJayapura->count() == 9)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($PdamKabupatenJayapura as $pkj)
                                  <li><a href="/showFile/{{encrypt($pkj->file)}}" target="_blank">{{$pkj->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN JAYAPURA ============================== -->

                  <!-- ======================== BEGIN KABUPATEN KEEROM ============================== -->
                  <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Keerom</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              <li><a href="#" class="dropdown-item">Tidak Ada Data</a></li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                              <ul class="dropdown-menu">
                              @if($StatistikKabupatenKeerom->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($StatistikKabupatenKeerom as $skk)
                                  <li><a href="/showFile/{{encrypt($skk->file)}}" target="_blank">{{$skk->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                              <ul class="dropdown-menu">
                              @if($CiptaKaryaKabupatenKeerom->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($CiptaKaryaKabupatenKeerom as $ckkk)
                                  <li><a href="/showFile/{{encrypt($ckkk->file)}}" target="_blank">{{$ckkk->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN KEEROM ============================== -->

                  <!-- ======================== BEGIN KABUPATEN KEPULAUAN YAPEN ============================== -->
                    <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Kepulauan Yapen</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                            <ul class="dropdown-menu">
                              @if($StatistikKabupatenKepulauanYapen->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($StatistikKabupatenKepulauanYapen as $skky)
                                  <li><a href="/showFile/{{encrypt($skky->file)}}" target="_blank">{{$skky->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                              <ul class="dropdown-menu">
                                <li>Tidak Ada Data</li>
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                              <ul class="dropdown-menu">
                              @if($CiptaKaryaKabupatenKepulauanYapen->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($CiptaKaryaKabupatenKepulauanYapen as $ckkky)
                                  <li><a href="/showFile/{{encrypt($ckkky->file)}}" target="_blank">{{$ckkky->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                              <ul class="dropdown-menu">
                              @if($DukcapilKabupatenKepulauanYapen->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($DukcapilKabupatenKepulauanYapen as $dkky)
                                  <li><a href="/showFile/{{encrypt($dkky->file)}}" target="_blank">{{$dkky->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                              <ul class="dropdown-menu">
                              @if($PdamKabupatenKepulauanYapen->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($PdamKabupatenKepulauanYapen as $pkky)
                                  <li><a href="/showFile/{{encrypt($pkky->file)}}" target="_blank">{{$pkky->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN KEPULAUAN YAPEN ============================== -->

                  <!-- ======================== BEGIN KABUPATEN MAMBERAMO RAYA ============================== -->
                  <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Mamberamo Raya</a>
                      <ul class="dropdown-menu">
                        <li>Tidak ada data</li>
                          <!-- <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              <li><a href="#" class="dropdown-item">Item 1</a></li>
                            </ul>
                          </li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Cipta Karya</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li> -->
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN MAMBERAMO RAYA ============================== -->

                  <!-- ======================== BEGIN KABUPATEN SARMI ============================== -->
                  <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Sarmi</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                            <ul class="dropdown-menu">
                              @if($StatistikKabupatenSarmi->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($StatistikKabupatenSarmi as $sks)
                                <li><a href="/showFile/{{encrypt($sks->file)}}" target="_blank">{{$sks->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                              <ul class="dropdown-menu">
                              @if($CiptaKaryaKabupatenSarmi->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                              @foreach($CiptaKaryaKabupatenSarmi as $ckks)
                                <li><a href="/showFile/{{encrypt($ckks->file)}}" target="_blank">{{$ckks->name}}</a></li>
                              @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN SARMI ============================== -->

                  <!-- ======================== BEGIN KABUPATEN SUPIORI ============================== -->
                  <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Supiori</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                              <ul class="dropdown-menu">
                              @if($CiptaKaryaKabupatenSupiori->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($CiptaKaryaKabupatenSupiori as $ckks)
                                <li><a href="/showFile/{{encrypt($ckks->file)}}" target="_blank">{{$ckks->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                            <ul class="dropdown-menu">
                              @if($DukcapilKabupatenSupiori->count() == 0)
                                <li>Tidak Ada Data</li>
                              @else
                                @foreach($DukcapilKabupatenSupiori as $ckks)
                                <li><a href="/showFile/{{encrypt($ckks->file)}}" target="_blank">{{$ckks->name}}</a></li>
                                @endforeach
                              @endif
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                            <ul class="dropdown-menu">
                              <li>Tidak Ada Data</li>
                            </ul>
                          </li>
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN SUPIORI ============================== -->

                  <!-- ======================== BEGIN KABUPATEN WAROPEN ============================== -->
                  <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kabupaten Waropen</a>
                      <ul class="dropdown-menu">
                        <li>Tidak Ada Data</li>
                          <!-- <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              <li><a href="#" class="dropdown-item">Item 1</a></li>
                            </ul>
                          </li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Cipta Karya</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a></li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">PDAM</a></li> -->
                        </ul>
                    </li>
                  <!-- ======================== END KABUPATEN WAROPEN ============================== -->

                  <!-- ======================== BEGIN KOTA JAYAPURA ============================== -->
                  <li>
                      <a class="dropdown-item dropdown-toggle" href="#">Kota Jayapura</a>
                      <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pengelolahan Dan Pendataan Daerah</a>
                            <ul class="dropdown-menu">
                              @if($jayapuraWaterResource->count() == 0)
                                <li>Tidak Ada Data</li>
                              @else
                                @foreach($jayapuraWaterResource as $jwr)
                                  <li><a href="/showFile/{{encrypt($jwr->file)}}" class="dropdown-item" target="_blank">{{$jwr->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Badan Pusat Statistik (BPS)</a>
                              <ul class="dropdown-menu">
                                @if($bws->count() == 0)
                                  <li>Tidak Ada Data</li>
                                @else
                                  @foreach($bws as $bws)
                                    <li><a href="/showFile/{{encrypt($bws->file)}}" target="_blank">{{$bws->name}}</a></li>
                                  @endforeach
                                @endif
                              </ul>
                          </li>
                          <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Balai Wilayah Sungai (BWS)</a>
                                <ul class="dropdown-menu">
                                @if($kotaJayapuraPDAM->count() == 0)
                                <li>Tidak Ada Data</li>
                                @else
                                  @foreach($kotaJayapuraPDAM as $pdam)
                                    <li><a href="/showFile/{{encrypt($pdam->file)}}" target="_blank">{{$pdam->name}}</a></li>
                                  @endforeach
                                @endif
                                </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang Cipta Karya</a>
                              <ul class="dropdown-menu">
                              @if($ciptaKaryaKotaJayapura->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($ciptaKaryaKotaJayapura as $d)
                                  <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">Dinas Dukcapil</a>
                              <ul class="dropdown-menu">
                                @if($dukcapil->count() == 0)
                                  <li> Tidak Ada Data</li>
                                @else
                                  @foreach($dukcapil as $d)
                                  <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
                                  @endforeach
                                @endif
                              </ul>
                          </li>
                          <li>
                              <a class="dropdown-item dropdown-toggle" href="#">Dinas PU Bidang SDA</a>
                              <ul class="dropdown-menu">
                              @if($statisticJayapura->count() == 0)
                              <li>Tidak Ada Data</li>
                              @else
                                @foreach($statisticJayapura as $sj)
                                  <li><a href="/showFile/{{encrypt($sj->id)}}" target="_blank">{{$sj->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                          <li>
                            <a class="dropdown-item dropdown-toggle" href="#">PDAM</a>
                              <ul class="dropdown-menu">
                              @if($dataproces->count() == 0)
                                <li> Tidak Ada Data</li>
                              @else
                                @foreach($dataproces as $d)
                                  <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
                                @endforeach
                              @endif
                              </ul>
                          </li>
                        </ul>
                    </li>
                  <!-- ======================== END KOTA JAYAPURA ============================== -->

                </ul>
              </li>
              <li class="nav-item"><a href="{{ url ('/ulasan') }}" class="nav-link">Ulasan</a></li>
          </ul>
          <!-- <ul class="navbar-nav mr-auto navbar-center">
            <li class="nav-item active">
              <a class="nav-link" href="#">Beranda</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Capaian Air Minum
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="{{ url ('/ulasan') }}" class="nav-link nav-list">Ulasan</a>
            </li>
          </ul> -->
          <ul class="navbar-nav navbar-right">
            <img src="{{ asset('user/images/pu_papua.jpg') }}" width="75" height="75" class="d-inline-block align-top desktop-logo" alt="">
          </ul>
        </div>
      </nav>
      {{-- <div class="container">
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
                                    <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
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
                                    <li><a href="/showFile/{{encrypt($d->file)}}" target="_blank"> {{$d->name}}</a></li>
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
      </div> --}}
      
    @yield('content')
    
    @include('sweetalert::alert')

    <!-- copyright section start -->
    <div class="copyright_section" style="background-color:#10597D;">
      <div class="container">
        <p class="" style="color:white;">Copyright 2022 All Right Reserved By <a>PU Papua Air Bersih</a></p>
        <!-- <p class="" style="color:white;">Terms Of Use / Privacy Policy</p> -->
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

    $( document ).ready( function () {
        $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
            var $el = $( this );
            $el.toggleClass('active-dropdown');
            var $parent = $( this ).offsetParent( ".dropdown-menu" );
            if ( !$( this ).next().hasClass( 'show' ) ) {
                $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
            }
            var $subMenu = $( this ).next( ".dropdown-menu" );
            $subMenu.toggleClass( 'show' );
            
            $( this ).parent( "li" ).toggleClass( 'show' );

            $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
                $( '.dropdown-menu .show' ).removeClass( "show" );
                $el.removeClass('active-dropdown');
            } );
            
            if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
                $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
            }

            return false;
        } );

        $(".dropdown-item").onclick(function(){
          $(this).addClass("active");
        });
    } );
    </script>  
</body>
</html>