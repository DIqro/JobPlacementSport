@extends('layouts.master')
@section('title', 'JPS | Halaman utama')
@section('content')
<div class="banner">
</div>	
<div class="container"> 
	<div class="single">
		@foreach($lowker as $dt)
	    <div class="col-md-4">
			<div class="col_3"> 
	   	  		<div class="col-sm-8 row_1">
					<h4>
						<a href='{{ url("lowker/$dt->id_lowker") }}'>
							@if(strlen($dt->judul) > 17)
				            	{{ substr($dt->deskripsi, 0, 17) }}. .
				            @else
								{{ $dt->judul }}
				            @endif
						</a>
					</h4>
					<h6>{{ $dt->tgl_post }}</h6>
					@if(strlen($dt->deskripsi) > 60)
		            	<p style="height: 30px">{{ substr($dt->deskripsi, 0, 60) }}. . .</p>
		            @else
		            	<p style="height: 30px">{{ $dt->deskripsi }}</p>
		            @endif
				</div>
			</div>
		</div>
	    @endforeach
	</div>
</div>
@endsection