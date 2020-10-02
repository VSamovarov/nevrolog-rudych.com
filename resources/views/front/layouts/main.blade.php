<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="{{ mix('front/css/index.css') }}" rel="stylesheet">

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<!-- Global site tag (gtag.js) - Google Analytics -->


<body class="{{ $page_class ?? '' }}">
    <div id="app">
        @include('front.parts.page-header')
        <main id="main">
            @yield('content')
        </main>
        @include('front.parts.page-footer')
    </div>
    <!-- Scripts -->
    <script src="{{ mix('front/js/index.js') }}"></script>
</body>

</html>
