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
            <div class="" style="padding-top:2%">
              <ul>
                  <div class="text-center" style="">
                    <a href="{{ url ('/') }}" style="font-size:1.5vw;padding-right:15px;color:white;">Beranda</a>
                    <div class="dropdown">
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
                    </div>
                    <div class="dropdown">
                      <a class="dropbtn" href="#" style="font-size:1.5vw;padding-right:15px;color:white;">Capaian Air Minum</a>
                      <div class="dropdown-content scrollable-menu">
                        <a href="{{ url ('/airminum/kota/jayapura') }}">Kota Jayapura</a>
                        <a href="#">Kabupaten Jayapura</a>
                        <a href="#">Kabupaten Biak Numfor</a>
                        <a href="#">Kabupaten Keerom</a>
                        <a href="#">Kabupaten Kepulauan Yapen</a>
                        <a href="#">Kabupaten Mamberamo Raya</a>
                        <a href="#">Kabupaten Sarmi</a>
                        <a href="#">Kabupaten Supiori</a>
                        <a href="#">Kabupaten Waropen</a>
                      </div>
                    </div>
                    <div class="dropdown">
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
                    </div>
                    <a href="{{ url ('/ulasan') }}" style="font-size:1.5vw;padding-right:15px;color:white;">Ulasan</a>
                  </div>
              </ul>
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