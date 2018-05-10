@extends("layouts.master")
@section('title', 'JPS | Lowker')
@section('content')
<div class="banner_1">
</div><br>
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
<div class="container">
    <div class="single">  
	   
	 <div class="col-md-8 single_right"">
	    <h3>{{ $data->judul }}</h3>
	    <h6>{{ $data->tgl_post }} - {{ $data->nama }}</h6>
	    <div class="row_1"  style="margin-top: 25px;">
	      	<div class="col-md-11">
	      		<p><strong>Requirement</strong></p>
	      		<p>{{ $data->syarat }}</p>
	      	</div>
	    </div>
	    <div class="clearfix"> </div>
	    <div class="col-md-11">	
	      <p><strong>Description</strong></p>
	      <p>{{ $data->deskripsi }}</p>
	  	</div>

	  	<div class="clearfix"> </div><br>

	  	<div class="like-jobs">
	  	<div class="like-wrapper">
            <div class="btn {{$data->isLiked() ? 'btn-danger btn-unlike' : 'btn-default btn-like'}}" data-type="1" data-model-id="{{$data->id_lowker}}"><span class="{{$data->isLiked() ? 'glyphicon glyphicon-thumbs-down' : 'glyphicon glyphicon-thumbs-up'}}"></span> {{$data->isLiked() ? 'Unlike' : 'Like'}} </div>
            <div class="total-like-lowker">
               	<span class="like-number"> {{$data->likes->count()}} </span>
		        <span class="like-warning"> You can't like your Job </span>
            </div>
        </div>
        </div>

	  	<div class="clearfix"> </div>
	  	<br>
			
	      	@if(Auth::user()->id != $data->id_pemilik)
                @if($total_melamar > 0)
                    <div class="col-sm-12" align="center">
                        <p class="alert alert-warning"><strong>Anda sudah melamar pekerjaan ini</strong></p>
                    </div>
                @else
                    <form class="form-horizontal" method="POST" action="{{ url('lowker/lamar') }}">
				      	<center><input type="submit" name="melamar" value="Lamar Pekerjaan" class="btn btn-primary"></center>
                        <input type="hidden" name="id_lowker" value="{{ $data->id_lowker }}">
                    </form>
                @endif
            @else
                <form class="form-horizontal" method="POST" action='{{ url("lowker/$data->id_lowker/pelamar") }}'>
			      	<center><input type="submit" name="melamar" value="Lihat Pelamar" class="btn btn-success""></center> 
                </form>
            @endif

	      <div class="comments">
	      	<h6>Comments</h6>
			@foreach($komentar as $komen)
			<div class="media media_1">
			  <div class="media-left"> 
					@if(file_exists(public_path("members/$komen->id/$komen->id.jpg")))
                        <img class="img-circle" src='{{ asset("members/$komen->id/$komen->id.jpg") }}' style="width:70px; height:70px" title="{{ $komen->tgl_komen }}">
                    @else
                        <img class="img-circle" src='{{ asset("members/default.jpg") }}' style="width:70px; height:70px" title="{{ $komen->tgl_komen }}">
                    @endif
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading">{{ $komen->nama }} ~ {{ $komen->tgl_komen }}</a><div class="clearfix"> </div></h4>

			    <p title="{{ $komen->tgl_komen }}">{{ $komen->isi }}</p>
			  </div>
			  
			<div class="like-comment">
			  	<div class="like-wrapper">
		            <div class="btn btn-xs {{$komen->isLiked() ? 'btn-danger btn-unlike' : 'btn-default btn-like'}}" data-type="2" data-model-id="{{$komen->id_komentar}}"><span class="{{$komen->isLiked() ? 'glyphicon glyphicon-thumbs-down' : 'glyphicon glyphicon-thumbs-up'}}"></span></div>
		            <div class="total-like-comment">
		                <span class="like-number"> {{$komen->likes->count()}} </span> Likes
		                <span class="like-warning"> You can't like your comment </span>
		            </div>
				</div>
			</div>
			  <div class="clearfix"></div>
			</div>
			@endforeach

		  </div>
		  <form action="{{ url('/lowker/komentari') }}" method="post">
			<div class="text">
				<div class="form-group{{ $errors->has('komentar') ? ' has-error' : '' }}">
	               <textarea class="form-control" name="komentar" placeholder="Tulis komentar anda disini. . ." id="komentar"></textarea>
                    <p align="center" style="color: red"><strong>{{ $errors->first('komentar') }}</strong></p>
	            </div>
            </div>
            <div class="form-submit1">
            	<input type="hidden" name="id_lowker" value="{{ $data->id_lowker }}"><br>
	           <input name="submit" type="submit" id="submit" value="Komentari"><br>
	        </div>
			<div class="clearfix"></div>
          </form>
	   </div>
	 
	   <div class="col-md-4">
	   	  <div class="col_3">
	   	  	<h3>Detail Jobs</h3>
	   	  	<ul class="list_1">
	   	  		<li><strong>Title:</strong><br/>{{ $data->judul }}</li>
	   	  		<li><strong>Institution Name:</strong><br/>{{ $data->nama_lembaga }}</li>		
	   	  		<li><strong>Address:</strong><br/>{{ $data->alamat }}</li>
	   	  		<li><strong>Validity Period:</strong><br/>{{ $data->masa_berlaku }}</li>
	   	  		<li><strong>Salary/ Month:</strong><br/>{{ $data->gaji }}</li>
	   	  		<li><strong>Deadline for Apply:</strong><br/>{{ $data->deadline }}</li>
	   	  		<li><strong>Institution Contact:</strong><br/>{{ $data->kontak }}</li>
	   	  		<li><strong>Job Category:</strong><br/>{{ $data->kategori }}</li>
	   	  		<a href='{{ url("simpan-lowker/$data->id_lowker") }}' target="_blank"><li><i class="fa fa-download" aria-hidden="true"></i><strong>   Download This Job</strong></li></a>
	   	  	</ul>
	   	  </div>
	   	  <div class="col_3">
	   	  	<h3>Share</h3>
	   	  		<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600'); return false;"><i id="social" class="fa fa-facebook-square fa-3x"></i></a>
	   	  		<a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600'); return false;"><i id="social" class="fa fa-twitter-square fa-3x"></i></a>  	
	   	  </div>
	 </div>

	 </div>

	 <script src="{{asset('js/lowker.js')}}"></script>

</div>
@endsection