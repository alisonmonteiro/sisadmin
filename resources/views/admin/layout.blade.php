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
@yield('content')
<script defer async src="{{ url('js/admin.js') }}"></script>
</body>
</html>
