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
      display: flex;
      margin-right: 20px;
      margin-left: 20px;
    }
    .search-post-container {
      margin-top: 20px;
      display: flex;
    }
    .search-input-container {
      width: 100%;
    }
    .search-input-container input {
      width: 100%;
      height: 40px;
      border-radius: 20px;
      outline: none;
    }
    .search-post-container input[type = "submit"] {
      border-radius: 20px;
      letter-spacing: 1.08px;
      margin-left: -80px;
      margin-top: 5px;
      padding:2px 10px;
      background-color: #0069D9;
      color: #fff;
      outline: none;
    }
    .guest-post-view {
      width: 90%;
      margin: 100px auto;
      
    }
    .paginate-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    @media (max-width: 754px) {
      .main-grid-container {
        width: 90%;
        margin:auto;
      }
      .search-post-container {
        width: 90%;
        margin: 20px auto;
      }
    }
    @media (max-width: 318px) {
    main {
      margin-top: 125px;
    }
  }
  </style>
@endsection

@section('content')

  <div class="main-grid-container">
    @auth
      <left-menu 
        dashboard-route="{{route('home')}}" 
        view-profile-route="{{route('profiles.show', ['id' => auth()->user()->profile->id])}}"
        posts-route="{{route('posts.index')}}"
        drafts-route="{{route('drafts.index')}}"
        followers-route = "{{route('follows.followers')}}"
        following-route = "{{route('follows.following')}}"
      >
      </left-menu>
    @endauth

    <div>
      <div >
        <div>
          <form action="/allstories" method="post">
            @csrf
            <div class = "search-post-container" >
              <div class = "search-input-container" >
                <input type="text" name="search"> 
              </div>
              <div>
                <input type="submit" value="Search">
              </div>
            </div>
          </form>
        <div>

        @foreach($search as $search)
          <list-stories
            post-title = "{{$search->title}}"
            post-author = "{{$search->user->username}}"
            post-tags = "{{$search->tags}}"
            post-date="{{date('F j Y'), strtotime($search->created_at)}}"
            post-cover-photo = "/storage/coverPhotos/{{$search->coverPhoto}}"
            post-likes-count = "{{$search->likes->count()}}"
            author-photo-exists = "{{$search->user->profile->profilePicture !== NULL }}" 
            author-photo = "/storage/profilePictures/{{$search->user->profile->profilePicture}}"
            is-cover-photo = "{{$search->coverPhoto !== NULL}}"
            view-profile = "{{route('profiles.show', ['id' => $search->user->profile->id])}}"
            view-post="{{route('posts.show', ['id'=>$search->id, 'title' => $search->title ])}}"
          >
          </list-stories>
        @endforeach
          
        @foreach($posts as $post)
          <list-stories 
            post-title = "{{$post->title}}"
            post-author = "{{$post->user->username}}"
            author-photo-exists = "{{$post->user->profile->profilePicture !== NULL }}" 
            author-photo = "/storage/profilePictures/{{$post->user->profile->profilePicture}}"
            view-profile = "{{route('profiles.show', ['id' => $post->user->profile->id])}}"
            post-tags = "{{$post->tags}}"
            post-date="{{date('F j Y'), strtotime($post->created_at)}}"
            is-cover-photo = "{{$post->coverPhoto !== NULL}}"
            post-cover-photo = "/storage/coverPhotos/{{$post->coverPhoto}}"
            view-post="{{route('posts.show', ['id'=>$post->id, 'title' => $post->title ])}}"
            post-likes-count = "{{$post->likes->count()}}"
          >
          </list-stories>
            
        @endforeach
      </div>

      <div class="paginate-container">
        {{$posts->links()}}
      </div>

    </div>

  </div>
 
@endsection

  