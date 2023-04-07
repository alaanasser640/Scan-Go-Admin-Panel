@extends('pages.login-register.layout_2')

@section('title')
    Sign Up
@endsection

@section('content')
<div class="col-md-9">
    <div class="card" style="border-radius: 15px;">
        <div class="row g-0">

            {{-- Image --}}
            <div class="col-md-6  left-box">
                <div class="px-5">
                    <img class="card-img card-img-left" src="{{ asset('assets/images/illustrations/sign up.png') }}" alt="Card image">
                </div>
                <div class="row">
                    <span class="fs-5 mb-4">
                        One Of Us? &nbsp; <a class="fw-semibold" href="{{ url('/log_in') }}">Log In</a>
                    </span>
                </div>
            </div>
            {{-- / Image --}}

            <div class="col-md-6 ps-4">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="app-brand mt-2">
                        <a href="{{ route('dashboard') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/images/orango mini logo.png') }}" />
                            </span>
                            <span class="font-family app-brand-text demo text-body fw-bolder text-primary">OranGo</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <br><br>
                    {{-- Header --}}
                    <h2 class="font-family fw-bold">Sign<span style="color:rgba(253,196,0,1);"> Up</span></h2>
                    <p>Signing up is easy. It only takes a few steps.</p>
                    {{-- / Header --}}

                    <br>
                    {{-- Form --}}
                    <form action="" method="">

                        <div class="mb-3">
                            <div class="col-sm-11">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Username" required />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="col-sm-11">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" required />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="col-sm-11">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="tel" class="form-control" placeholder="Phone" required />
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="col-sm-11">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me">I agree to all Terms & Conditions.</label>
                            </div>

                        <br><br>
                        <div class="row">
                            <div class="col-sm-11 d-grid">
                                <button type="submit" class="btn btn-primary">SIGN UP</button>
                            </div>
                        </div>

                    </form>
                    {{-- / Form --}}

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
