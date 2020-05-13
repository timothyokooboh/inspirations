@extends('layouts.app')

@section('styles')
    <style>
        main {
            margin-top: 85px;
        }

        .offline-view > div {
            margin-bottom: 20px;
            line-height: 50px;
            letter-spacing: 1.08px;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="offline-view">
            <div>
                <h2>
                    I have a good news and bad news.
                </h2>
            </div>
            <div>
                <h4>
                    The bad news is that you are currently not connected to any network.
                </h4>
            </div>
            <div>
                <h4>
                    The good news is that YOU ARE AMAZING! <br>
                    Never forget that.
                </h4>
            </div>
        </div>
    </div>

@endsection