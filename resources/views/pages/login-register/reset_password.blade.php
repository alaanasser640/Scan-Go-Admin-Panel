<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OranGo - Reset Password </title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/orango mini logo.png" />
  </head>
  
  <body>
  
    <div class="container-scroller">
      
        <div class="page-body-wrapper full-page-wrapper d-flex auth align-items-center justify-content-center">
              <div class="p-4 shadow rounded-5">
                  <div class="row p-3">
            
      <!------ Right Box (form) ---------------------------->
          
        <div class="col-md-6">

          <div class="brand-logo">
            <img src="../assets/images/orango logo.png">
          </div>
    
          <div class="row align-items-center">
                <div class="header-text mb-4"><br>
                    <h2>
                      Reset Password? 
                      &ThinSpace; <i class="mdi mdi-lock"></i>
                    </h2>
                    <br>
                    <p>Enter your email and we'll send you instructions to reset your password</p>
                </div>
                <br>
                
                
                <form class="pt-3" action="" enctype="multipart/form-data">
              
                <div class="input-field">
                  <i class="mdi mdi-email"></i>
                  <input type="email" placeholder="Email" required/>
                </div>

                <br><br>
                <div class="input-group mb-3">
                    <a type="submit" href="{{ url('/log_in')}}" class="btn btn-lg btn-primary w-100 fs-6">Send Reset Link</a>
                </div>
                
              </form>

          </div>

        </div> 

      <!------ Left Box (image) ------------------------->
      <div class="col-md-6 d-flex justify-content-center align-items-center flex-column img-bac">
        <div class="featured-image mb-3">
          <img src="../assets/images/reset password.png" class="img-fluid" style="width: 400px;">
        </div>
        <br>
        <div class="row" style="margin-bottom: 30px;margin-top: 15px;">
          <span>
            <i class="mdi mdi-arrow-left"></i> &ThinSpace; Back To
            <a href="{{ url('/log_in')}}">Login</a>
          </span>
        </div>
      </div> 
  

            </div>
          </div>
      </div>
    </div>
      

  </body>
</html>