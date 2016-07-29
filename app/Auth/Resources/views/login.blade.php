@extends('auth::layout')

@section('title', trans('auth::info.name'))
@section('description', trans('auth::info.description'))

@section('content')
    <form role="form" method="POST" action="{{ url('admin/auth') }}">
        <input type="hidden" name="remember" value="1">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">{{ trans('auth::form.email') }}</label>
            <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label pull-left">{{ trans('auth::form.password') }}</label>
            <a class="pull-right" href="{{ url('admin/auth/password/reset') }}">{{ trans('auth::form.forgot') }}</a>

            <input id="password" type="password" class="form-control input-lg" name="password">

            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg">{{ trans('auth::form.login') }}</button>
        </div>
    </form>
@endsection
