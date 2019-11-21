<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-99486024-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-99486024-1');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ substr(\App\Http\Helpers\Splash::DESCRIPTION, 0, 160) }}">
        <meta name="keywords" content="art, music, paint, noise, showcase accounts, feature, community, creators, collab">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ route('favicon') }}">

        <title>{{ env('APP_NAME', 'P&N') }}</title>

        <!-- Styles -->
        <link href="{{ route('css') }}" rel="stylesheet">
    </head>
        @yield('body')
</html>