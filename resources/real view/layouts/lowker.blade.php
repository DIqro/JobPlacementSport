<?php //for($i = 0; $i < 3; $i++){?>
<a href='{{ url("lowker/$data->id_lowker") }}'>
	<div class="col-md-3 col-md-offset-0">
	    <div class="panel panel-default">
	        <div class="panel-heading">{{ $data->judul }}</div>
	        <div class="panel-body">
	        	@if(strlen($data->deskripsi) > 120)
	            	{{ substr($data->deskripsi, 0, 120) }}. . .
	            @else
	            	{{ $data->deskripsi }}
	            @endif
	        </div>
	    </div>
	</div>
</a>
<?php//	 }?>