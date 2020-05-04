@extends('layouts.app')

@section('styles')
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
    .profile-image {
      object-fit: cover;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 1px solid #18988b;
      margin-bottom: 5px;
    }
    .following-card-container {
      display: flex;
      flex-wrap: wrap;
      margin: 20px 0px;
    }
    .following-card {
      margin-right: 20px;
      margin-bottom: 20px;
      width: 300px;
      height: 350px;
      background-color: #fff;
      border-radius: 10px;
      text-align: center;
      padding: 20px;
      box-shadow: 2px 2px 20px rgba(0,0,0,0.3);
      color: #501A3E;
      letter-spacing: 1.08px;
    }
    .following-card:hover {
      border: 1px solid #18988b;
    }
    .following-card a {
      color: #501A3E;
      font-size: 14px;
    }

    .following-card .view-profile-container {
      margin-top: 20px;
    }
    .following-heading {
      padding: 20px 0px;
    }
    @media (max-width: 754px) {
      .main-grid-container {
        display: grid;
        grid-template-columns: auto;
      }
      .following-card-container {
        width: 90%;
        margin: auto;
        justify-content: center;
      }
      .following-heading {
        width: 90%;
        margin: auto;
        text-align: center;
      }
    }

    @media(max-width: 500px) {
      .following-card {
        width: 270px;
      }
           
    }
    
    @media (max-width: 318px) {
      main {
        margin-top: 125px;
      }
    }
    @media(max-width: 270px) {
      .following-card {
        width: 220px;
      }     
    }
  </style>
@endsection

@section('content')
  <slide-menu
    dashboard-route="{{route('home')}}" 
    view-profile-route="{{route('profiles.show', ['id' => auth()->user()->profile->id])}}"
    posts-route="{{route('posts.index')}}"
    drafts-route="{{route('drafts.index')}}"
    followers-route = "{{route('follows.followers')}}"
    following-route = "{{route('follows.following')}}"
  >
  </slide-menu>

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
    <div>
    <h2 class="following-heading"> FOLLOWING </h2>
    @if ($followings->count() == NULL)
      <h2 class="following-heading"> You are not following anyone </h2>
    @else 
    <div class="following-card-container">
        @foreach($followings as $following)
        <div class="following-card">
        
            <div>
              @if( DB::table('profiles')->where('id', $following->profile_id)->value('profilePicture') !== NULL )
                <img src="/storage/profilePictures/{{DB::table('profiles')->where('id', $following->profile_id)->value('profilePicture')}}" alt="profile picture of those I am following" class="profile-image">
              @else
                <img src="/images/profilePicture.svg" alt="profile picture of those I am following" class="profile-image">
              @endif
            </div>
            <div>
              {{ DB::table('users')->where('id', $following->profile_id)->value('username') }}
            </div>
            <div class="view-profile-container">
              <a href="{{route('profiles.show', ['id' => DB::table('profiles')->where('id', $following->profile_id)->value('id')])}}"> 
                VIEW PROFILE 
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @endif
      
    </div>
  </div>

  <create-post create-post-route="{{route('posts.create')}}"> </create-post>

@endsection