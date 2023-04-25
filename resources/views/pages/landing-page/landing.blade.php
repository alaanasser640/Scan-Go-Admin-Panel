<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>OranGo - Get Started</title>
    <meta name="description" content="" />

    {{-- Logo icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logos/orango mini logo.png') }}" />

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
<!-- @if (session()->has('success'))
<div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif -->

<body style="font-family: product-sans;">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">

                <!-- Navbar -->
                <nav class="navbar navbar-example navbar-expand-lg bg-white px-3">
                    <div class="container-fluid justify-content-between">

                        <div class="logo " >
                            <a class="app-brand-link" href="{{ url('/landing_page') }}">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/images/logos/orango mini logo.png') }}">
                                </span>
                                <span class="font-family app-brand-text demo menu-text fw-bolder ms-3">OranGo</span>
                            </a>
                        </div>

                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbar-ex" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="navbar-collapse collapse" id="navbar-ex" style="">
                            <div class="navbar-nav mx-auto ">
                                <a class="nav-item nav-link nav-a active" style="--i:1;"
                                    href="{{ url('/landing_page') }}">Home</a>
                                <a class="nav-item nav-link nav-a" href="javascript:void(0)" style="--i:2;">About</a>
                                <a class="nav-item nav-link nav-a" href="javascript:void(0)" style="--i:3;">Contact</a>
                            </div>

                            <div class="btn-form" >
                                <form class="d-flex">
                                    <a href="{{ url('/sign_up') }}" class="btn btn-secondary me-sm-2 nav-a"
                                        style="--i:4;">Sign Up</a>
                                    <a href="{{ url('/log_in') }}" class="btn btn-primary mx-2 nav-a"
                                        style="--i:5;">Log In</a>
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
                            <h1 class="header">
                                <span class="text-primary">OranGo</span> Admin Panel
                            </h1>

                            <p class="fs-4 mt-5 content-p1">This is an OranGo Admin Panel where we can manage
                                categories,
                                products, customers, admins, receipts & carts.</p>
                            <p class="fs-4 content-p2">It is linked to a database and also to a mobile application of
                                our project, where data is displayed, added, edited, and deleted.</p>

                            <div class="mt-5 content-btn">
                                <a href="{{ url('/log_in') }}" class="btn btn-outline-warning mx-2">
                                    Get Started <i class="bx bx-chevron-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex flex-column justify-content-center landing-img-div">
                            <img src="{{ asset('assets/images/illustrations/landing-page.png') }}"
                                class="img-fluid landing-img" alt="landing-page" style="place-self: center;">
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


    <!-- Core JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
