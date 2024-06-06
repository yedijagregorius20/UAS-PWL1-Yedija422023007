<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="The place where your health matters most">
        <meta name="keywords" content="ecommerce, pharmacy">
        <meta name="author" content="422023007-Yedija Gregorius">

        <title>@yield('title') | 422023007-Yedija Gregorius</title>

        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

        <!-- BEGIN: CSS Assets -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor/linearicons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor/fontawesome-all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/animation.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/slick.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/easyzoom.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        @yield('addition_css')
        <!-- END: CSS Assets -->
    </head>

    <body class="box-home">
        <div class="page-box">
            @include('components.header')
            <div class="main-wrapper">
                @yield('content')
            </div>
            @include('components.footer')
        </div>

        <!-- BEGIN: JS Assets -->
        <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/axios.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/fullpage.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/slick.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/js/vendor/easyzoom.js')}}"></script>
        <script src="{{asset('assets/js/vendor/images-loaded.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/isotope.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/YTplayer.js')}}"></script>
        <script src="{{asset('assets/js/plugins/ajax.mail.js')}}"></script>
        <script src="{{asset('assets/js/plugins/wow.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('pages/js/app.js')}}"></script>
        @yield('addition_script')
        <!-- END: JS Assets -->
    </body>
</html>