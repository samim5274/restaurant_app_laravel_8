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
                    <h3 class="page-title"> Cart Details </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/cart-view')}}">Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/menu')}}">Add Item</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">     
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Food Name</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($cart)
                                                @foreach($cart as $key => $val)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{$val->food->name}}</td>
                                                        <td class="text-center">{{$val->price}}</td>
                                                        <!-- <td class="text-center"><input type="number" value="{{$val->quantity}}"></td> -->
                                                        <td class="text-center align-middle p-1">
                                                            <div class="input-group input-group-sm mx-auto" style="max-width: 100px;">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="btn btn-outline-light btn-minus d-flex justify-content-center align-items-center px-2" style="height: 28px; width: 28px;">−</button>
                                                                </div>
                                                                <input type="number" name="qty[]" class="form-control text-center qty-input p-0" value="{{ $val->quantity }}" min="1" readonly style="width: 36px; height: 28px; font-size: 12px;">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-outline-light btn-plus d-flex justify-content-center align-items-center px-2" style="height: 28px; width: 28px;">+</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ url('/remove-to-cart/' . $val->id) }}">
                                                                <i class="mdi mdi-cart-off fa-lg" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body">
                                <h4>Location</h4>
                                <p><i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                                <hr>
                                <h4 class="card-title">Order Summary</h4>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="m-0">Subtotal ({{$count}} items)</h5>
                                    <h5 class="card-title m-0">$450/-</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="m-0">Shipping Fee</h5>
                                    <h5 class="card-title m-0">$00/-</h5>
                                </div><hr>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="m-0">Total</p>
                                    <h5 class="card-title m-0">$450/-</h5>
                                </div>
                                <a href="#" class="btn btn-outline-success w-100"><h4 class="m-0">Confirm Order</h4></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="footer-inner-wraper">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
                </div>
                </div>
            </footer>
            <!-- partial -->

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
    <script src="/dash/assets/js/cart.js"></script>
    

</body>
</html>