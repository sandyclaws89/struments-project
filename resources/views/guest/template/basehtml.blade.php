<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- da chiedere a paolo che fa la funzione asset  --}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
    <body>
        @include('guest.partials.header')

        @yield('content')

        @include('guest.partials.footer')
        {{-- @yield('footer') --}}
    </body>
</html>
