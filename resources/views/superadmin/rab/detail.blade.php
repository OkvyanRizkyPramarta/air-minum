<style>
    #download{
        height: 70px;
        background-color: #4ff758;
        cursor: pointer;
        border: none;
        border-radius: 20px;
        margin: 15px;
        padding: 15px;
        text-decoration: none;
        color: black;
    }
</style>
<hr><center><h2>Data Input</h2></center><hr>
<embed src="{{asset('storage/files/'.$rab->kode_rab.'_temp.pdf')}}" type="application/pdf" frameborder="0" width="100%" height="700px"></embed>
<!-- <iframe src="https://docs.google.com/gview?url={{asset('storage/files/'.$rab->kode_rab.'_temp.pdf')}}&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe> -->
<br>
<hr><center><h2>Attachment</h2></center><hr>
@if($content_type == "application/pdf")
<embed src="{{asset('storage/'.$rab->file)}}" type="{{$content_type}}" frameborder="0" width="100%" height="700px"></embed>
@else
<center><img src="{{asset('storage/'.$rab->file)}}" alt=""></center>
<center><a href="{{asset('storage/'.$rab->file)}}" id="download" download="{{$rab->file}}"><b>Download Gambar</b></a></center>
@endif