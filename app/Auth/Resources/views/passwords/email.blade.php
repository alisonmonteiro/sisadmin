@extends('auth::layout')

@section('title', trans('auth::info.name'))
@section('description', trans('auth::info.description'))

@section('content')
    <div class="lead">{{ trans('auth::form.reset') }}</div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form role="form" method="POST" action="{{ url('admin/auth/password/email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">{{ trans('auth::form.email') }}</label>

            <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg">{{ trans('auth::form.send') }}</button>
        </div>
    </form>
@endsection
