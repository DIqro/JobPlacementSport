<!DOCTYPE html>
<html lang="en">
<head>
	<title>Job Placement Sport</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/loginStyle.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link href="//fonts.googleapis.com/css?family=Tenali+Ramakrishna&amp;subset=telugu" rel="stylesheet">
	<link rel="stylesheet" href='{{ asset("bootstrap/css/bootstrap.min.css") }}'>
    <script src='{{ asset("js/jquery-3.2.1.js") }}'></script>
    <style type="text/css">
    	span{
    		color: red;
    	}
    </style>
</head>
<body>
<!-- main -->
<div id="particles-js"></div>
<h1 style="color: white">Job Placement Sport</h1>
<div class="main-agileinfo">
	@if(session('terdaftar'))
        <div class="alert alert-success alert-dismissable">
            <a href="#" aria-label="close" class="close" data-dismiss="alert">&times;</a>
            <strong>{{ session('terdaftar') }}</strong> 
        </div>
    @endif
	<div class="contact-w3left">
	<img src="images/1495646438cristiano-ronaldo-2017.png" alt="">  
	</div>
	<div class="videologin">
		<h2 class="sub-head">Signup Here</h2>
		<form action="{{ url('register') }}" method="post">
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				<div class="icon1">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input placeholder="Name" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<div class="icon1">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<input placeholder="Email" id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" >
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
				<div class="icon1">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<input placeholder="Alamat" id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" >
                    @if ($errors->has('alamat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alamat') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
				<div class="icon1">
					<i class="fa fa-list-alt" aria-hidden="true"></i>
					<input placeholder="Tanggal lahir. ex : 1997-11-04" id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" >
                    @if ($errors->has('tgl_lahir'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tgl_lahir') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<div class="icon1">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
					<input placeholder="Password" id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
				<div class="icon1">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
					<input placeholder="Confirm Password" id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
			
			<div class="clear"></div>
			<div class="bottom">
				<input type="submit" value="Signup" />
			</div>
		</form>	
	</div>	
	<div class="clear"></div>
</div>
<div class="copyw3-agile">
	<p> © 2017 Job Placement Sport</p>
</div> 
	<script src="js/particles.js"></script>
	<script src="js/app.js"></script> 
</body>
</html>