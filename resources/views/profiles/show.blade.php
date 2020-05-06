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
            column-gap: 100px;
        }
        .profile-picture-container {
          display: flex;
          align-items: baseline;
        }
        #picture {
          width: 150px;
          height: 150px;
          border-radius: 50%;
          margin-right: 10px;
        }
        .account-info-title {
          letter-spacing: 1.08px;
          font-size: 20px;
          font-weight: bold;
          padding: 20px 0px;
          color: #501A3E;
        }
        .account-info {
          display: grid;
          grid-template-columns: auto auto;
          font-size: 16px;
          row-gap: 20px;
          letter-spacing: 1.08px;
          color: #501A3E;
        }
        .account-info-description {
          text-transform: uppercase;
        }
        .profile-description {
          color: #FF485A;
        }
        .call-to-action {
          margin-top: 20px;
        }
        .edit-profile {
          background-color: #501A3E;
          border-radius: 4px;
          border:none;
          outline: none;
          letter-spacing: 1.08px;
          font-size: 14px;
        }
        .edit-profile a {
          text-decoration: none;
          color: #FAF0F8;
        }
        .edit-profile a:hover {
          text-decoration: none;
          color: #FAF0F8;
        }
        .icon {
          width: 15px;
          height: 15px;
        }
        .account-nomenclature {
          font-size: 16px;
          color: #501A3E; 
        }

        @media (max-width:1161px) {
            .account-info {
              grid-template-columns: auto;
          }
        }

        @media (max-width: 754px) {
          .main-grid-container {
            display: grid;
            grid-template-columns: auto;
        } 
        .account-info {
          grid-template-columns: auto auto;
        }
          .profile-container {
            width: 90%;
            margin: auto;
            margin-bottom: 20px;
          }
        }

        @media(max-width: 700px) {
          .account-info {
            grid-template-columns: auto;
          }
        }

        @media (max-width: 500px) {
          #picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
          }
        }
        @media (max-width: 318px) {
          main {
            margin-top: 125px;
          }
        }
         
      
    </style>
@section('content')

  <div class="main-grid-container">
    <left-menu 
      dashboard-route="{{route('home')}}" 
      view-profile-route="{{route('profiles.show', ['id' => auth()->user()->id])}}"
      posts-route="{{route('posts.index')}}"
      drafts-route="{{route('drafts.index')}}"
      followers-route = "{{route('follows.followers')}}"
      following-route = "{{route('follows.following')}}"
    >
    </left-menu>  
    
    <div class="profile-container">

      <div class="profile-picture-container">
        <div class="image-container">
          @if ($profile->profilePicture !== NULL)
            <img src="/storage/profilePictures/{{$profile->profilePicture}}" alt="profile picture" id="picture">
          @else
            <img src="/images/profilePicture.svg" alt="profile picture" id="picture">
          @endif
        </div>
        <div class="account-nomenclature">
          {{$profile->firstName}} {{$profile->lastName}} <br>
          <img src="/images/location.svg" class="icon"> {{$profile->state}}, {{$profile->country}}
          <div class="call-to-action">
            @if(auth()->user()->profile->id == $profile->id )
              <button class="edit-profile"> 
                <a href="{{route('profiles.edit', ['id' => $profile->id])}}"> EDIT PROFILE </a>
              </button>
            @else 
              <follow-button
                user-id = "{{$profile->user_id}}"
                follows = {{$follows}}
              >
              </follow-button>
            @endif
          </div>
        </div>
      </div>

      <div class="account-info-title"> ACCOUNT INFORMATION </div>
      <div class="account-info" > 
        <div>  
          <span class="account-info-description"> Phone: </span> {{$profile->phone}} 
        </div>

        <div>  
          <span class="account-info-description"> Email: </span> {{$profile->user->email}} 
        </div>

        <div>  
          <span class="account-info-description"> Member since: </span> {{date("F j, Y", strtotime($profile->user->created_at))}} 
        </div>

        <div>  
          <span class="account-info-description"> Posts: </span> {{DB::table('posts')->where(['user_id'=> $profile->user_id, 'mode' => 'Public'])->count()}} 
        </div>

        <div>  
          <span class="account-info-description"> Drafts: </span> {{DB::table('posts')->where(['user_id'=> $profile->user_id, 'mode' => 'Private'])->count()}} 
        </div>

        <div>  
          <span class="account-info-description"> Followers: {{$profile->followers->count()}} </span> 
        </div>

        <div> 
          <span class="account-info-description"> Following: {{$profile->user->following->count()}} </span> 
        </div>

      </div>

    </div> 
  </div>

  <create-post create-post-route="{{route('posts.create')}}"> </create-post>

@endsection

<script>

</script>
