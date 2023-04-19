<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}" data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>OranGo - @yield('title')</title>
    <meta name="description" content="" />

    {{-- Logo icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/gray mini logo.png') }}" />

    {{-- Fonts --}}
    <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Navbar - Scrollbar -->
    <link rel="stylesheet" href="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/helpers.js') }}"></script>

</head>

<body>

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">@yield('code') Error</h2>
            <p class="mb-4 mx-2 fs-4">Oops! 😖 @yield('message')</p>
            <div class="mt-3">
                <img src="@yield('image')" alt="error" width="500"
                    class="img-fluid error-img" />
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-5">Back to home</a>

        </div>
    </div>
    <!-- /Error -->

</body>

</html>
