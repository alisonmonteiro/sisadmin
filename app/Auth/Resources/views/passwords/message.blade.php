@extends('emails.layout')

@section('title', trans('auth::form.reset'))

@section('content')
    {{ trans('auth::password.message', [
        'client' =>trans('info.client.name')
    ]) }}
    <br>
    <br>
    <a href="{{ $link = url('admin/auth/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="color:#3869D4">{{ $link }}</a>
    <br>
    <br>
    {{ trans('auth::password.trouble') }}
    <br>
    <br>
    {{ trans('auth::password.expire', [
        'time'=> config('auth.passwords.users.expire')
    ]) }}
@endsection
