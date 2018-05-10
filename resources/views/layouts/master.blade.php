<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>@yield('title')</title> 
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/customStyle.css') }}" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'> 
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Script -->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' /> 
    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/ajax/jquery.min.js')}}"></script>
</head>
<body>
    <nav class="navbar navbar-default custom-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/Logo JPS Transparan.png') }}"></a>
            </div>
            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li class="dropdown dc">
                        @if(Session::get('admin') != null) <!-- Admin login -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="members/default.jpg"><b class="caret"></b></a>
                        @elseif (Auth::guest()) <!-- belum login -->
                        @else <!-- Member login --> 
                            
                        @if(file_exists(public_path("members/".Auth::user()->id."/".Auth::user()->id.".jpg")))
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src='{{ asset("members/".Auth::user()->id."/".Auth::user()->id.".jpg") }}'><b class="caret"></b></a>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="members/default.jpg"><b class="caret"></b></a>
                            @endif
                        @endif
                        <ul class="dropdown-menu">
                            @if(Session::get('admin') != null) <!-- Admin login -->
                                <li><a href="{{ url('keluar-admin') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                            @else <!-- Member login -->
                                <li><a href="{{ url('profil') }}"><span class="glyphicon glyphicon-user"></span> Profilku</a></li>
                                <li><a href="{{ url('lowker/tambah-lowker') }}"><i class="fa fa-plus"></i> Tambah Lowker</a></li>
                                <li><a href="{{ url('notifikasi') }}"><i class="fa fa-bell-o"></i> Pemberitahuan</a></li>
                                <li><a href="{{ url('keluar') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Logout</a>
                                    <form id="logout-form" action="{{ url('keluar') }}" method="POST" style="display: none;">
                                    </form></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </nav>
<div class="wrapper-con">
    @yield('content')
    <div class="push"></div>
</div>
    <div class="footer">
      <div class="container">
        <div class="copy">
            <p>Job Placement Sport is a useful web-based application to help users find job vacancies and seek employment in sports. Users looking for job vacancies can directly apply for the desired job vacancy through Job Placement Sport application and for users looking for a workforce can directly select applicants through Job Placement Sport application. </p><br>
            <p>Copyright © 2017 Job Placement Sport</p>
        </div>
      </div>
    </div>
    <!-- <script src="{{ asset('js/app.js') }}"></script>   -->
    <script type="text/javascript">
      $(function(){
        var url = window.location.href;
        $("#menu a").each(function() {
          if(url == (this.href)) { 
              $(this).closest("li").addClass("active");
          }
        });
    });
    </script>
</body>
</html>