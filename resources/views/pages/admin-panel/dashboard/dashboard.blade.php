@extends('pages.admin-panel.layout')

@section('title')
    Dashboard
@endsection

@section('search_bar')
    <!-- Search -->
    <div class="table-search d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
    </div>
    <!-- /Search -->
@endsection

@section('content')
    <div class="row">
        <!-- Welcome card -->
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h4 class="card-title text-primary">Welcome Back,
                                <span class="fw-bold text-secondary">Sara!</span> 🎉
                            </h4>
                            <p class="mb-4"><i class="bx bx-calendar"></i> &nbsp; Monday, 30 Mar
                                2023</p>
                            <a href="javascript:;" class="btn btn-sm btn-outline-warning"
                                style="width:35%;font-size: 0.9rem;">View Profile</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/images/illustrations/man-with-laptop-green.png') }}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Welcome card -->

        <!-- Cards -->
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">

                <!-- Category card -->
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="icon-card card-1 bx bx-category"></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Categories</span>
                            <h3 class="card-title mb-2">200</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>

                <!-- Product card -->
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="icon-card card-2 bx bx-package"></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Products</span>
                            <h3 class="card-title text-nowrap mb-1">100</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                    </div>
                </div>

                <!-- offers card -->
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="icon-card card-3 bx bxs-offer"></i>
                                </div>
                            </div>
                            <span class="d-block mb-1">Offers</span>
                            <h3 class="card-title text-nowrap mb-2">25</h3>
                            <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                    </div>
                </div>

                <!-- Shopping carts card -->
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="icon-card card-4 bx bxs-cart"></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Shopping Carts</span>
                            <h3 class="card-title mb-2">12</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                    </div>
                </div>

                <!-- Customers card -->
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="icon-card card-5 bx bxs-group"></i>
                                </div>
                            </div>
                            <span class="d-block mb-1">Customers</span>
                            <h3 class="card-title text-nowrap mb-2">25</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                    </div>
                </div>

                <!-- Receipt card -->
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="icon-card card-6 bx bxs-receipt"></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Receipts</span>
                            <h3 class="card-title mb-2">12</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Cards -->
    </div>

    <!-- Charts -->
    <div class="row" style="margin-top: -440px;">

        <!-- Receipts Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">

                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Receipts Statistics</h5>
                        <small class="text-muted">42.82k Total Sales</small>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">8,258</h2>
                            <span>Total Orders</span>
                        </div>
                        <div id="receiptStatisticsChart"></div>
                    </div>

                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">

                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-label-primary"></span>
                            </div>

                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Smaller than 30%</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>

                        </li>

                        <li class="d-flex mb-4 pb-1">

                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-info"></span>
                            </div>

                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Equal 30%</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>

                        </li>

                        <li class="d-flex mb-4 pb-1">

                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded-circle bg-success"></span>
                            </div>

                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Bigger than 30%</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>

                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <!--/ Receipts Statistics -->

        <!-- Best Selling Statistics -->
        <div class="col-md-6 col-lg-4 order-1 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Best Selling Statistics</h5>
                            <small class="text-muted">42.82k Total Sales</small>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active mt-5" id="navs-tabs-line-card-income" role="tabpanel">
                            <div id="sellingChart"></div>
                            <!-- Expenses Of Week -->
                            {{-- <div class="d-flex justify-content-center pt-4 gap-2">
                                <div class="flex-shrink-0">
                                    <div id="expensesOfWeek"></div>
                                </div>
                                <div>
                                    <p class="mb-n1 mt-1">Expenses This Week</p>
                                    <small class="text-muted">$39 less than last week</small>
                                </div>
                            </div> --}}
                            <!-- / Expenses Of Week -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Best Selling Statistics -->

    </div>
    <!-- /Charts -->



@endsection
