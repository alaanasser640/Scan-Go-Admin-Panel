@extends('pages.admin-panel.layout')

@section('title')
    Profile
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
    <!-- Page header -->
    <div class="">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/profile') }}">
                    <i class="bx bx-user" style="margin: -3px 0px 0px -3px;"></i>&nbsp;&nbsp;Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/notification') }}">
                    <i class="bx bx-bell" style="margin: -3px 0px 0px -3px;"></i>&nbsp;&nbsp;Notifications
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{url('/purchase')}}">
                    <i class="mdi mdi-cart-plus me-2"></i> Purchase
                </a>
            </li> --}}
        </ul>
    </div>
    <!-- / Page header -->


    <!-- Account Details -->
    <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{ asset('assets/images/sara.jpg') }}" alt="user-avatar"
                    class="img-profile d-block rounded-circle" height="130" width="130" id="uploadedAvatar">
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-outline-warning me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Change Photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" hidden=""
                            accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>

                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
            <form action="" method="" enctype="multipart/form-data">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">First Name </label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="First Name" required />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Last Name </label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="Last Name" required />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="tel" class="form-control" placeholder="Phone" required />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="Email" required />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="password" class="form-control" placeholder="*******" required />
                        </div>
                    </div>
                </div>

                <br>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Account Details -->


    <!-- Delete Account -->
    <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
            <div class="mb-3 col-12 mb-0">
                <div class="alert alert-danger">
                    <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                </div>
            </div>
            <form action="" method="" enctype="multipart/form-data" id="formAccountDeactivation"
                onsubmit="return false">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                    <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
        </div>
    </div>
    <!-- / Delete Account -->
@endsection
