@extends('auth::layout')

@section('title', trans('auth::info.name'))
@section('description', trans('auth::info.description'))

@section('content')
    <form role="form" method="POST" action="{{ url('admin/auth/password/email') }}" class="admin-auth__form">
        {{ csrf_field() }}

        <div class="lead text-center">{{ trans('auth::form.reset') }}</div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">{{ trans('auth::form.email') }}</label>

            <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" autofocus>

            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <a class="admin-auth__forgot pull-left" href="{{ url('admin/auth') }}">{{ trans('auth::form.back') }}</a>

            <button type="submit" class="btn btn-default pull-right">{{ trans('auth::form.send') }}</button>
            <div class="clearfix"></div>
        </div>
    </form>
@endsection
