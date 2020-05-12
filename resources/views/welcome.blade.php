@extends('layouts.app')

        <!-- Styles -->
<style>
    
    body {    
        margin: 0;
        color: #FAF0F8;
        -ms-overflow-style: none;
        overflow-y: scroll;
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
            url('https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/q_auto,f_auto/v1589270698/samples/inspirations/laughter-compressor_smpjmf.jpg');
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

    .bottom-landing-view {
        margin-top: 40px;
        background: 
        linear-gradient(
            146deg, 
            rgba(80, 26, 62, 0.69) 37%,
            rgba(80, 26, 62, 0.69) 76%), 
            url('https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589271530/samples/inspirations/sharing-compressor_fnvwyq.jpg');
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

    <lazy-load
        all-stories = "{{route('allstories')}}"
    >
    </lazy-load>

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





