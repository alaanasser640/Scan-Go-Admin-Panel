@extends('pages.admin-panel.layout')

@section('title')
    Profile
@endsection

@section('search_bar')
    <!-- Search -->
    <div class="table-search-disabled d-flex align-items-center" style="width:400%;">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..."
            disabled />
    </div>
    <!-- /Search -->
@endsection

@section('content')
    {{-- Validation errors alert --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error message alert  --}}
    @if (session()->has('error_message'))
        <div class="alert alert-danger alert-dismissible">
            {{ session()->get('error_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Message alert --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Page header -->
    <div class="">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('profile.index') }}">
                    <i class="bx bx-user" style="margin: -3px 0px 0px -3px;"></i>&nbsp;&nbsp;Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notifications.index') }}">
                    <i class="bx bx-bell" style="margin: -3px 0px 0px -3px;"></i>
                    &nbsp;&nbsp;Notifications&nbsp;
                    @if (Auth::user()->unreadNotifications->count() > 0)
                        ( {{ Auth::user()->unreadNotifications->count() }} )
                    @endif
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
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ file_exists(public_path('images/' . Auth::user()->image)) ? asset('images/' . Auth::user()->image) : asset('assets/images/avatars/pic-4.png') }}"
                        alt="user-avatar" class="img-profile d-block rounded-circle" height="130" width="130"
                        id="uploadedAvatar">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-outline-warning me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Change Photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" name="image" hidden
                                accept="image/png, image/jpeg">
                        </label>
                        <input type="hidden" class="form-control" name="hidden_image" value="{{ Auth::user()->image }}" />

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
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">User Name </label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="First Name" name="user_name"
                                value="{{ Auth::user()->user_name }}" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="tel" class="form-control" placeholder="Phone" name="phone_number"
                                value="{{ Auth::user()->phone_number }}" />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" name="email" placeholder="Email"
                                value="{{ Auth::user()->email }}" />
                        </div>
                    </div>
                </div>

                {{-- <div class="row mb-3 form-password-toggle">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="password" id="pass_input" class="form-control" placeholder="*******" />
                            <span class="input-group-text cursor-pointer">
                                <i class="bx bx-hide" id="pass_icon"></i>
                            </span>
                        </div>
                    </div>
                </div> --}}

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
            <form action="{{ route('profile.destroy', Auth::user()->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="delete_checkbox">
                    <label class="form-check-label" name="delete_checkbox">I confirm my account deactivation</label>
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>

            </form>
        </div>
    </div>
    <!-- / Delete Account -->
@endsection
