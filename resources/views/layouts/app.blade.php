<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 , minimum-scale=1.0">
    <meta name="keywords" content="inspiration, motivation, stories, blog, website, webapp">
    <meta name="description" content="Create, share and find inspirational stories and tips">
    <meta name="author" content="Timothy Okooboh">

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
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#000000">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="PWA">
<link rel="icon" sizes="512x512" href="/images/icons/icon-512x512.png">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="PWA">
<link rel="apple-touch-icon" href="/images/icons/icon-512x512.png">

<link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">
    @laravelPWA

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
        .sm-view {
            display: none;
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
        @media (max-width: 754px) {
            .sm-view {
                display: block;
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
                            <a class="nav-link stories " href="{{ route('allstories') }}" > 
                                ALL STORIES 
                            </a>
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
                                <li class="nav-item">
                                    <a class = "nav-link stories sm-view" href="{{ route('home') }}" > 
                                        DASHBOARD
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class = "nav-link stories sm-view" href= "{{route('profiles.show', ['id' => auth()->user()->profile->id])}}" > 
                                        VIEW PROFILE
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class = "nav-link stories sm-view" href= "{{route('posts.index')}}" > 
                                        POSTS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class = "nav-link stories sm-view" href= "{{route('drafts.index')}}" > 
                                        DRAFTS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class = "nav-link stories sm-view" href= "{{route('follows.followers')}}" > 
                                        FOLLOWERS
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class = "nav-link stories sm-view" href= "{{route('follows.following')}}" > 
                                        FOLLOWING
                                    </a>
                                </li>
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

    <script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
   
    @yield('scripts')
</body>
</html>
