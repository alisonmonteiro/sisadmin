<!DOCTYPE html>
<html lang="{{ Lang::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@hasSection ('title')@yield('title') | {{ config('app.name') }}@else{{ config('app.name') }}@endif</title>
    <meta name="description" content="@hasSection ('description')@yield('description')@else{{ config('app.description') }}@endif">
</head>
<body>
@yield('content')
</body>
</html>
