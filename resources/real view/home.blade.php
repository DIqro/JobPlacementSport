@extends('layouts.master')
@section('title', 'JPS | Halaman utama')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <center><div class="panel-heading"><h3>Daftar Lowongan Pekerjaan</h3></div></center>
            </div>
        </div>

        @foreach($lowker as $dt)
	    	@include('layouts.lowker', array('data' => $dt))
	    @endforeach
    </div>
</div>
@endsection
