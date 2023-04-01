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

    @yield('style')
</head>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

                <!-- Logo -->
                <div class="app-brand demo">
                    <a href="{{ url('/') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/images/orango mini logo.png') }}">
                        </span>
                        <span class="font-family app-brand-text demo menu-text fw-bolder ms-3">OranGo</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                {{-- /Logo --}}

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1 sidebar-offcanvas">

                    <!-- Dashboard -->
                    <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ url('/') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Categories -->
                    {{-- <li class="menu-item {{ Request::is('categories') || Request::is('categories/*') ? 'active' : '' }}"> --}}
                    <li
                        class="menu-item {{ Request::is('categories') || Request::is('add_category') || Request::is('edit_category') || Request::is('delete_category') ? 'active' : '' }}">
                        <a href="{{ url('/categories') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category"></i>
                            <div data-i18n="Analytics">Categories</div>
                        </a>
                    </li>

                    <!-- Products -->
                    <li
                        class="menu-item  {{ Request::is('products') || Request::is('add_product') || Request::is('edit_product') || Request::is('delete_product') ? 'active' : '' }}">
                        <a href="{{ url('/products') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-package"></i>
                            <div data-i18n="Analytics">Products</div>
                        </a>
                    </li>

                    <!-- Offers -->
                    <li
                        class="menu-item {{ Request::is('offers') || Request::is('add_offer') || Request::is('edit_offer') || Request::is('delete_offer') ? 'active' : '' }}">
                        <a href="{{ url('/offers') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-offer"></i>
                            <div data-i18n="Analytics">Offers</div>
                        </a>
                    </li>

                    <!-- Users -->
                    <li
                        class="menu-item {{ Request::is('customers') ||
                        Request::is('add_customer') ||
                        Request::is('edit_customer') ||
                        Request::is('delete_customer') ||
                        Request::is('admins') ||
                        Request::is('add_admin') ||
                        Request::is('edit_admin') ||
                        Request::is('delete_admin')
                            ? 'active open'
                            : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-group"></i>
                            <div>Users</div>
                        </a>
                        <ul class="menu-sub">
                            <li
                                class="menu-item {{ Request::is('customers') || Request::is('add_customer') || Request::is('edit_customer') || Request::is('delete_customer') ? 'active' : '' }}">
                                <a href="{{ url('/customers') }}" class="menu-link">
                                    <div>Customers</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ Request::is('admins') || Request::is('add_admin') || Request::is('edit_admin') || Request::is('delete_admin') ? 'active' : '' }}">
                                <a href="{{ url('/admins') }}" class="menu-link">
                                    <div>Admins</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- <!-- Carts -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cart"></i>
                            <div>Shopping Carts</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ url('/stored_carts') }}" class="menu-link">
                                    <div>Stored Carts</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/used_carts') }}" class="menu-link">
                                    <div>Used Carts</div>
                                </a>
                            </li>

                        </ul>
                    </li> --}}

                    <!-- Receipts -->
                    <li
                        class="menu-item {{ Request::is('receipts') || Request::is('delete_receipt') ? 'active' : '' }}">
                        <a href="{{ url('/receipts') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-receipt"></i>
                            <div data-i18n="Analytics">Receipts</div>
                        </a>
                    </li>

                    <!-- Contact -->
                    <li class="menu-item {{ Request::is('contact') || Request::is('delete_contact') ? 'active' : '' }}">
                        <a href="{{ url('/contact') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-headphone"></i>
                            <div data-i18n="Analytics">Contact</div>
                        </a>
                    </li>

                    <!-- Pages -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>

                    {{-- Login --}}
                    <li class="menu-item">
                        <a href="{{ url('/log_in') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-log-in-circle"></i>
                            <div data-i18n="Analytics">Login</div>
                        </a>
                    </li>

                    {{-- Sign up --}}
                    <li class="menu-item">
                        <a href="{{ url('/sign_up') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-plus"></i>
                            <div data-i18n="Analytics">Sign Up</div>
                        </a>
                    </li>

                    {{-- Reset password --}}
                    <li class="menu-item">
                        <a href="{{ url('/reset_password') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-lock"></i>
                            <div data-i18n="Analytics">Reset Password</div>
                        </a>
                    </li>

                    {{-- landing page --}}
                    <li class="menu-item">
                        <a href="{{ url('/landing_page') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-analyse"></i>
                            <div data-i18n="Analytics">Landing Page</div>
                        </a>
                    </li>

                    {{-- Error --}}
                    <li class="menu-item">
                        <a href="{{ url('/error') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-error"></i>
                            <div data-i18n="Analytics">Error</div>
                        </a>
                    </li>

                </ul>

            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">

                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        @yield('search_bar')
                        <!-- /Search -->


                        <!-- User / Notifications -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <li>
                                <a class="nav-link" href="{{ url('/profile') }}" style="margin-right: 10px;">
                                    <img src="{{ asset('assets/images/sara.jpg') }}"
                                        class="w-px-40 h-auto rounded-circle box-shadow" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                        data-bs-original-title="Profile" />
                                </a>
                            </li>

                            <li data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                data-bs-html="true" data-bs-original-title="Notifications">
                                <a class="" href="{{ url('/notification') }}">
                                    <i class="bx bxs-bell fs-4 navbar-icon"></i>
                                </a>
                            </li>

                            <li data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom"
                                data-bs-html="true" data-bs-original-title="Log Out">
                                <a class="" href="{{ url('/landing_page') }}">
                                    <i class="bx bx-log-out-circle fs-4 navbar-icon"></i>
                                </a>
                            </li>
                        </ul>
                        <!--/ User / Notifications -->

                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                <p> Copyright © 2023 All rights reserved. </p>
                            </div>
                            <div>
                                <p> Graduation Project </p>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout container -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/account-settings.js') }}"></script>


    @yield('script')

</body>

</html>
