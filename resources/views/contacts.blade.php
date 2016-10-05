@extends('layouts.app')

@section('background_color', '#0F0')
@section('background_image', asset('/images/contact.jpg'))

@section('content')

    <div class="container top-block">
        <div class="row">

            @foreach(config('site.contacts', []) as $item)
                <div class="col s12 left-align valign-wrapper margin-blocks">
                    <img class="responsive-img col s1" alt="{{ $item['title'] }}" src="{{ asset($item['image']) }}">

                    <div class="col s11">
                        <div class="black-text">{{ $item['title']}} </div>
                        <a href="{{ $item['url'] }}">{{ $item['url'] }}</a>
                        <div class="black-text">{{$item['title1']}} <br> {{$item['title2']}} </div>



                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection
