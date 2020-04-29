<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 , minimum-scale=1.0,user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inspirations') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&family=Courgette&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
 <style>

        body {
            font-family: 'Lato', sans-serif;
        }

        .navbar {
            background-color: #ffffff;
        }

        #login {
            color: #501A3E;
            background-color: #FFFFFF;
            margin-right: 15px;
            width: 115px;
            height: 40px;
            font-size: 0.9em;
            font-weight: 500;
            border-radius: 5px;
            border: 1px solid #18988b;
            text-align: center;
            letter-spacing: 1.08px;          
        }

        #login:hover {
            background-color: #FAF0F8;  
        }
        #getStarted {
            color: #FAF0F8;
            background-color: #501A3E;
            width: 115px;
            height: 40px;
            font-size: 0.9em;
            font-weight: 500;
            border-radius: 5px;
            text-align: center; 
            letter-spacing: 1.08px;
        }
        #getStarted:hover {
            background-color: #501D5E;   
        }
        .stories {
            color: #501A3E;
            background-color: #FFFFFF;
            margin-right: 15px;
            width: 115px;
            height: 40px;
            font-size: 0.9em;
            font-weight: bold;
            border-radius: 5px;
            border: 1px solid #18988b;
            text-align: center;          
        }

        .stories:hover {
            background-color: #FAF0F8;
        }

        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #18988b;
            margin-left: 20px;
        }
        .username a {
            color: #501A3E;
        }
        .username a:hover {
            text-decoration: none;
        }

        .auth-menu-items {
            display: flex;
        }

        .auth-menu-links-container {
            text-align: right;
        }

        .auth-menu-links {
            color: #501A3E;
            font-size: 14px;
            text-align: right;
        }
        .auth-menu-links:hover {
            text-decoration: none;
            color: #000;
        }

        .project-name {
            color: #501A3E;
            font-weight: bold;
        }
    
        .title-container {
            display: flex;
            align-items: baseline;
            letter-spacing: 1.08px;
        }
        .title-container img {
            width: 20px;
            height: 20px;
            margin-left: 10px;
            margin-top:-12px;
        }

        .title-container h1 {
            font-size: 25px;
            font-weight: bold;
        }

        @media only screen and (max-width: 765px){            
            .stories {
                margin-top: 10px;
                width: 100%;          
            }
            #login {
                margin-top: 10px;
                width: 100%;          
            }

            #getStarted {
                margin-top: 10px;
                width: 100%;
            }
        
            .auth-menu-items {
                margin-top: 10px;
            }
        }
    </style>
   
</head>
<body>
    <div id="app">
        
        <nav class="navbar fixed-top navbar-expand-md navbar-light shadow-sm">
            <div class="container-fluid pt-2 pb-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="title-container">
                        <div class="project-name">
                            <h1>INSPIRATIONS</h1>
                        </div>
                        <div>
                            <img src="/images/bulb.svg" alt="">
                        </div>                    
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="outline:none" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link stories " href="{{ route('login') }}" > ALL STORIES </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link stories" href="{{ route('login') }}"> NEW STORIES </a>
                        </li>
                                   
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" id="login"> LOGIN </a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" id="getStarted" href="{{ route('register') }}"> JOIN NOW </a>
                                </li>  
                            @endif
                            
                            @else
                            <li>
                                <div class="auth-menu-items">
                                    <div>
                                        <div class="username">
                                            <a href="{{route('home')}}" >{{ Auth::user()->username }}
                                            </a>
                                        </div>
                                        <div class="auth-menu-links-container">
                                            <a href="{{route('profiles.edit', ['id' => auth()->user()->profile->id])}}" class="auth-menu-links">
                                                Edit profile
                                            </a> |
                                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="auth-menu-links">
                                        Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                             </form>
                                        </div>
                                    </div>

                                    <div>
                                        @if (auth()->user()->profile->profilePicture !== NULL)
                                            <img src="/storage/profilePictures/{{auth()->user()->profile->profilePicture}}" alt="profile picture" class="profile-picture">
                                        @else
                                            <img src="/images/profilePicture.svg" alt="profile picture" class="profile-picture">
                                        @endif
                                    </div>
                                </div>
                            </li> 
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        <main>
            @include('inc.messages')
            @yield('content')
        </main>
    </div>

    <!-- Chart.js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"> </script>
   
    @yield('scripts')
</body>
</html>
