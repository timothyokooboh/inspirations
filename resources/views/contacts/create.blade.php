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
    .form-container {
      width: 600px;
      margin: 40px auto;
      letter-spacing: 1.08px;
      background-color: #fff;
      box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
      border-radius: 10px;
    }
    form {
      width: 90%;
      margin: auto;
      padding: 20px 0px;
    }
    form > div {
      margin-bottom: 10px;
    }
    .form-heading {
      text-align: center;
      padding-top: 20px;
      letter-spacing: 1.08px;
    }
    input {
      width: 100%;
      height: 40px;
      outline: none;
    }
    textarea {
      width: 100%;
      height: 300px;
    }
    input[type=submit] {
      background-color: #0069D9;
      color: #fff;
      font-weight: bold;
      font-size: 18px;
      letter-spacing: 1.08px; 
      border: none; 
      margin-top: 20px;
    }
    input[type=submit]:hover {
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    @media (max-width: 754px) {
      .form-container {
        width: 90%;
        margin: 40px auto;
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
    <div>
      <h2 class="form-heading"> LEAVE A MESSAGE </h2>
      <div class="form-container">
        <form action = "{{route('contacts.store')}}" method="POST" >
          @csrf

          <div>
            <label for="name"> Your Name </label> <br>
            <input type="text" id="name" name ="name" autofocus required>
          </div>

          <div>
            <label for="email"> Your Email </label> <br>
            <input type="email" id="email" name ="email" required >
          </div>

          <div>
            <label for="message"> Your Message </label> <br>
            <textarea type="text" id="message" name = "message" autofocus required> </textarea>
          </div>

          <div>
            <input type="submit" value = "SEND">
          </div>
        </form>
      </div>
    </div>
@endsection