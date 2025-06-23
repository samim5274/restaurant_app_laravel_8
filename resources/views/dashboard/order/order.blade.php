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
</head>
<body>


<div class="container-scroller">

    @include('dashboard.layouts.menu_top')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        
        @include('dashboard.layouts.menu_main')

        <div class="main-panel">

            @include('dashboard.message.message')

            <div class="content-wrapper">

                <div class="page-header">
                    <h3 class="page-title"> Select Table </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/menu')}}">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/dashboard/setting')}}">Setting</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    @if($table && count($table) > 0)
                    
                    @foreach($table as $val)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="https://images.pexels.com/photos/1648373/pexels-photo-1648373.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top" alt="image not found">
                            <div class="card-body d-flex flex-column">
                                <p class="card-text">You need to first book your table.</p>
                                <a href="{{url('/booked/table/'.$val->id)}}" class="mt-auto btn btn-success w-100">{{ $val->tName }} - Book Now</a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif
                    

                </div>
            </div>

        </div>
    </div>
    <!-- page-body-wrapper ends -->

</div>
<!-- container-scroller -->


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