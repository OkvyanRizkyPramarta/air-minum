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
    <!-- about section start -->
    <div class="about_section layout_padding" style="background-color:white;">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div><img src="{{ asset('user/images/kids.jpg') }}" style="height:600px;padding-top:25%;"></div>
          </div>
          <div class="col-md-7">
            <h1 class="services_taital" style="color:#10597D;"><span>Latar Belakang </span></h1>
            <p class="ipsum_text" style="text-align:justify;">
              Penyediaan air minum merupakan salah satu kebutuhan dasar dan hak sosial ekonomi 
              masyarakat yang harus dipenuhi oleh pemerintah, baik Pemerintah Daerah maupun 
              Pemerintah Pusat. Ketersediaan air minum merupakan salah satu penentu peningkatan 
              kesejahteraan masyarakat. Diharapkan dengan ketersediaan air minum yang mencukupi 
              dapat meningkatkan derajat kesehatan masyarakat, dan dapat mendorong peningkatan 
              produktivitas masyarakat, sehingga dapat terjadi peningkatan pertumbuhan ekonomi 
              masyarakat. Hal ini seiring dengan program Pemerintah Pusat dalam pengembang 
              permukiman berkelanjutan, dengan mencapai 100 persen akses air minum, mengurangi 
              kawasan kumuh 0 persen, dan 100 persen akses sanitasi untuk masyarakat.</p>
            <p class="ipsum_text" style="text-align:justify;">Permasalahan pengelolaan data base air minum salah satunya tentang sistem pengarsipan 
              yang masih belum terkomputerisasi di era digital ini. Padahal dalam rangka 
              pengembangan dan pembangunan sektor keciptakaryaan, diperlukan gambaran yang jelas 
              tentang kondisi eksisting sarana perkotaan beserta perangkat pendukungnya. Maka dari 
              itu untuk peningkatan sistem tata kelola keciptakaryaan Dinas Pekerjaan Umum dan 
              Penataan Ruang Kabupaten Kendal membuat database air minum dengan tujuan untuk 
              menghimpun, mengolah dan menyediakan informasi dan data air bersih yang sudah disepakati 
              secara akurat, cepat dan mudah diakses oleh Masyarakat.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- about section end -->
    <!-- newsletter section start -->
    <div class="newsletter_section" style="background-color:#f5f5f5;">
      <div class="container">
        <div class="row">
          <div class="col-md-4" style="padding-top:10%">
            <h1 class="newsletter_text" style="color:#10597D;">Kritik Dan Saran</h1>
            <p class="tempor_text" style="color:black;">
              Apabila ada kritik dan saran silahkan tuliskan pada kolom yang tertera.
              Kami tidak akan mendapatkan kontak dan masukan anda pada siapapun
            </p>
          </div>
          <div class="col-md-8" style="padding-left:180px;">
            <div class="mail_bt_main">
              <input type="text" class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Nama Anda" name="Nama" > <br> <br> <br>
              <input type="text" class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Nomer Telepon Anda" name="Nomer Telepon" > <br> <br> <br>
              <input type="text" class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Email Anda" name="Email" > <br> <br> <br>
              <textarea type="textarea" class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Saran Dan Kritik Anda" name="Saran Dan Kritik"></textarea> <br> <br> <br>
            </div>
            <div class="send_bt" style="background-color: #10597D;width:80%;border-radius: 4px;"><a href="#" style="background-color: #10597D;color:white;">Kirim</a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- newsletter section end -->

@endsection