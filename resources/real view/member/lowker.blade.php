@extends("layouts.master")
@section("content")
<div class="container-fluid">
    <div class="row content">
        @if(session('notif'))
            @if(session('key') == 'sukses')
                <div class="alert alert-success alert-dismissable" align='center'>
            @else
                <div class="alert alert-danger alert-dismissable" align='center'>
            @endif
                    <a href="#" aria-label="close" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('notif') }}</strong> 
                </div>
        @endif
        <div class="col-sm-6"  style="background-color: #edf0f2; border-radius: 10px;">
            <h4 align="center"><strong>Informasi Pekerjaan</strong></h4><br>
            @php
                $info = array('Judul', 'Nama Pemilik', 'Nama Lembaga', 'Kategori', 'Syarat', 'Masa Berlaku', 'Gaji', 'Deadline', 'Alamat', 'Kontak', 'Deskripsi', 'Dipost Sejak');
                $kolom = array('judul', 'nama', 'nama_lembaga', 'kategori', 'syarat', 'masa_berlaku', 'gaji', 'deadline', 'alamat', 'kontak', 'deskripsi', 'tgl_post');
            @endphp

            @for($i = 0; $i < count($info); $i++)
                <div class="col-sm-3">
                    <label>{{ $info[$i] }}</label> 
                </div>
                <div class="col-sm-8">
                    <p>{{ $data->$kolom[$i] }}</p>
                </div>
            @endfor

            <!-- member tidak dapat lamar lowkernya sendiri -->
            @if(Auth::user()->id != $data->id_pemilik)
                @if($total_melamar > 0)
                    <div class="col-sm-12" align="center">
                        <p class="alert alert-warning"><strong>Anda sudah melamar pekerjaan ini</strong></p>
                    </div>
                @else
                    <form class="form-horizontal" method="POST" action="{{ url('lowker/lamar') }}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden" name="id_lowker"  value="{{ $data->id_lowker }}">
                                <button type="submit" class="btn btn-primary">
                                    Lamar Pekerjaan
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            @else
                <form class="form-horizontal" method="POST" action='{{ url("lowker/$data->id_lowker/pelamar") }}'>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                                Lihat Pelamar
                            </button>
                        </div>
                    </div>
                </form>
            @endif
            
            <div class="col-sm-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600'); return false;">
                    <i class="fa fa-facebook-official"></i> Share on Facebook
                </a>
            </div>
            <div class="col-sm-4">
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600'); return false;">
                    <i class="fa fa-twitter"></i> Share on Twitter
                </a>
            </div>
            <div class="col-sm-4">
                <a href='{{ url("simpan-lowker/$data->id_lowker") }}' target="_blank">
                    <i class="fa fa-save"></i> Simpan Lowker
                </a>
            </form> -->
            </div>

        </div>
        <div class="col-sm-6" style="background-color: #E1FEA6; max-height: 600px; overflow-y:auto; border-radius: 10px;">
            <h4 align="center"><strong>Daftar Komentar</strong></h4>
            @foreach($komentar as $komen)
                <div class="col-sm-2" style="margin-top: 10px">
                    @if(file_exists(public_path("members/$komen->id/$komen->id.jpg")))
                        <img src='{{ asset("members/$komen->id/$komen->id.jpg") }}' style="width:70px; height:70px" title="{{ $komen->tgl_komen }}">
                    @else
                        <img src='{{ asset("members/default.jpg") }}' style="width:70px; height:70px" title="{{ $komen->tgl_komen }}">
                    @endif
                </div>
                <div class="col-sm-10" style="margin-top: 10px">
                    <p><a>{{ $komen->nama }}</a></p>
                    <p title="{{ $komen->tgl_komen }}">{{ $komen->isi }}<br><hr>
                </div>
            @endforeach
            <div class="col-sm-12">   
                <form action="{{ url('/lowker/komentari') }}" method="post" align="right" id="newl">
                    <input type="hidden" name="id_lowker" value="{{ $data->id_lowker }}"><br>
                    <div class="form-group{{ $errors->has('komentar') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="komentar" placeholder="Tulis komentar anda disini. . ." id="komentar"><br>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info btn-sm">Komentari</button> 
                            </span>
                        </div>
                    </div>
                    </div>
                    <p align="center" style="color: red"><strong>{{ $errors->first('komentar') }}</strong></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection