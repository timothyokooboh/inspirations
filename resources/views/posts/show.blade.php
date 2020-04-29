@extends('layouts.app')

@section('styles')
  <style>
    main {
      margin-top: 85px;
    }
  </style>
@endsection

@section('content')

{!! $post->title !!} <br>
<img src="/storage/coverPhotos/{{$post->coverPhoto}}"> <br>
{!! $post->story !!} <br>
{!! $post->mode !!} <br>
{!! $post->tags !!}

@endsection