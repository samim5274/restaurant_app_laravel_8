<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Restaurant Manager</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="/dash/assets/vendors/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="/dash/assets/vendors/flag-icon-css/css/flag-icon.min.css">
      <link rel="stylesheet" href="/dash/assets/vendors/css/vendor.bundle.base.css">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="/dash/assets/vendors/font-awesome/css/font-awesome.min.css" />
      <link rel="stylesheet" href="/dash/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <!-- endinject -->
      <!-- Layout styles -->
      <link rel="stylesheet" href="/dash/assets/css/style.css">
      <!-- End layout styles -->
      <link rel="shortcut icon" href="/dash/assets/images/favicon.png" />
      <style>
        .btn-social {
          padding: 0.75rem;
          font-weight: 500;
          border-radius: 0.5rem;
          border: 1px solid transparent;
          transition: all 0.2s ease-in-out;
          box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .google-btn {
          background-color: #fff;
          color: #db4437;
          border-color: #db4437;
        }

        .facebook-btn {
          background-color: #3b5998;
          color: #fff;
        }

        .github-btn {
          background-color: #24292e;
          color: #fff;
        }

        .btn-social:hover {
          opacity: 0.9;
          transform: scale(1.02);
        }
      </style>
  </head>
<body>





<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="/dash/assets/images/logo-dark.svg">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                @include('dashboard.message.message')
                <form class="pt-3" action="{{url('/user-login')}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="txtEmail" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="txtPassword" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="row g-3 mb-4">
                    <div class="col-md-4">
                      <a href="{{url('/login/google')}}"><button type="button" class="btn btn-social w-100 d-flex align-items-center justify-content-center google-btn">
                        <i class="mdi mdi-google me-2 fs-5"></i> Google
                      </button></a>
                    </div>
                    <div class="col-md-4">
                      <a href="{{url('/login/facebook')}}"><button type="button" class="btn btn-social w-100 d-flex align-items-center justify-content-center facebook-btn">
                        <i class="mdi mdi-facebook me-2 fs-5"></i> Facebook
                      </button></a>
                    </div>
                    <div class="col-md-4">
                      <a href="{{url('/login/github')}}"><button type="button" class="btn btn-social w-100 d-flex align-items-center justify-content-center github-btn">
                        <i class="mdi mdi-github me-2 fs-5"></i> GitHub
                      </button></a>
                    </div>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{url('/create-user-view')}}" class="text-primary">Create new account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>






    <!-- plugins:js -->
    <script src="/dash/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/dash/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/dash/assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/dash/assets/js/off-canvas.js"></script>
    <script src="/dash/assets/js/hoverable-collapse.js"></script>
    <script src="/dash/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/dash/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="/dash/assets/js/food.js"></script>
        

</body>
</html>