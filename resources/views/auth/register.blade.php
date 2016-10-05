@extends('layouts.app')

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col s12 m8 offset-m2">
                <h4>
                    {{ trans('site.pages.register') }}
                </h4>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <input id="name" name="name" type="text" class="validate" length="255" maxlength="255" value="{{ old('name') }}" required
                       autofocus>
                <label for="name" data-error="Incorrect name">
                    Name
                </label>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <input id="email" name="email" type="email" class="validate" length="255" maxlength="255" value="{{ old('email') }}" required
                       autofocus>
                <label for="email" data-error="Incorrect email">
                    Email
                </label>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <input id="password" name="password" type="password" class="validate" length="255" maxlength="255" value="" required>
                <label for="password">Password</label>
            </div>

            <div class="input-field col s12 m8 offset-m2">
                <input id="password_confirmation" name="password_confirmation" type="password" class="validate" length="255"
                       maxlength="255" value="" required>
                <label for="password_confirmation">Password Confirm</label>
            </div>


            <div class="input-field col s12 m8 offset-m2 center-align">
                <button class="btn btn-primary waves-effect waves-light blue darken-2" type="submit">
                    Register
                </button>
            </div>

            <div class="input-field col s12 m8 offset-m2 center-align">
                <a class="btn-flat waves-effect waves-teal" href="{{ url('/login') }}">
                    or Login
                </a>
            </div>
        </div>
    </form>
@endsection
