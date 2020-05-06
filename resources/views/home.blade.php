@extends('layouts.app')
    <style>
        main {
            margin-top: 85px;
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
            column-gap: 50px;
        }
        .counts-card-container {
            display: flex;
            flex-wrap: wrap;
            margin: 20px 0px;
        }
        .counts-card {
            width: 300px;
            height: 350px;
            margin-right: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            text-align: center;
            box-shadow: 2px 2px 20px rgba(0,0,0,0.3);
            color: #501A3E;
            letter-spacing: 1.08px;
            display: grid;
            justify-content: center;
            align-content: center;
        }
        .counts-card:hover {
            border: 1px solid #18988b;
        }
        .counts-card-heading {
            padding-bottom: 40px;
        }
        .counts-card-score {
            color: #fd7831;
            font-weight: bold;
            font-size: 58px;
            width: 100%;
            //display: flex;
            /* justify-self: center;
            align-self: center; */
        }
        @media (max-width: 754px) {
            .main-grid-container {
                display: grid;
                grid-template-columns: auto;
            }
            .counts-card-container {
                width: 90%;
                margin: auto;
                justify-content: center;
            }
        }
        @media (max-width: 500px) {
            .counts-card {
                width: 270px
            }
            .counts-card-score { 
                font-size: 40px
            }
        }
        
        @media (max-width: 318px) {
            main {
            margin-top: 125px;
            }
        }

        @media(max-width: 270px) {
            .counts-card {
                width: 200px;
            }
            .counts-card-score { 
                font-size: 30px
            }
         }

    </style>

@section('content')

    <div class="main-grid-container">
        <left-menu 
        dashboard-route="{{route('home')}}" 
        view-profile-route="{{route('profiles.show', ['id' => auth()->user()->profile->id])}}"
        posts-route="{{route('posts.index')}}"
        drafts-route="{{route('drafts.index')}}"
        followers-route = "{{route('follows.followers')}}"
        following-route = "{{route('follows.following')}}"
        >
        </left-menu>

        <div class="counts-card-container">
            <div class="counts-card">
                <h3 class="counts-card-heading"> POSTS </h3>
                <div class="counts-card-score"> {{$postCount}} </div>
            </div>
            <div class="counts-card">
                <h3 class="counts-card-heading"> DRAFTS </h3>
                <h1 class="counts-card-score"> {{$draftCount}} </h1>
            </div>
            <div class="counts-card">
                <h3 class="counts-card-heading"> FOLLOWERS </h3>
                <h1 class="counts-card-score"> {{$followersCount}} </h1>
            </div>
            <div class="counts-card">
                <h3 class="counts-card-heading"> FOLLOWING </h3>
                <h1 class="counts-card-score"> {{$followingCount}} </h1>
            </div>
        </div>
    </div>

    <create-post create-post-route="{{route('posts.create')}}"> </create-post>
    
@endsection


