<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Metatags -->
    @include('front.parts.metatags')
    <!-- Styles -->
    <link href="{{ mix('front/css/index.css') }}" rel="stylesheet">

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<!-- Global site tag (gtag.js) - Google Analytics -->


<body class="{{ $page_class ?? '' }} main-layout">
    @yield('layout')
    <script src="{{ mix('front/js/index.js') }}"></script>
</body>

</html>
