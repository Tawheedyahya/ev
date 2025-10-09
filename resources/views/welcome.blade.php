<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>@yield('title', 'My Laravel App')</title>

    <link rel="icon" href="{{ asset('ev_photos/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('manual_css/common.css') }}">

    <link rel="stylesheet" href="{{asset('manual_css/text.css')}}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    {{-- img laziness --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    <script src="{{asset('manual_js/common.js')}}" defer></script>

    @stack('styles')
</head>

<body>


    @include('layouts.header')


    <main class="p-4">
        @yield('content')
    </main>

    @include('layouts.footer')

    @stack('scripts')

</body>

</html>
