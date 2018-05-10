<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href='{{ asset("bootstrap/css/bootstrap.min.css") }}'>
    <script src='{{ asset("js/jquery-3.2.1.js") }}'></script>
    <link rel="shortcut icon" href="favicon.ico"/>
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('logo.png') }}" style="width: 70px; height: 45px">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if(Session::get('admin') != null) <!-- Admin login -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Session::get('nama') }}<span class="caret"></span>
                                </a> 
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('keluar-admin') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @elseif (Auth::guest()) <!-- belum login -->
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ url('/masuk') }}">
                                    <div class="form-inline">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        @else <!-- Member login -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('profil') }}"><span class="glyphicon glyphicon-user"></span> Profilku</a>
                                        <a href="{{ url('lowker/tambah-lowker') }}"><i class="fa fa-plus"></i> Tambah Lowker</a>
                                        <a href="{{ url('notifikasi') }}"><i class="fa fa-bell-o"></i> Pemberitahuan</a>
                                        <a href="{{ url('keluar') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('keluar') }}" method="POST" style="display: none;">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
        @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>  
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