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
     .post-container {
      margin-right: 100px;
      margin-top: 20px;
    }
    
    .profile-photo {
      object-fit: cover;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: 1px solid #18988b;
    }
    .guest-post-container {
      width: 90%;
      margin: auto;
      margin-top: 100px;
    }
    .guest-post-container div {
      padding-bottom: 10px;
    } 
    .comments-container {
      display: flex;
    }
    .comments-container > div {
      margin: 10px 10px;
    }
    .form-flex-container {
      display: flex;
      justify-content: space-between;
      letter-spacing: 1.08px;
    }
    .form-flex-container button {
      background-color: #227DC7;
      border-radius: 4px;
      border: none;
      outline: none;
    }
    .form-flex-container button a {
      text-decoration: none;
    }
    .form-flex-container input[type="submit"] {
      background-color: #C51F1A;
      color: #fff;
      border-radius: 4px;
      border: none;
      outline: none;
    }
    @media (max-width: 754px) {
      .main-grid-container {
        display: grid;
        grid-template-columns: auto;
      }
      .post-container {
        width: 90%;
        margin: auto;
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

      <div class="post-container">
        
          <view-story
            cover-photo = "/storage/coverPhotos/{{$post->coverPhoto}}"
            post-title = "{{$post->title}}"
            post-tags = "{{$post->tags}}"
            post-date = "{{date('F j Y'), strtotime($post->created_at)}}"
            post-author = "{{$post->user->username}}"
            photo-author = "/storage/profilePictures/{{$post->user->profile->profilePicture}}"
            view-profile = "{{route('profiles.show', ['id' => $post->user->profile->id])}}"
            post-content = "{{$post->story}}"
            is-coverphoto = "{{$post->coverPhoto !== NULL}}"
            is-author-photo = "{{$post->user->profile->profilePicture !== NULL}}"
            is-author = "{{$post->user_id === auth()->user()->id}}"
            user-id = "{{$post->user_id}}"
            follows = {{$follows}}
            
          >
          </view-story>

          @if ($post->mode == 'Public')
            <likes-button
              post-id = "{{$post->id}}"
              likes = "{{$likes}}"
              post-count = "{{$post->likes->count()}}"
            >
            </likes-button>
          @endif
    
  
          @if ( $post->user_id === auth()->user()->id )
            <div class='form-flex-container'>
              <div>
                <button>
                  <a href = "{{route('posts.edit', ['id' => $post->id])}}" class="text-white" > EDIT </a> 
                </button>
              </div>
              <div>
                <form action = "{{route('posts.delete', ['id' => $post->id])}}" method="POST" onsubmit=" return confirmDelete()">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="DELETE" >
                </form>
              </div>
            </div>
          @endif

        @if ($post->mode == 'Public')

          <div>
            <form action="/comments/store/{{$post->id}}" method="POST">
              @csrf

              <make-comment
                auth-username = "{{auth()->user()->username}}"
                is-auth = "{{auth()->user()->id !== NULL}}"
              > 
              </make-comment>
            </form>
          </div>

        @endif

      @foreach($comments as $comment)
        <div class="comments-container">
          <div>
            @if($comment->user_id !== NULL)
              @if($comment->user->profile->profilePicture !== NULL)
                <img src="/storage/profilePictures/{{$comment->user->profile->profilePicture}}" class="profile-photo" alt="Profile photo of the commenter">
              @else
                <img src="/images/profilePicture.svg" alt="profile picture" class="profile-photo">
              @endif
            @else
              <img src="/images/profilePicture.svg" alt="profile picture" class="profile-photo">
            @endif
          </div>
          <div>
            @if($comment->name == NULL)
              <div> 
                <i> {{$comment->user->username}} </i> 
              </div>
            @else 
              <div>
                <i>{{$comment->name}}</i>
              </div>
            @endif
            <div> {{$comment->comment}} </div>
          </div>
        </div>
      @endforeach

    </div>
  @endauth

  @guest
    <div class=" guest-post-container">
      <view-story
        cover-photo = "/storage/coverPhotos/{{$post->coverPhoto}}"
        post-title = "{{ $post->title }}"
        post-tags = "{{ $post->tags }}"
        post-date = "{{date('F j Y'), strtotime($post->created_at)}}"
        post-author = "{{$post->user->username}}"
        post-content = "{{ $post->story }}"
        is-coverphoto = "{{$post->coverPhoto !== NULL}}"
        photo-author = "/storage/profilePictures/{{$post->user->profile->profilePicture}}"
        is-author-photo = "{{$post->user->profile->profilePicture !== NULL}}"
        view-profile = "{{route('profiles.show', [ 'id' => $post->user->profile->id ])}}"
        
      >
      </view-story>

      <div>
        <likes-button
          post-id = "{{$post->id}}"
            likes = "{{$likes}}"
            post-count = "{{$post->likes->count()}}"
        >
      </likes-button>
      </div>
      
      <div>
        <form action="/comments/store/{{$post->id}}" method="POST">
          @csrf
          <make-comment> </make-comment>
        </form>
      </div>
    
      @foreach($comments as $comment)
        <div class="comments-container">
          <div>
            @if($comment->user_id !== NULL)
              @if($comment->user->profile->profilePicture !== NULL)
                <img src="/storage/profilePictures/{{$comment->user->profile->profilePicture}}" class="profile-photo" alt="Profile photo of the commenter">
              @else
                <img src="/images/profilePicture.svg" alt="profile picture" class="profile-photo">
              @endif
            @else
              <img src="/images/profilePicture.svg" alt="profile picture" class="profile-photo">
            @endif
          </div>
          <div>
            @if($comment->name !== NULL)
              <div> <i> {{$comment->name}} </i> </div>
            @else
              <div>
                <i> {{$comment->user->username}} </i>
              </div>
            @endif
            <div> {{$comment->comment}} </div>
          </div>
        </div>
      @endforeach
    </div>
  @endguest

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