<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .nav a:visited, .nav a:hover, .nav a:active, .nav a:link {
            color: white;
        }
    </style>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Asap+Condensed|Chilanka|Cinzel|Cormorant+Garamond|Crimson+Text|Dancing+Script|EB+Garamond|Gayathri|Gentium+Basic|Inconsolata|Josefin+Sans|Lato|Lexend+Giga|Lexend+Mega|Lexend+Peta|Lexend+Tera|Lexend+Zetta|Livvic|Manjari|Merriweather|Open+Sans|Philosopher|Poppins|Quattrocento|Quicksand|Tangerine|Tinos&display=swap" rel="stylesheet">


    <style>
        .philosopher {
            font-family: Philosopher;
            font-size:22pt;
        }        
        .cormorant {
                font-family: Cormorant;
                
        }
        .EBGaramond-Regular {
                font-family: 'EB Garamond', serif;
                font-size: 18px;

        }

        body {
            background-color:#456789;
        }
        .container {
            background-color:#ffeeef;
        }

        .content {
            padding:  15px 10px 100px 10px;
            background-color:#9e124c;
            opacity:0.8;
        }
        .content-header-wrap {
            background-color:#456789;            
        }   
        .content-body-wrap {
            background-color:#456789;
        }        

        .content-header-wrap .card {
            margin:10px;
            padding:20px;
            font-family: Cinzel;
            font-size:15pt;
        }
        .content-body-wrap .card {
            margin:10px;
            padding: 15px 50px 20px 70px;
        }
        .navbar-fixed-bottom {
            padding-bottom:30px;
        }
        .nav-pills {
            font-family: Lato;
            font-weight:bold;
            }

        
    </style>

</head>
<body>
<div class='container flex-center position-ref full-height pt-2'>
    <ul class='nav nav-pills EBGaramond-Regular'>
        @section('site navigation')
        @include('std.parts.links', ['site_links' => [
                ['href'=>'/', 'name'=>'/'],
                ['href'=>'/', 'name'=>' Something'],
                ['href'=>'/posts', 'name'=>'Popular Posts'],
            ]
        ])
        @show

        @if (Route::has('login'))
            <li class='nav-item rounded-top bg-info text-list mr-1 p-1'> <!--// has login-->
                @auth
                    <a href="{{ url('/dashboard/') }}">Dashboard</a>

                    <a href="{{ route('logout') }}">Logout</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"> |: Register</a>
                    @endif
                @endauth
            </li> <!--// has login   -->
        @endif
    </ul>

    <div class="content">
        <div class='content-header-wrap' >
            @yield('header')
        </div>      <!--//  content-header-wrao -->
        

        <div class='content-body-wrap'>
            
                @yield('content')

        </div>      <!--//  content-body-wrao -->
    </div> <!--//content   -->

            <nav class="navbar navbar-light navbar-fixed-bottom row">
                @section('links')
                    <a href="https://laravel.com/docs">Docs</a>
                @show
            </nav>      <!--//  navbar -->
        
    </div> <!--// container    -->
</body>
</html>

