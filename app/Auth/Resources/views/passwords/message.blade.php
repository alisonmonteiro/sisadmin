@extends('emails.layout')

@section('title', trans('auth::form.reset'))

@section('content')
    {{ trans('auth::passwords.message', [
        'client' => config('info.client.name')
    ]) }}
    <br>
    <br>
    <center>
        <a href="{{ $link = url('admin/auth/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;display: block;display: inline-block;padding: 9px 12px 7px;font-weight: 700;text-transform: uppercase;border-radius: 0;color: #fff;background-color: #158cba;border: 1px solid transparent;border-color: #127ba3;border-width: 0 1px 4px;font-size: 12px;text-align: center;text-decoration: none;-webkit-text-size-adjust: none;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;background-image: none;white-space: nowrap;-webkit-user-select: none;" target="_blank">
            {{ trans('auth::form.reset') }}
        </a>
    </center>
    <br>
    <br>
    {{ trans('auth::passwords.expire', [
        'time'=> config('auth.passwords.expire')
    ]) }}
@endsection
