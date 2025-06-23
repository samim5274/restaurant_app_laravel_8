<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Cart # {{ $data->get(1)->reg ?? 'No second item' }}</title>
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
                    <h3 class="page-title"> Updated : {{ $invoice}}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/edit/order/'.$invoice)}}">Edit Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/add/item/cart/'.$invoice)}}">Add Items</a></li>
                        </ol>
                    </nav>
                </div>

    <div class="row">
        <div class="col-lg-8 col-md-12 grid-margin stretch-card">
            <div class="card mt-2">
                <div class="card-body p-2 p-md-4">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Food Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data)
                                    @foreach($data as $key => $val)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $val->food->name }}</td>
                                            <td class="text-center" data-price="{{ $val->price }}">
                                                ${{ number_format($val->price, 2) }}
                                            </td>
                                            <td class="text-center align-middle p-1">
                                                <div class="input-group input-group-sm mx-auto" style="max-width: 100px;">
                                                    <div class="input-group-prepend">
                                                        <button type="button" 
                                                            class="btn btn-outline-secondary btn-minus d-flex justify-content-center align-items-center px-2"
                                                            data-id="{{ $val->id }}"
                                                            style="height: 28px; width: 28px;">−</button>
                                                    </div>
                                                    <input type="number"
                                                        class="form-control text-center qty-input p-0"
                                                        value="{{ $val->quantity }}"
                                                        min="1"
                                                        name="txtStock"
                                                        readonly
                                                        data-id="{{ $val->id }}"
                                                        style="width: 36px; height: 28px; font-size: 12px;">
                                                    <div class="input-group-append">
                                                        <button type="button" 
                                                            class="btn btn-outline-secondary btn-plus d-flex justify-content-center align-items-center px-2"
                                                            data-id="{{ $val->id }}"
                                                            style="height: 28px; width: 28px;">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="item-subtotal">${{ number_format($val->price * $val->quantity, 2) }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="text-danger remove-item-link" data-id="{{ $val->id }}">
                                                    <i class="mdi mdi-cart-off fa-lg"></i>
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

        <!-- Order Summary & Location -->
        <div class="col-lg-4 col-md-12 grid-margin stretch-card">
            <div class="card mt-2">
                <form action="#" method="POST">
                    @csrf
                    <div class="card-body p-3 p-md-4">
                        <input type="number" id="cart-total-input" hidden name="txtSubTotal" class="form-control mb-2" readonly value="{{ number_format($cart->sum(fn($i) => $i->price * $i->quantity), 0) }}">
                        <input type="text" class="form-control mb-2" hidden value="{{ $invoice }}" readonly name="txtReg">
                        <h4>Location</h4>
                        <p><i class="mdi mdi-map-marker"></i> Uttara, Dhaka-1230</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="m-0">Subtotal ({{ $count }} items)</h5>
                            <h5 class="card-title m-0">$<span id="cart-subtotal">{{ number_format($cart->sum(fn($i) => $i->price * $i->quantity), 0) }}</span>/-</h5>
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
                            <!-- <h5 class="m-0">Discount</h5>
                            <h5 class="card-title m-0">$<span id="shipping-fee">0.00</span>/-</h5> -->
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="m-0">Total</p>
                            <h5 class="card-title m-0">$<span id="cart-total">{{ number_format($cart->sum(fn($i) => $i->price * $i->quantity), 0) }}</span>/-</h5>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <select class="form-control" id="exampleSelect" name="cbxTable">
                                <option selected disabled >-- Select Table --</option>
                                @foreach($table as $val)
                                <option value="{{ $val->id }}">{{ $val->tName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" id="confirmBtn" class="btn btn-outline-success w-100" disabled>
                            <h4 class="m-0">Confirm Order</h4>
                        </button>
                    </div>
                </form>                
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