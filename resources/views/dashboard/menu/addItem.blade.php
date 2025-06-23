<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restaurant Manager</title>

    <link rel="stylesheet" href="/dash/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/dash/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/dash/assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="/dash/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/dash/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="/dash/assets/css/style.css">

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
                             @if($count)<li class="breadcrumb-item"><a href="{{url('/edit/order/'.$reg)}}">Cart  <span class="badge badge-success">[{{ $count }}]</span> </a></li>@endif
                            <li class="breadcrumb-item"><a href="{{url('/menu')}}">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/order-list')}}">Order List</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row"> 
                    @if($food)
                        @foreach($food as $val)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <a href="{{url('/specific-food-view/'.$val->id)}}"><img src="{{ asset('img/food/' . $val->image) }}" class="card-img-top" alt="image not found"></a>
                                    <div class="card-body d-flex flex-column">
                                        <h4 class="card-title"><a href="{{url('/specific-food-view/'.$val->id)}}">{{strlen($val->name) > 22 ? substr($val->name, 0, 22).'...' : $val->name}} - ৳{{ $val->price }}/-</a></h4>
                                        <p>{{ strlen($val->ingredients) > 40 ? substr($val->ingredients, 0, 40) . '...' : $val->ingredients }}</p>
                                        <a href="{{ url('/edit/add/item/cart/'.$val->id.'/'.$reg) }}" class="mt-auto btn btn-outline-success w-100">
                                            <i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i>
                                            <span style="font-size: 1rem;" class="mb-0">Add Cart</span>
                                        </a>
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