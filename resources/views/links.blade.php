@extends('layouts.app')

@section('background_color', '#0F0')
@section('background_image', asset('/images/links.jpg'))

@section('content')

    <div class="container top-block">

        <div class="row">

            @foreach(config('site.links', []) as $item)
                <div class="col s12 left-align valign-wrapper margin-blocks">
                    <img class="responsive-img col s2" alt="{{ $item['title'] }}" src="{{ asset($item['image']) }}" width="120" height="80">

                    <div class="col s10">
                        <div class="black-text">{{ $item['title'] }}</div>

                        <a href="{{ $item['url'] }}">{{ $item['url'] }}
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection
