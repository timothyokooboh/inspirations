@extends('layouts.app')

        <!-- Styles -->
<style>
    
    body {    
        margin: 0;
        color: #FAF0F8;
        -ms-overflow-style: none;
        overflow-Y: scroll;
        box-sizing: border-box;
    }
    body::-webkit-scrollbar {
        display: none;
    }
          
    .landing-view {
        background: 
        linear-gradient(
            146deg, 
            rgba(80, 26, 62, 0.69) 37%,
            rgba(80, 26, 62, 0.69) 76%), 
            url('/images/laughter.jpg');
            background-size: cover;
            width: 100%;
            height: 100vh;
    }
    .project-caption {
        display: grid;
        justify-content: start;
        align-items: center;
        padding-left: 40px;
        line-height: 2em;
        letter-spacing: 1.08px;
        font-size: 50px;
        font-weight: bold;
        height: 100%;
        width: 70%;
        color: #FAF0F8;
    }

    .project-caption button {
        border-radius: 10px;
        font-size: 30px;
        padding: 0px 10px;
        letter-spacing: 2px;
        outline: none;
        background-color: #501A3E;
        border: 1px solid #501A3E;
    }
    .project-caption button a {
        color: #FAF0F8; 
    }
    .project-caption button a:hover {
        text-decoration: none; 
    }
    .headline {
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        color: #501A3E;
        padding-top: 20px;
        max-width: 500px;
        margin: auto;
    }
    .share-stories {
        color: #501A3E;
        margin-top: 40px;
        padding: 0px 50px;
        display: grid;
        width: 100%;
        grid-template-columns: auto auto;
        justify-content: space-around;
        column-gap: 150px;
        row-gap: 50px;
    }
    .share-stories a {
        color: #501A3E;
        text-decoration: underline;
    }

    .bottom-landing-view {
        margin-top: 40px;
        background: 
        linear-gradient(
            146deg, 
            rgba(80, 26, 62, 0.69) 37%,
            rgba(80, 26, 62, 0.69) 76%), 
            url('/images/sharing.jpg');
        background-size: cover;
        width: 100%;
        height: 100vh;
    }
    .footer {
        width: 100%;
        text-align: center;
        color: #501A3E;
        margin: 40px 0px;
        line-height: 2em;
        font-size: 18px;
    }
    .footer a {
        color: #501A3E;
        text-decoration: none;
    }

    @media (max-width: 900px) {
        .project-caption {
            text-align: center;
            margin: auto;
            width: 80%;
            padding-left: 0px;
        }
    }
    
    @media (max-width: 760px) {
        .project-caption {
            font-size: 40px;
        }
        .share-stories {
            grid-template-columns: auto;
            text-align: center;
            row-gap: 50px;
            padding: 0px 0px;
    }

    }
    @media (max-width: 480px) {
        .project-caption {
            font-size: 40px;
        }
    }
    @media (max-width: 350px) {
        .project-caption {
            font-size: 30px;
        }
    }
    @media (max-width: 320px) {
        .project-caption {
            font-size: 25px;
        }
    }
      
</style>

@section('content')
    <div class="landing-view">
        <div class="project-caption">
            <div>
                <p>
                    CREATE, SHARE AND FIND INSPIRATIONAL STORIES AND TIPS
                </p>
                <button> <a href="{{route('register')}}">JOIN NOW</a></button>
            </div>
        </div>            
    </div>
    <div class="headline">
        Inspire and support others with stories of hope and courage
    </div>

    <div class="share-stories">
        <div>
            <h2>Are you a Covid-19 survivor?</h2>
            <h4>Share your story. Someone needs to hear it to keep hope alive.</h4>
            <div><a href="{{ route('allstories') }}">See all stories</a></div>
        </div>
        <div>
            <h2>Are you a breast cancer survivor?</h2>
            <h4>Share your experience. Uplift a soul.</h4>
            <div><a href="{{ route('allstories') }}">See all stories</a></div>
        </div>
        <div>
            <h2> Finally got your dream job? </h2>
            <h4> Share your story. Inspire someone. </h4>
            <div><a href="{{ route('allstories') }}">See all stories</a></div>
        </div>
        <div>
            <h2>What success secrets have paved a way for you?</h2>
            <h4>Share your knowledge. Sharing is caring.</h4>
            <div><a href="{{ route('allstories') }}">See all stories</a></div>
        </div>
    </div>
    <div class="bottom-landing-view">
        <div class="project-caption">
            <div>
                <p>
                    Someone needs your story or hindsight to get through a tough time
                </p>
                <button> <a href="{{route('register')}}"> SHARE A STORY </a> </button>
            </div>
        </div>  
    </div>
    <div class="footer">
        <div>
            <a href="https://timothyokooboh.github.io/portfolio/dist/">     
                Developer 
            </a>
        </div>
        <div>
            <a href="{{route('contacts.create')}}"> Contact </a>
        </div>
        <div>
            <a href="{{route('pages.about')}}"> About </a>
        </div>
        <div>
            <a href="{{route('pages.privacypolicy')}}">Privacy policy</a>
        </div>
        <div>
            &copy; Inspirations 2020. All Rights Reserved. 
        </div>
    </div>

    
                    
  @endsection


