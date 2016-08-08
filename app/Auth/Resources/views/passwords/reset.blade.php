@extends('auth::layout')

@section('title', trans('auth::info.name'))
@section('description', trans('auth::info.description'))

@section('content')
    <div class="lead text-center">{{ trans('auth::form.reset') }}</div>
    <br>

    <form role="form" method="POST" action="{{ url('admin/auth/password/reset') }}" class="admin-auth__form">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">{{ trans('auth::form.email') }}</label>

            <input id="email" type="email" class="form-control input-lg" name="email" value="{{ $email or old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">{{ trans('auth::form.password') }}</label>

            <input id="password" type="password" class="form-control input-lg" name="password">

            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="control-label">{{ trans('auth::form.confirm_password') }}</label>
            <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default btn-block btn-lg">{{ trans('auth::form.reset') }}</button>
        </div>
    </form>
@endsection
