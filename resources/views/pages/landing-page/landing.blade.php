<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>OranGo - Get Started</title>
    <meta name="description" content="" />

    {{-- Logo icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/orango mini logo.png') }}" />

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
<!-- @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif -->

<body style="font-family: product-sans;">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">

                <!-- Navbar -->
                <nav class="navbar navbar-example navbar-expand-lg bg-white p-3">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse justify-content-between">

                            <div>
                                <a class="app-brand-link" href="{{ url('/landing_page') }}">
                                    <span class="app-brand-logo demo">
                                        <img src="{{ asset('assets/images/orango mini logo.png') }}">
                                    </span>
                                    <span class="font-family app-brand-text demo menu-text fw-bolder ms-3">OranGo</span>
                                </a>
                            </div>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-ex-3">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div>
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                        href="{{ url('/landing_page') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <form class="d-flex">
                                    <a href="{{ url("/sign_up") }}" class="btn btn-outline-warning mx-2">Sign Up</a>
                                    <a href="{{ url("/log_in") }}" class="btn btn-primary mx-2">Log In</a>
                                </form>
                            </div>

                        </div>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="row container-xxl flex-grow-1 container-p-y" style="align-self: center;">
                            
                            <div class="col-lg-6 d-flex flex-column justify-content-center">
                                <h1>
                                    <span class="text-primary">OranGo</span> Admin Panel
                                </h1>

                                <p class="fs-4 mt-5">This is an OranGo Admin Panel where we can manage categories, 
                                    products, customers, admins, receipts & carts.</p>
                                <p class="fs-4">It is linked to a database and also to a mobile application of our project, where data is displayed, added, edited, and deleted.</p>

                                <div class="mt-5">
                                    <a href="{{ url("/log_in") }}" class="btn btn-outline-warning mx-2">
                                        Get Started <i class="bx bx-chevron-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex flex-column justify-content-center">
                                <img src="{{ asset('assets/images/illustrations/landing-page.png') }}" class="img-fluid" alt="landing-page" style="place-self: center;">
                            </div>

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-white">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between mt-sm-3 flex-md-row flex-column">
                            <div>
                                <p> Copyright © 2023 All rights reserved. </p>
                            </div>
                            <div>
                                <p> Graduation Project </p>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                </div>
                <!-- / Content wrapper -->

            </div>
        </div>
    </div>
</body>

</html>
