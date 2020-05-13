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
            max-width: 400px;
            border-radius: 5px;
            background-color: #2C3135;
            padding: 40px 0px;
            color: #fff;
            padding-bottom: 20px;
        }
        #register-headline {
            width: 80%;
            margin: auto;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 30px;
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
            margin: 10px 0px;
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

        @media (max-width: 754px) {
            .form-container {
                max-width: 350px;
            }
        }

        @media (max-width: 400px) {
            .form-container {
                max-width: 320px;
            }
        }
    </style>

@section('content')
    
    <div class="content-wrapper" >
        <div class="form-container">
            <h1 id="register-headline"> Welcome to Inspirations. <br> Sign up to get started. </h1>
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
                        <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272270/samples/inspirations/user-compressor_w7vulc.png" alt="user icon" class="form-icon">
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
                        <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272283/samples/inspirations/key-compressor_brkjmb.png" alt="" class="form-icon">
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
                        <img src="https://res.cloudinary.com/health-hub-content-creation-and-software-development/image/upload/f_auto,q_auto/v1589272283/samples/inspirations/key-compressor_brkjmb.png" alt="" class="form-icon">
                    </div>
                </div>  

                <div class="input-container">
                    <div class="input">
                        <input type="submit" value="REGISTER">
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
