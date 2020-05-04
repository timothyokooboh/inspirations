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
      column-gap: 100px;
    }
    .paginate-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    @media (max-width: 754px) {
      .main-grid-container {
        display: grid;
        grid-template-columns: auto;
      }
      .post-card-container {
        justify-content: center;
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

 <!-- Most of the styles for the route are located on the _postIndex.scss file  -->

  @auth
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

      <div class="post-card-container">
        @foreach($posts as $post)
          <list-stories 
            post-title="{{$post->title}}"
            post-image="/storage/coverPhotos/{{$post->coverPhoto}}"
            post-content="{{ substr($post->story, 0, 50) }} ..." 
            post-date="{{date('F j Y'), strtotime($post->created_at)}}"
            view-post="{{route('posts.show', ['id'=>$post->id, 'title' => $post->title])}}"
            edit-post="{{route('posts.edit', ['id'=>$post->id])}}"
            auth-user="{{$post->user_id === auth()->user()->id}}"
            is-coverphoto = "{{$post->coverPhoto !== NULL}}"
            >
          </list-stories>
        @endforeach
      </div>

    </div>
  @endauth

  @guest

    <div class=" guest-user post-card-container">
      @foreach($posts as $post)
        <list-stories 
          post-title="{{$post->title}}"
          is-coverphoto = "{{$post->coverPhoto !== NULL}}"
          post-image="/storage/coverPhotos/{{$post->coverPhoto}}"
          post-content="{{ substr($post->story, 0, 50) }} ..." 
          post-date="{{date('F j Y'), strtotime($post->created_at)}}"
          view-post="{{route('posts.show', ['id'=>$post->id, 'title' => $post->title])}}"
        >
        </list-stories>
      @endforeach
    </div>

  @endguest
 
@endsection

  