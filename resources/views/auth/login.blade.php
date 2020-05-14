@extends('layouts.app')
    <style>
     
        main {
            margin-top: 85px;
        }

        body {
            background: url('https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/q_auto,f_auto/v1589369351/samples/inspirations/bg_ezfsji.jpg');
            object-fit: cover;
            background-size:cover;
            width: 100%;
            height: 100vh;
            overflow-y: scroll;
            -ms-overflow-style: none;
           
        }
        body::-webkit-scrollbar {
            display: none;
        }
        .content-wrapper {
            display: grid;
            align-content: center;
            justify-content: center;
            height: 100vh;
            margin: 150px 0px;
        }

        .form-container {
            max-width: 350px;
            border-radius: 5px;
            background-color: #2C3135;
            padding: 40px 0px;
            color: #fff;
            
        }
        #login-headline {
            width: 80%;
            margin: auto;
            text-align: center;
            padding: 20px 0px;
            letter-spacing: 1.08px;
           
        }
        .label {
            width: 80%;
            margin: auto;
           
        }
        .input-container {
            width: 80%;
            display: flex;
            align-items: baseline;
            margin: 15px auto;
        }
        .form-icon {
            width: 15px;
            height: 15px;
            margin-left: -30px;
        }
        .input {
            width: 100%;
        }
        input {
            width: 100%;
            height: 40px;
            outline: none;
            padding-left: 10px;
            font-weight: bold;
            border:none;
            border-bottom: 1px solid black;
            
        }
        input:focus {
            outline: 3px solid #0069D9;
            border-color: transparent
        }
        input[type=submit] {
            background-color: #0069D9;
            color: #fff;
            letter-spacing: 1.08px; 
            border: none; 
            font-size: 18px;
            margin: 20px 0px;
        }
        input[type=submit]:focus {
            outline: 2px dotted #0069D9;
            outline-offset: 4px;
        }
        input[type=submit]::-moz-focus-inner {
            border: 0;
        }
        input[type=submit]:hover {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .flex-container {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            width: 80%;
            margin: auto;
            padding: 20px 0px;
        }
        .flex-container a {
            color: #fff;
        }

        .flex-container a:hover {
            color: #fff;
        }
        input[type="checkbox"] {
            width: 15px;
            height: 15px;
            cursor: pointer;
        }
        .form-check {
            width: 80%;
            margin: auto;
        }

        @media (max-width: 400px) {
            .form-container {
                max-width: 320px;
            }
        }
    </style>

@section('content')

    <div class="content-wrapper">

        <div class="form-container">
            <h1 id="login-headline"> Sign in to Inspirations </h1>
            <form method="POST" action="{{ route('login') }}" >
                @csrf

                <div class="label"> 
                    <label for="email"> E-mail Address </label> 
                </div>

                <div class="input-container">
                    <div class="input">
                        <input 
                            type="email"
                            id="email" 
                            class="@error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email" 
                            autofocus
                        >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272256/samples/inspirations/email-compressor_c5qqvq.png" alt="email icon" class="form-icon">
                    </div>
                </div>

                <div class="label"> 
                    <label for="password"> Password </label> 
                </div>

                <div class="input-container">
                    <div class="input">
                        <input 
                            type="password" 
                            id="password" 
                            class="@error('password') is-invalid @enderror" name="password" 
                            required 
                            autocomplete="current-password"
                        >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272283/samples/inspirations/key-compressor_brkjmb.png" alt="password icon" class="form-icon">
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>           

                <div class="input-container">
                    <div class="input">
                        <input type="submit" value="LOGIN">
                    </div>
                </div>

                <div class="flex-container">
                    <div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        @endif
                    </div>
                    <div>
                        <a href="{{route('register')}}"> Create Account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

