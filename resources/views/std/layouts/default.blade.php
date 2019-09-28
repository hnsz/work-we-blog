<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type='text/css'>
        .nav a:visited, .nav a:hover, .nav a:active, .nav a:link {
            color: white;
        }
    </style>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Asap+Condensed|Chilanka|Cinzel|Cormorant+Garamond|Crimson+Text|Dancing+Script|EB+Garamond|Gayathri|Gentium+Basic|Inconsolata|Josefin+Sans|Lato|Lexend+Giga|Lexend+Mega|Lexend+Peta|Lexend+Tera|Lexend+Zetta|Livvic|Manjari|Merriweather|Open+Sans|Philosopher|Poppins|Quattrocento|Quicksand|Tangerine|Tinos&display=swap" rel="stylesheet">
    <style type='text/css'>
        .philosopher {
            font-family: Philosopher;
            font-size:22pt;
        }        
        


        .cormorant {
                font-family: Cormorant;
                
        }
        
        .content .card-title {
            font-family: Cinzel;
            font-size:15pt;
        }
        .nav-pills {
            font-family: Lato;
            font-weight:bold;
            }
        body {
            background-color:#456789;
        }
        .container {
            background-color:#9e124c;
            opacity:0.8;
        }
        .wrapper {
            padding: 7px 5px 10px 5px;
            background-color:white;
                    
        }
        
    </style>

</head>
<body>
<div class='container flex-center position-ref full-height pt-2'>
    <div class='wrapper'>


    <ul class='nav nav-pills'>
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

    <div class='.content-header-wrap'>
    @yield('header')


    <div class='.content-body-wrap'>
        <div class="content">
            @yield('content')
        </div> <!--//content   -->
    </div>

        <nav class="navbar navbar-light navbar-fixed-bottom row">
            @section('links')
                <a href="https://laravel.com/docs">Docs</a>
            @show
        </nav>
    </div>  <!--// wrapper -->
</div> <!--// container    -->
</body>
</html>

