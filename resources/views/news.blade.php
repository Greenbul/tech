@extends('layouts.app')

@section('background_color', '#00F')
@section('background_image', asset('/images/news.jpg'))

@section('content')
    <h4>
        {{ trans('site.top_menu.news') }}
    </h4>

    @if($news->count())
        @foreach(array_chunk($news->all(), 2) as $rows)
            <div class="row">
                @foreach($rows as $item)
                    <div class="col s12 m6">
                        <div class="card hoverable">
                            <div class="card-content">
                                <span class="card-title truncate">
                                    <a href="{{ route('news::slug', ['slug'=>$item->slug]) }}">
                                        {{ $item->title }}
                                    </a>
                                </span>

                                <p>{{ $item->preview_content }}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('news::slug', ['slug'=>$item->slug]) }}">Перейти</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        <div class="row">
            <div class="col s12 center-align">
                {{ $news->links() }}
            </div>
        </div>
    @else
        Новости не найдены :(
    @endif


@endsection
