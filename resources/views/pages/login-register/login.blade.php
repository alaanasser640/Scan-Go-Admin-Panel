@extends('pages.login-register.layout_2')

@section('title')
    Login
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!------ Right Box (form) ---------------------------->

            <div class="col-md-6 right-box">
                {{-- <div class="brand-logo">
        <img src="../assets/images/orango logo.png">
      </div> --}}
                <div class="row align-items-center">
                    <div class="header-text mb-4"><br>
                        <h2>Log<span style="color:rgba(253,196,0,1);">in</span></h2>
                        <br>
                        <p>let's get started, Sign in to continue </p>
                    </div>
                    <br>


                    <form action="" enctype="multipart/form-data">

                        <div class="input-field">
                            <i class="mdi mdi-email"></i>
                            <input type="email" placeholder="Email" required />
                        </div>

                        <div class="input-field">
                            <i class="mdi mdi-lock"></i>
                            <input type="password" placeholder="Password" required />
                        </div>

                        <div class=" mb-5 mt-4 d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small> &nbsp; Keep me sign
                                        in</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="{{ url('/reset_password') }}">Forgot Password?</a></small>
                            </div>
                        </div>

                        <br><br><br>
                        <br><br><br>
                        <div class="input-group mb-3">
                            <a type="submit" href="{{ url('/') }}" class="btn btn-lg btn-primary w-100 fs-6">LOGIN</a>
                        </div>

                    </form>

                </div>
            </div>

            <!------ Left Box (image) ------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #FFF3D1;">
                <div class="featured-image mb-3">
                    <img src="../assets/images/sign in.png" class="img-fluid" style="width: 400px;">
                </div>
                <br>
                <div class="row" style="margin-bottom: 30px;margin-top: 15px;">
                    <span>
                        New Here? &nbsp;
                        <a href="{{ url('/sign_up') }}">Sign Up</a>
                    </span>
                </div>
            </div>



        </div>
    </div>
@endsection
