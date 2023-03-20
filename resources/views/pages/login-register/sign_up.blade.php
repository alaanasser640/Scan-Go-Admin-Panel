@extends('pages.login-register.layout_2')

@section('title')
    Sign Up
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!------ Right Box (image) ------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #FFF3D1;">
                <div class="featured-image mb-3">
                    <img src="../assets/images/sign up.png" class="img-fluid" style="width: 400px;">
                </div>
                <br><br><br>
                <div class="row">
                    <span>
                        One Of Us? &nbsp;
                        <a href="{{ url('/log_in') }}">Login</a>
                    </span>
                </div>
            </div>


            <!------ Left Box (form) ---------------------------->

            <div class="col-md-6 right-box">
                {{-- <div class="brand-logo">
        <img src="../assets/images/orango logo.png">
      </div> --}}
                <div class="row align-items-center">
                    <div class="header-text"><br>
                        <h2>Sign<span style="color:rgba(253,196,0,1);"> Up</span></h2>
                        <br>
                        <p>Signing up is easy. It only takes a few steps</p>
                    </div>


                    <form action="" enctype="multipart/form-data">
                        <div class="input-field">
                            <i class="mdi mdi-account"></i>
                            <input type="taxt" placeholder="Username" required />
                        </div>

                        <div class="input-field">
                            <i class="mdi mdi-email"></i>
                            <input type="email" placeholder="Email" required />
                        </div>

                        <div class="input-field">
                            <i class="mdi mdi-phone"></i>
                            <input type="number" placeholder="Phone" required />
                        </div>

                        <div class="input-field">
                            <i class="mdi mdi-lock"></i>
                            <input type="password" placeholder="Password" required />
                        </div>

                        <div class=" mb-5 mt-4 d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small> &nbsp; I agree to all
                                        Terms & Conditions</small></label>
                            </div>
                        </div>


                        <div class="input-group mb-3">
                            <a type="submit" href="{{ url('/') }}" class="btn btn-lg btn-primary w-100 fs-6">SIGN
                                UP</a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
