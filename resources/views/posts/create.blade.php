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
      color: #501A3E;
      letter-spacing: 1.08px;
    }
    .post-container div {
      margin: 20px 0px;
    }
    .input {
      width: 100%;
      padding-left: 10px;
      outline: none;
    }
    textarea {
      width: 100%;
      height: 200px;
      padding-left: 10px;
      outline: none;
    }
    input[type="submit"] {
      width: 100%;
      height: 40px;
      color: #FAF0F8;
      background-color: #0069D9;
      border: none;
      outline: none;
    }
    input[type=submit]::-moz-focus-inner {
      border: 0;
    }
    input[type=submit]:hover {
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    @media (max-width: 950px) {
      .post-container {
        margin-right: 20px;
      }
    }
    @media (max-width: 754px) {
      .main-grid-container {
        display: grid;
        grid-template-columns: auto;
      }
      .post-container {
        width: 90%;
        margin: auto
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
    >
    </left-menu>

    <div class="post-container">
      <h2> Share a Story or Inspirational Insights </h2>
      <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="title"> Post Title </label> <br>
          <input type="text" id="title" class="input" name="title" >
        </div>
        <div>
          <label for="cover-photo"> Cover Photo </label> <br>
          <input type="file" id="cover-photo" accept="image/*" name="coverPhoto">
        </div>
        <div>
          <label for="story"> Post Content </label> <br>
          <textarea id="story" name="story"  ></textarea>
        </div>
        <div>
          <label for="tags"> Tags (optional) </label>
          <p> Separate tags with comma </p>
          <input type="text" id="tags" class="input" name="tags" placeholder="e.g. health, relationships, career">
        </div>
        <div>
          <p> Mode </p>
          <input type="radio" id="public" value="Public" name="mode">
          <label for="public"> Public </label> <br>
          <input type="radio" id="private" value="Private" name="mode">
          <label for="private"> Private (Post will be saved as draft) </label>
        </div>
        <div>
          <input type="submit" value="PUBLISH">
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('ckeditor/ckeditor.js')}}"> </script>
  <script>
    window.addEventListener('DOMContentLoaded', ()=>{
      CKEDITOR.replace('story')
    })
  </script>

@endsection


