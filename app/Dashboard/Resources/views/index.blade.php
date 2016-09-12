@extends('admin.layout')

@section('title', trans('dashboard::info.name'))
@section('description', trans('dashboard::info.description'))

@section('content')
    {{ trans('dashboard::info.name') }}

    <a href="#" onclick="event.preventDefault(); document.logout.submit();">Logout</a>
    <form name="logout" action="{{ url('admin/auth/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
@endsection
