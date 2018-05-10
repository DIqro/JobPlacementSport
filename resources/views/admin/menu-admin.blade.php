@extends("layouts.master")
@section("content")
<style>
    div.container {
        width: 90%;
    }
</style>
<div class="container-fluid">
  <div class="row content">
      <div class="col-sm-2 sidenav">
        <h4> <a href="{{ URL('') }}"><span class="glyphicon glyphicon-user"></span> {{ Session::get('nama') }}</a></h4>
        <div id="menu">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="{{ URL('/validasi-lowker') }}"><span class="glyphicon glyphicon-ok"></span> Validasi LowKer</a></li>
            <li><a href="{{ URL('/data-lowker-valid') }}"><i class="fa fa-copyright"></i> Data LowKer Valid</a></li>
            <li><a href="{{ URL('/data-pengguna') }}"><span class="glyphicon glyphicon-list-alt"></span> Data Pengguna</a></li>
            <li><a href="{{ URL('/data-pelamar') }}"><span class="glyphicon glyphicon-list-alt"></span> Data Pelamar</a></li>
            <li><a href="{{ URL('/lowker-ditolak') }}"><span class="glyphicon glyphicon-trash"></span> LowKer Tertolak</a></li>
          </ul>
        </div>
      </div>
    <div class="col-sm-10" id="right-side" style="background-color: white">
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

      @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissable" align='center'>
            <a href="#" aria-label="close" class="close" data-dismiss="alert">&times;</a>
            <strong>Perubahan gagal, terdapat kesalahan. Klik ulang tombol Edit untuk mengetahuinya</strong> 
        </div>
      @endif
      @yield("content-admin")
    </div>

  </div>
</div>
@endsection