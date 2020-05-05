@extends('layouts.app')
    
    <style>
        main {
            margin-top: 85px;
        }
        .form-container {
            max-width: 500px;
            margin: 20px auto;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 40px 0px;
        }
        #register-headline {
            width: 90%;
            margin: auto;
            padding: 20px 0px;
            letter-spacing: 1.08px;
            text-align: center;
            line-height: 50px;
            color: #501A3E;
        }
        .label {
            width: 90%;
            margin: auto;
            color: #501A3E;
            letter-spacing: 1.08px;
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
            font-size: 18px;p
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
            }
        }
        @media (max-width: 400px) {
            .form-container {
                max-width: 300px;
            }
        }
    </style>

@section('content')
    
    <h1 id="register-headline"> Welcome to Inspirations. <br> Sign up to get started. </h1>
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}" >
            @csrf

            <div class="label">
                <label for="username"> Username </label>
            </div>

            <div class="input-container">
                <div class="input">
                    <input 
                        type="text" 
                        id="username" 
                        class="@error('username') is-invalid @enderror" 
                        name="username" 
                        value="{{ old('username') }}" 
                        required 
                        autocomplete="username" 
                        autofocus
                    >
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <img src="/images/user.png" alt="" class="form-icon">
                </div>
            </div>

            <div class="label">
                <label for="email"> Email </label>
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
                        class="@error('password') is-invalid @enderror" 
                        name="password" 
                        value="{{ old('password') }}" 
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

            <div class="label">
                <label for="password-confirm"> Confirm Password </label>
            </div>

            <div class="input-container">
                <div class="input">
                    <input 
                        type="password" 
                        class="@error('password') is-invalid @enderror" 
                        id="password-confirm"
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                    >
                </div>
                <div>
                    <img src="/images/key.png" alt="" class="form-icon">
                </div>
            </div>  

            <div class="input-container">
                <div class="input">
                    <input type="submit" value="REGISTER">
                </div>
            </div>

        </form>
    </div>

@endsection
