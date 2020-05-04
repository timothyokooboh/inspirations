@extends('layouts.app')
    <style>
     
        main {
            margin-top: 85px;
        }
        .form-container {
            max-width: 500px;
            margin: 100px auto;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 2px 2px 20px rgba(0,0,0,0.2);
            padding: 40px 0px;
        }
        #login-headline {
            width: 90%;
            margin: auto;
            padding: 20px 0px;
            letter-spacing: 1.08px;
        }
        .label {
            width: 90%;
            margin: auto;
            color: #501A3E;
        }
        .input-container {
            width: 90%;
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
        }
        input:focus {
            outline: 3px solid #FAF0F8;
            border-color: transparent
        }
        input[type=submit] {
            color: #501A3E;
            background-color: #FAF0F8;
            letter-spacing: 1.08px; 
            border: none; 
            font-size: 18px;
        }
        input[type=submit]:focus {
            outline: 2px dotted #501A3E;
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
            width: 90%;
            margin: auto;
        }
        .flex-container a {
            color: #501A3E;
        }

        .flex-container a:hover {
            color: #501A3E;
        }
        input[type="checkbox"] {
            width: 15px;
            height: 15px;
            cursor: pointer;
        }
        .form-check {
            width: 90%;
            margin: auto;
        }

        @media (max-width: 600px) {
            .form-container {
                max-width: 400px;
                margin: 100px auto;
                border: 1px solid #ccc;
            }
        }
        @media (max-width: 400px) {
            .form-container {
                max-width: 300px;
                margin: 100px auto;
                border: 1px solid #ccc;
            }
        }
    </style>

@section('content')
    <div class="form-container">
        <h1 id="login-headline"> LOGIN </h1>
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
                    <img src="/images/email.png" alt="" class="form-icon">
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
                    <img src="/images/key.png" alt="" class="form-icon">
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

@endsection
