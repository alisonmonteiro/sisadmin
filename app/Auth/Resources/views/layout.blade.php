<!DOCTYPE html>
<html lang="{{ Lang::getLocale() }}" class="admin-auth">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{ config('info.admin.name') }}</title>
    <meta name="description" content="@yield('description')">

    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
</head>
<body class="admin-auth__body">
<div class="admin-auth__wrapper">
    <div class="admin-auth__container">
        <img src="{{ url('img/sisadmin.png') }}" alt="{{ config('info.admin.name') }}" class="img-responsive">

        <br>
        @yield('content')
        <br>

        <div class="clearfix"></div>

        <div class="admin-auth__footer">
            {{ config('info.admin.name') }} - {{ config('info.admin.description') }} - {{ config('info.admin.vendor') }} {{ config('info.admin.phone') }}
            <img src="{{ url('img/brasil.png') }}" alt="{{ config('info.admin.country') }}" class="admin-auth__flag">
        </div>

        <div class="clearfix"></div>
    </div>
</div>
</body>
</html>
