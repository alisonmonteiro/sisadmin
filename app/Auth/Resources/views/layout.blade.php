<!DOCTYPE html>
<html lang="{{ Lang::getLocale() }}" class="admin-auth">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{ trans('info.admin.name') }}</title>
    <meta name="description" content="@yield('description')">

    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
</head>
<body class="admin-auth__body">
<div class="admin-auth__wrapper">
    <div class="admin-auth__container">
        <img src="{{ url('img/sisadmin.png') }}" alt="{{ trans('info.admin.name') }}" class="img-responsive">

        <br>
        @yield('content')
        <br>

        <div class="clearfix"></div>

        <div class="admin-auth__footer">
            {{ trans('info.admin.name') }} - {{ trans('info.admin.description') }} - {{ trans('info.admin.vendor') }} {{ trans('info.admin.phone') }}
            <img src="{{ url('img/brasil.png') }}" alt="{{ trans('info.admin.country') }}" class="admin-auth__flag">
        </div>

        <div class="clearfix"></div>
    </div>
</div>
</body>
</html>
