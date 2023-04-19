@extends('pages.login-register.layout_2')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="col-md-9 frame">
        <div class="card" style="border-radius: 15px;">
            <div class="row g-0">

                <div class="col-md-6 ps-4">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="app-brand mt-2">
                            <a href="{{ route('dashboard') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/images/logos/orango mini logo.png') }}" />
                                </span>
                                <span class="font-family app-brand-text demo text-body fw-bolder text-primary">OranGo</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <br><br>
                        {{-- Header --}}
                        <h2 class="font-family fw-bold">Reset<span style="color:rgba(253,196,0,1);"> Password</span></h2>
                        <p>Enter your email and we'll send you instructions to reset your password.</p>
                        {{-- / Header --}}

                        <br>
                        {{-- Form --}}
                        <form action="" method="">

                            <div class="mb-3">
                                <div class="col-sm-11">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Email" required />
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <br><br>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-11 d-grid">
                                    <button type="submit" class="btn btn-primary">Send Reset Link</button>
                                    <br>
                                    <button type="submit" class="btn btn-secondary">Resend Link</button>
                                </div>
                            </div>

                        </form>
                        {{-- / Form --}}

                    </div>
                </div>

                {{-- Image --}}
                <div class="col-md-6  right-box">
                    <div class="px-5 frame-img">
                        <img class="card-img card-img-left" src="{{ asset('assets/images/illustrations/reset password.png') }}"
                            alt="Card image">
                    </div>
                    <div class="row">
                        <a class="fw-semibold text-secondary d-flex align-items-center justify-content-center" href="{{ url('/log_in') }}">
                        <i class="bx bx-chevron-left bx-sm"></i>Back To Login
                    </a>
                    </div>
                </div>
                {{-- / Image --}}


            </div>
        </div>
    </div>
@endsection
