@extends('pages.login-register.layout_2')

    
@section('title')
    Login

@endsection
@if ($errors->any())
        <div class="alert alert-danger alert-dismissible" style="margin: 20;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible" style="margin: 20;">
        {{ session()->get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif

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
                                    <img src="{{ asset('assets/images/orango mini logo.png') }}" />
                                </span>
                                <span class="font-family app-brand-text demo text-body fw-bolder text-primary">OranGo</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <br><br>
                        {{-- Header --}}
                        <h2 class="font-family fw-bold">Log<span style="color:rgba(253,196,0,1);">in</span></h2>
                        <p>let's get started, Sign in to continue. </p>
                        {{-- / Header --}}

                        <br>
                        {{-- Form --}}
                        <form action="{{route('login.custom')}}" method="post">
@csrf
                            <div class="mb-3">
                                <div class="col-sm-11">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Email"  name="email" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-sm-11">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Password"  name="password"/>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between col-sm-11">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me">Keep me signed in </label>
                                </div>
                                <a href="{{ url('/reset_password') }}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>

                            <br><br>
                            <br><br>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-11 d-grid">
                                    <button type="submit" class="btn btn-primary">LOGIN</button>
                                </div>
                            </div>

                        </form>
                        {{-- / Form --}}

                    </div>
                </div>

                {{-- Image --}}
                <div class="col-md-6  right-box">
                    <div class="px-5 frame-img">
                        <img class="card-img card-img-left" src="{{ asset('assets/images/illustrations/sign in.png') }}"
                            alt="Card image">
                    </div>
                    <div class="row">
                        <span class="fs-5 mb-4">
                            New Here? &nbsp; <a class="fw-semibold" href="{{ url('/sign_up') }}">Sign Up</a>
                        </span>
                    </div>
                </div>
                {{-- / Image --}}


            </div>
        </div>
    </div>
@endsection
