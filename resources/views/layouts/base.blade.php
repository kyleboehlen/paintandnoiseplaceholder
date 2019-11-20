<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ route('favicon') }}">

        <title>{{ env('APP_NAME', 'P&N') }}</title>

        <!-- Styles -->
        <link href="{{ route('css') }}" rel="stylesheet">
    </head>
        @yield('body')
</html>