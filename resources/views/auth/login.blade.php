@extends('layouts.app')

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col s12 m8 offset-m2">
                <h4>
                    {{ trans('site.pages.login') }}
                </h4>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <input id="email" name="email" type="email" class="validate" length="255" maxlength="255" value="{{ old('email') }}" required
                       autofocus>
                <label for="email" data-error="Incorrect email">
                    Email
                </label>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <input id="password" name="password" type="password" class="validate" length="255" maxlength="255" value="{{ old('password') }}"
                       required>
                <label for="password">Password</label>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <input id="remember" name="remember" type="checkbox">
                <label for="remember">Remember Me</label>
            </div>


            <div class="input-field col s12 m8 offset-m2 center-align">
                <button class="btn btn-primary waves-effect waves-light blue darken-2" type="submit">
                    Login
                </button>
            </div>

            <div class="input-field col s12 m8 offset-m2 center-align">
                <a class="btn-flat waves-effect waves-teal" href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>
@endsection
