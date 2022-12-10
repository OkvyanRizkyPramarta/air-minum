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
<title>Capiclean</title>
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
</head>
<body>
<!--header section start -->
    <div class="header_section" style="background-image:url({{url('user/images/dashboard.png')}})">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="menu_main" style="padding-top:30px;padding-right:30px;">
              <div class="">
                <span class="padding_left0" style="padding-right:30px;"><a href="#">Beranda</a></span>
                <span class="padding_left0" style="padding-right:30px;"><a href="#">Peta</a></span>
                <span class="padding_left0" style="padding-right:30px;"><a href="#">Capaian Air Minum</a></span>
                <span class="padding_left0" style="padding-right:30px;"><a href="#">Open Data</a></span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="menu_text">
              <ul>
                <div><img src="{{ asset('user/images/tirta.png') }}" width="250px;"></a></div>
              </ul>
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