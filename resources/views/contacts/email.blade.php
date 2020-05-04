<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact form</title>
  </head>
  <body>
    <div style="text-align: center; background-color: #ccc; padding: 10px">
      RxLeenk
    </div>

    <div style="max-width: 500px;">
      <h1>Contact Inspirations </h1>
      <div> Name: {{$senderName}}</div>
      <div> Email: {{$senderEmail}}</div>
      <div> Message: {{$senderMessage}}</div>
    </div> 

  </body>
</html>