@extends('admin.layout')

@section('title', trans('dashboard::info.name'))
@section('description', trans('dashboard::info.description'))

@section('content')
    {{ trans('dashboard::info.name') }}

    <a href="{{ url('admin/auth/logout') }}" title="Logout">Logout</a>
@endsection
