<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
    <title>Get Started</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/blue mini logo.png" />
</head>

<body>
    <div class="container-fluid justify-content-between">
        <!--partial:partials/_navbar.html-->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 px-lg-5 py-xxl-3 fixed-top d-flex flex-row">

            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ url('/landing_page')}}"><img src="../../assets/images/black logo.png"
                        alt="logo" /></a>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-stretch">

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login_register')}}">
                            <i class="mdi mdi-login text-black"></i>
                            <p class="mb-1 m-lg-2 text-black">Login</p>
                        </a>
                    </li>



                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>



        <div class="hero container-fluid page-body-wrapper">
            <div class="landing-row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">

                    <h1 class="landing-header">Smart Cart Admin Panel</h1>
                    <h4 class="landing-subheader">Manage category, product, customer, <br>admin, receipt & carts</h4>

                    <div>
                        <div class="text-center text-lg-start">
                            <a href="{{ url('/login_register')}}" class="btn btn-gradient-primary">
                                <span>Get Started</span>
                                <i class="mdi mdi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="../../assets/images/mainbenner.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </div>







    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script src="../../assets/js/chart.js"></script>


</body>

</html>