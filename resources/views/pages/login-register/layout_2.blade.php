<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>OranGo - @yield('title')</title>
    <meta name="description" content="" />

    {{-- Logo icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logos/orango mini logo.png') }}" />
    
    {{-- Fonts --}}
    <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    
    <!-- Navbar - Scrollbar -->
    <link rel="stylesheet" href="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Js -->
    <script src="{{ asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/helpers.js') }}"></script>
    
    @yield('style')
</head>

<body style="background: #fbfbfb;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        @yield('content')
    </div>


    <!-- Core JS -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    
    @yield('script')
</body>

</html>
