@extends('admin.layout')

@section('title', trans('users::info.name'))
@section('description', trans('users::info.description'))

@section('content')
    {{ trans('users::info.name') }}
@endsection
