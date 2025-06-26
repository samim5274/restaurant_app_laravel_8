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
                    <h3 class="page-title"> Total Order list</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" onclick="printreport()"><i class="mdi mdi-printer"></i> Print</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/order-list')}}">Order list</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/table')}}">Table</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="printableTable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th class="text-center">REG</th>
                                                <th class="text-center">Table</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Discount</th>
                                                <th class="text-center">Payable</th>
                                                <th class="text-center">Pay</th>
                                                <th class="text-center">Due</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data)
                                            @foreach($data as $key => $val)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{$val->date}}</td>
                                                <td class="text-center"><a href="{{url('/view/order/'.$val->reg)}}">ORD-{{$val->reg}}</a></td>
                                                <td class="text-center">{{$val->table->tName}}</td>
                                                <td class="text-center">৳{{$val->total}}/-</td>
                                                <td class="text-center">৳{{$val->discount}}/-</td>
                                                <td class="text-center">৳{{$val->payable}}/-</td>
                                                <td class="text-center">৳{{$val->pay}}/-</td>
                                                <td class="text-center">৳{{$val->due}}/-</td>
                                                <td class="text-center" style="width: 60px">
                                                    <div class="d-flex justify-content-center gap-1">
                                                        <a href="{{ route('invoice.get', $val->reg) }}" class=" btn-sm px-2 py-1" title="Download Invoice">   <i class="mdi mdi-arrow-down-bold-circle-outline" style="font-size: 1rem;"></i></a>
                                                    </div>
                                                </td>

                                            </tr>
                                            @endforeach
                                            @endif
                                            <tr>
                                                <td class="text-start" colspan="4">Total:</td>
                                                <td class="text-center">৳{{$total}}/-</td>
                                                <td class="text-center">৳{{$totalDiscount}}/-</td>
                                                <td class="text-center">৳{{$totalPayable}}/-</td>
                                                <td class="text-center">৳{{$sumTotal}}/-</td>
                                                <td class="text-center">৳{{$totalDue}}/-</td>
                                                <td class="text-center"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{$data->links()}}
                                    </div>
                                </div>
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
    <!-- End custom js for this page -->
    <script src="/dash/assets/js/orderPayment.js"></script>

</body>
</html>