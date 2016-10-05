@extends('layouts.app')

@section('background_color', '#00F')
@section('background_image', asset('/images/contact.jpg'))

@section('content')
    <div class="center-text">
    <h4>
        {{ $news->title }}
    </h4>
    </div>

    <div class="justify-text">
        {!! $news->content !!}
    </div>

@endsection
