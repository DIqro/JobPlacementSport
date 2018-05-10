@extends("layouts.master")
@section('title', 'JPS | Pemberitahuan')
@section('content')
<div class="container-fluid">
    <div class="row content">
        <h4><strong>Notifikasi</strong></h4>
        @if(count($notifikasi) > 0)
            @foreach($notifikasi as $info)
              @php
                if($info->pesan == "lolos"){
                    $colors = "#dff0d8";
                    $isi = " Selamat, anda lolos seleksi ke tahap selanjutnya";
                }else{
                    $colors = "#f2dede";
                    $isi = " Maaf, anda tidak lolos pada seleksi pekerjaan ini. Tetap semangat";
                }
              @endphp    
                <div class="col-sm-12" style="background-color: {{ $colors }}">
                    <a href='{{ url("lowker/$info->id_lowker") }}'>
                        <div class="col-sm-12">
                            <p>Dari : <strong> {{ $info->nama_lembaga }} </strong><br>
                                {{ $isi }}
                            </p>
                            <p>{{ $info->waktu }}</p>
                        </div> 
                    </a>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning" align="center">
                <strong>Tidak</strong> terdapat notifikasi!.
            </div> 
        @endif
  </div>
</div>
@endsection