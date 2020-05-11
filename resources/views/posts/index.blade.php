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
    .no-post {
      color: #501A3E;
      text-transform: uppercase;
      font-size: 16px;
      letter-spacing: 1.08px;
    }

    .post-card-actions form input[type="submit"] {
      background-color: transparent;
      border: none;
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

      @if($posts->count() === 0)
        <span class="no-post"> You have not created any post </span>
      @endif

      @foreach ($posts as $post)
        <div class="post-card">
          <div class="post-title hide"> {{ $post->title }} </div>
          @if($post->coverPhoto !== NULL)
            <div class="hide">
              <img src="/storage/coverPhotos/{{$post->coverPhoto}}" alt="cover photo for the post" class="cover-photo"> 
            </div>
          @endif
          <div class="hide story"> {!! substr($post->story, 0, 50) !!} </div>
          <div class="hide"> Posted on {{date('F j Y'), strtotime($post->created_at)}} </div>
          <div class="post-card-actions">
            <div>
              <a href="{{route('posts.show', ['id'=>$post->id, 'title' => $post->title ])}}"> VIEW </a>
              </div>
            <div>
              <a href="{{route('posts.edit', ['id'=>$post->id])}}"> EDIT </a>
            </div>
            <div>
              <form action = "{{route('posts.delete', ['id' => $post->id])}}" method="POST" onsubmit=" return confirmDelete()">
                @csrf
                @method('DELETE')
                <input type="submit" value="DELETE" >
              </form>
            </div>
          </div>
          
        </div>
      @endforeach
    </div>
  </div>

  <create-post create-post-route="{{route('posts.create')}}"> </create-post>

@endsection

@section('scripts')

  <script>
    function confirmDelete() {
      if ( confirm('Are you sure you want to delete this post?')) {
        return true;
      } else {
        return false;
      }
    }
  </script>
    
@endsection

  