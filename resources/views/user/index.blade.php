@extends('layouts.user.master')

@section('content')
<div class="banner_section layout_padding" >
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-12 col-sm-12" style="padding-top: 60px;">
            <h1 class="text-center" style="font-size:2.8vw;color:white;text-shadow: 2px 2px black; text-align:justify;"><b>SELAMAT DATANG DI WEBSITE SISTEM INFORMASI DATABASE AIR BERSIH DINAS PEKERJAAN UMUM, PENATAAN RUANG, PERUMAHAN, DAN KAWASAN PERMUKIMAN PROVINSI PAPUA</b></h1>
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
    <div class="about_section" style="background-color:white;padding-top:100px;">
      <div class="container">
        <div class="row">
          <div class="col-md-6 py-4">
            <div>
              <img src="{{ asset('user/images/gallery/kids.jpeg') }}" style="max-width: 500px;width: 100%;">
            </div>
          </div>
          <div class="col-md-6">
            <h1 class="services_taital" style="color:#10597D;"><span>Latar Belakang </span></h1>
            <p class="ipsum_text" style="text-align:justify; text-indent: 0.5in;">
              Air bersih merupakan salah satu kebutuhan yang paling mendasar bagi kehidupan manusia. Air tidak hanya dibutuhkan untuk kebutuhan dasar seperti mandi, cuci, kakus, tapi juga sebagai kebutuhan untuk produksi dan lainnya. Untuk mencapai kondisi kesehatan masyarakat yang baik, maka air bersih yang tersedia haruslah cukup secara kuantitas, sehat secara kualitas, serta dilihat dari segi kontinuitas selalu tersedia setiap saat. 
            Dalam rangka meningkatkan taraf hidup masyarakat di Provinsi Papua pada umumnya, maka sarana dan prasarana infrastruktur dianggap memegang peranan yang sangat penting. Menyadari akan hal tersebut, Pemerintah Daerah Provinsi Papua melalui melalui Dinas Pekerjaan Umum, Penataan Ruang, Perumahan dan Permukiman melaksanakan pekerjaan Konsultasi Penyusunan Dokumen Database Layanan Air Bersih Di Provinsi Papua untuk mengantisipasi pemenuhan kebutuhan air bersih. Untuk maksud tersebut, maka disusunlah suatu tahapan kegiatan yang bertujuan memperoleh informasi dan data-data teknis yang akan menjadi bahan acuan dan pertimbangan bagi pemerintah dalam pelaksanaan nantinya.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
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
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('user/images/gallery/gambar1.jpeg') }}?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('user/images/gallery/gambar2.jpeg') }}?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('user/images/gallery/gambar3.jpeg') }}?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('user/images/gallery/gambar4.jpeg') }}?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('user/images/gallery/gambar5.jpeg') }}?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- about section end -->
    <!-- newsletter section start -->
    <div class="newsletter_section" style="background-color:#f5f5f5;">
      <div class="container">
      <form method="POST" action="{{ route('user.comment.store') }}" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4 col-md-4 col-sm-12" style="padding-top:10%">
            <h1 class="newsletter_text" style="color:#10597D;">Kritik Dan Saran</h1>
            <p class="tempor_text" style="color:black;">
              Apabila ada kritik dan saran silahkan tuliskan pada kolom yang tertera.
              Kami tidak akan mendapatkan kontak dan masukan anda pada siapapun
            </p>
          </div>
          @csrf 
          <div class="col-md-8 col-md-8 col-sm-12" style="">
            <div>
              <input type="text" name="name" class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Nama Anda" required> <br> <br> <br>
              <input type="number" name="telp_number"  class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Nomer Telepon Anda" required> <br> <br> <br>
              <input type="email" name="email"  class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Email Anda" required> <br> <br> <br>
              <textarea type="textarea" name="description"  class="mail_text" style="width:80%;border-radius: 4px;background-color:#D9D9D9;" placeholder="Masukkan Saran Dan Kritik Anda" required></textarea> <br> <br> <br>
            </div>
            <button class="send_bt" style="background-color: #10597D;color:white;width:80%;height:10%;border-radius: 4px;">Kirim
            </button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- newsletter section end -->

@endsection