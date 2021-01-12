<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.partials.meta-tags')

    @include('layouts.partials.favicons')

    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/daterangepicker.css') }}">
    
    @include('themes.theme1.backend_css.internal-page-custom-style')

    @livewireStyles

    @section('styles')

    @show
</head>
<body>

    <x-home-header-page />

    @section('header_middle')
    {{-- Crousel part added if we call this section --}}
    @show

    @yield('content')

   <x-home-footer-page />

   @livewireScripts

    @section('scripts')
       <!-- Scripts -->
       <script src="{{ asset('js/home.js') }}"></script>
       <script src="{{ asset('js/jquery.js') }}"></script>
    @show
</body>
</html>
