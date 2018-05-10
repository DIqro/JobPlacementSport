@extends("layouts.master")
@section('title', 'JPS | Tambah lowker')
@section('content')
<div class="banner_1">
</div>	

<div class="container">
	<div class="col-md-8 col-md-offset-2 notifikasi">
		<h2>Notification</h2>
        @if(count($notifikasi) > 0)
            <ul class="list-group">
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
            <a href='{{ url("lowker/$info->id_lowker") }}'>
                <li class="list-group-item" style="background-color: {{ $colors }}">
                    <p>Dari : <strong> {{ $info->nama_lembaga }} </strong><br>
                        {{ $isi }}
                    </p>
                    <p>{{ $info->waktu }}</p>
                </li>
            </a>
            @endforeach
            </ul>
        @else
            <div class="alert alert-warning" align="center">
                <strong>Tidak</strong> terdapat notifikasi!.
            </div> 
        @endif
	</div>
</div>
@endsection