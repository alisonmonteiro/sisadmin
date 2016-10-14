<!DOCTYPE html>
<html lang="{{ Lang::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{ config('info.admin.name') }}</title>
    <meta name="description" content="@yield('description')">

    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}" title="{{ config('info.admin.name') }}" target="_blank">{{ config('info.admin.name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="main-navbar">
            <div class="visible-xs">{!! Menu::render('admin-navbar', 'navbar-right') !!}</div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('admin/auth/logout') }}" title="{{ trans('auth::form.logout') }}">
                        {{ trans('auth::form.logout') }} <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-3 hidden-xs">
            <div class="nav-sidebar ">
                {!! Menu::render('admin-navbar', 'nav-pills') !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-9">
            @yield('content')
        </div>
    </div>
</div>

<div class="footer">
    <div class="container-fluid">
        {{ config('info.admin.name') }} - {{ config('info.admin.description') }} - {{ config('info.admin.vendor') }} {{ config('info.admin.phone') }}
    </div>
</div>

<script defer async src="{{ url('js/admin.js') }}"></script>
</body>
</html>
