<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<!-- CSRF Token -->--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = {csrfToken: '{{ csrf_token() }}'};
    </script>

    <title>
        {{ trans('site.title') }}
    </title>

    {{--<!--Import Google Icon Font-->--}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{--<!-- Styles -->--}}
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body>

{{--Это шапка--}}
<header style="background: @yield('background_color', '#d7ebf9') url(@yield('background_image', '/images/home.jpg'))no-repeat top center; ">
    <div class="container" >
        <div class="row" >
            <div class="col s12 m6 left-align">
                <h1>{{ trans('site.title') }}</h1>

                <h6>
                    <i class="material-icons green-text text-lighten-1">check</i>
                    {{ trans('site.sub_title_1') }}
                </h6>

                <h6>
                    <i class="material-icons green-text text-lighten-1">check</i>
                    {{ trans('site.sub_title_2') }}
                </h6>

                {{--start: Кнопка "Заказать консультацию" вынесена во VueJS для удобства обработки формы--}}
                <modal-order-consult></modal-order-consult>
                {{--end: Кнопка "Заказать консультацию"--}}
            </div>

            <div class="col s12 m6 right-align">
                <h5 class="header-phone">{{ trans('site.phone') }}</h5>

                @foreach(config('site.socials') as $item)
                    @if($item['is_active'])
                        <a class="waves-effect waves-light tooltipped" href="{{ $item['url'] }}" target="_blank"
                           title="{{ trans('site.socials.'.$item['slug']) }}" data-position="bottom" data-delay="50"
                           data-tooltip="{{ trans('site.socials.'.$item['slug']) }}">
                            <img src="{{ asset('images/' . $item['slug'] . '.png') }}" alt="{{ $item['slug'] }}">
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @if(isset($topMenu))
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <ul class="right">
                        @foreach($topMenu as $item)
                            <li @if($item->is_active) class="active" @endif>
                                <a href="{{ $item->url }}">
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach

                        {{--Кнопки входа в админку. Кстати, можно их скрыть с отображения на сайте--}}
                        {{--@if (Route::has('login'))--}}
                        {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                        {{--@endif--}}
                    </ul>
                </div>
            </div>
        </nav>
    @endif

</header>
{{--Это тело--}}
<main>
    <div class="container">

        @yield('content')

    </div>
</main>
{{--Это подвал--}}
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col s12 m3">
                <h5>
                    {{ trans('site.location') }}
                </h5>

                <ul>
                    @foreach(trans('site.footer.location') as $value)
                        <li>{{ $value }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col s12 m3">
                <h5>
                    {{ trans('site.contacts') }}
                </h5>

                <ul>
                    @foreach(trans('site.footer.contacts') as $value)
                        <li>{{ $value }}</li>
                    @endforeach

                    <li class="socials">
                        @foreach(config('site.socials') as $item)
                            @if($item['is_active'])
                                <a class="waves-effect waves-light tooltipped"
                                   href="{{ $item['url'] }}"
                                   target="_blank"
                                   title="{{ trans('site.socials.'.$item['slug']) }}"
                                   data-position="top" data-delay="50"
                                   data-tooltip="{{ trans('site.socials.'.$item['slug']) }}">
                                   <img src="{{ asset('images/' . $item['slug'] . '.png') }}" alt="{{ $item['slug'] }}">
                                </a>
                            @endif
                        @endforeach
                    </li>
                </ul>
            </div>

            <div class="col s12 m3">
                <h5>
                    {{ trans('site.phones') }}
                </h5>

                <ul>
                    @foreach(trans('site.footer.phones') as $value)
                        <li>{{ $value }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col s12 m3">
                <h5>
                    {{ trans('site.engineer2') }}
                </h5>

                <ul>
                    @foreach(trans('site.footer.engineer2') as $value)
                        <li>{{ $value }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            © {{ Carbon\Carbon::now()->format('Y') }} {{ trans('site.title') }}

            <a class="grey-text text-lighten-4 right" href="#">
                {{ trans('site.toTop') }}
            </a>
        </div>
    </div>
</footer>

{{--<!-- JavaScripts -->--}}
<script src="{{ elixir('js/app.js') }}"></script>
<script src="{{ elixir('js/lib.js') }}"></script>
</body>
</html>
