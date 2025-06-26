<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h3 class="page-title"> Cart Details of Reg No : {{$reg}}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" onclick="printreport()"><i class="mdi mdi-printer"></i> Print</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/show-order-item')}}">View List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Served</a></li>
                        </ol>
                    </nav>
                </div>

    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="row g-3" id="printableTable">
                @if($food)
                @foreach($food as $key => $val)
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <a href="{{url('/specific-food-view/'.$val->food->id)}}"><h2 class="mb-0 text-success">{{ $val->food->name }}</h2></a>
                                <span class="badge bg-light text-dark">#{{ $key + 1 }}</span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Price per item:</small><br>
                                <strong class="text-dark" data-price="{{ $val->price }}">৳{{ number_format($val->price, 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">Quantity:</div>
                                <h6 class="mb-0 text-primary">
                                    <span>{{ $val->quantity }} Pcs</span>
                                </h6>
                            </div><hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">Total:</div>
                                <h6 class="mb-0 text-success">
                                    <span class="item-subtotal">৳{{ number_format($val->price * $val->quantity, 2) }}</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 text-center py-4 text-muted">
                    <i class="mdi mdi-cart-outline display-4 d-block mb-2"></i>
                    <p class="mb-0">No items in your cart.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
            </div>

        </div>
    </div>
    <!-- page-body-wrapper ends -->

</div>
<!-- container-scroller -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        updateSubtotalAndTotal();
    });
</script>

</body>
</html>