<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>View Order # {{ $food->get(1)->reg ?? 'No second item' }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/dash/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/dash/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/dash/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/dash/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/dash/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
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
                    <h3 class="page-title"> ORD- : {{ $food->get(1)->reg ?? 'No second item' }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Edit Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Items</a></li>
                        </ol>
                    </nav>
                </div>

    
    <div class="row">
        <div class="col-lg-8 col-md-6">
            <div class="row g-3">
                @if($food)
                @foreach($food as $key => $val)
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="mb-0 text-success">{{ $val->food->name }}</h5>
                                <span class="badge bg-light text-dark">#{{ $key + 1 }}</span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Price per item:</small><br>
                                <strong class="text-dark" data-price="{{ $val->price }}">৳{{ number_format($val->price, 2) }}</strong>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="text-muted">Quantity:</div>
                                <div class="input-group input-group-sm" style="width: 120px;">
                                    <button type="button" 
                                        class="btn btn-outline-secondary btn-minus"
                                        data-id="{{ $val->id }}"
                                        style="padding: 0 6px; font-size: 14px; height: 28px;">−</button>

                                    <input type="number"
                                        class="form-control text-center qty-input"
                                        value="{{ $val->quantity }}"
                                        min="1"
                                        name="txtStock"
                                        readonly
                                        data-id="{{ $val->id }}"
                                        style="width: 36px; height: 28px; font-size: 13px; padding: 0;">

                                    <button type="button" 
                                            class="btn btn-outline-secondary btn-plus"
                                            data-id="{{ $val->id }}"
                                            style="padding: 0 6px; font-size: 14px; height: 28px;">+</button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">Total:</div>
                                <h6 class="mb-0 text-success">
                                    <span class="item-subtotal">৳{{ number_format($val->price * $val->quantity, 2) }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-end">
                            <button class="btn btn-sm btn-outline-danger remove-item-link"
                                    data-id="{{ $val->id }}" title="Remove item">
                                <i class="mdi mdi-cart-off"></i> Remove
                            </button>
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
        <div class="col-lg-4 col-md-6 mt-2">
            <div class="card mt-2">
                <div class="card-body p-2 p-md-4">
                    <form action="#" method="POST">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-0">Table</p>
                            <h5 class="card-title m-0"><span id="cart-total">{{$order->table->tName}}</span></h5>
                        </div><hr>
                        <div class="card-body p-3 p-md-4">
                            <h4>Location</h4>
                            <p><i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="m-0">Subtotal ({{$count}} items)</h5>
                                <h5 class="card-title m-0">$<span id="cart-subtotal">{{$order->total}}</span>/-</h5>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- <h5 class="m-0">Shipping Fee</h5>
                                <h5 class="card-title m-0">$<span id="shipping-fee">0.00</span>/-</h5> -->
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- <h5 class="m-0">VAT %</h5>
                                <h5 class="card-title m-0">$<span id="shipping-fee">0.00</span>/-</h5> -->
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="m-0">Discount</h5>
                                <h5 class="card-title m-0">$<span id="shipping-fee">{{$order->discount}}</span>/-</h5>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="m-0">Total</p>
                                <h5 class="card-title m-0">$<span id="cart-total">{{$order->payable}}</span>/-</h5>
                            </div>
                        </div>
                    </form> 
                </div>
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
   


</body>
</html>