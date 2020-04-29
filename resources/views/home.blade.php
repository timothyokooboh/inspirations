@extends('layouts.app')
    <style>
        main {
            margin-top: 80px;
        }
        body {
            margin: 0px;
            -ms-overflow-style: none;
            overflow-y: scroll;
        }
        body::-webkit-scrollbar {
            display: none;
        }
        .main-grid-container {
            display: grid;
            grid-template-columns: 300px 3fr;
        }
      
        @media (max-width: 318px) {
            main {
            margin-top: 125px;
            }
        }

    </style>

@section('content')
    <!--------------------------Slide bar menu for small screens------------------------------->
    <slide-menu
        dashboard-route="{{route('home')}}" 
        view-profile-route="{{route('profiles.show', ['id' => auth()->user()->profile->id])}}"
    >
    </slide-menu>

    <div class="main-grid-container">
        <left-menu 
        dashboard-route="{{route('home')}}" 
        view-profile-route="{{route('profiles.show', ['id' => auth()->user()->profile->id])}}"
        >
        </left-menu>

        <div></div>
    </div>

    <create-post create-post-route="{{route('posts.create')}}"> </create-post>
    
@endsection


