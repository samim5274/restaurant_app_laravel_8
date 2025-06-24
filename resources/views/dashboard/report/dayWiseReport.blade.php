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
    <style>
    .table-wrapper {
        max-height: 600px; 
        overflow-y: auto;
        display: block;
    }

    .table thead th {
        position: sticky;
        top: 0;
        background-color: #8fc3ff; 
        color: #000;
        z-index: 10;
    }
    </style>
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
                    <h3 class="page-title"> Total Due list</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/order-list')}}">Order list</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/table')}}">Table</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#" onclick="printreport()"><i class="mdi mdi-printer"></i> Print</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/download')}}" ><i class="mdi mdi-download"></i> Download</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <form action="{{url('/search-report-date-wise')}}" method="POST">
                                    @CSRF
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <input type="date" id="dtpStartDate" required class="form-control" name="dtpStartDate">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <input type="date" id="dtpEndDate" required class="form-control" name="dtpEndDate">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                                <input type="submit" class="form-control" value="Search">
                                                <button type="submit" name="download" value="1" class="form-control btn btn-sm btn-primary d-flex align-items-center justify-content-center gap-1">
                                                    <i class="mdi mdi-download"></i>
                                                    <span>PDF</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <div class="table-responsive">
                                    <div class="table-wrapper">
                                        <table class="table table-hover mb-0 table-bordered" id="printableTable">
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
                                                @foreach($order as $key => $val)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $val->date }}</td>
                                                    <td class="text-center">ORD-{{ $val->reg }}</td>
                                                    <td class="text-center">{{ $val->table->tName }}</td>
                                                    <td class="text-center">৳{{ $val->total }}/-</td>
                                                    <td class="text-center">৳{{ $val->discount }}/-</td>
                                                    <td class="text-center">৳{{ $val->payable }}/-</td>
                                                    <td class="text-center">৳{{ $val->pay }}/-</td>
                                                    <td class="text-center">৳{{ $val->due }}/-</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
    <script>
        document.getElementById('dtpStartDate').valueAsDate = new Date();
        document.getElementById('dtpEndDate').valueAsDate = new Date();
        // window.onload = function() {
        //     window.print();
        // }
        function printreport() {
            var header = `
                <h1 style="text-align:center;">Restaurant Management System</h1>
                <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
                <h3 style="text-align:center;">Sale Report</h3>
                <hr>
            `;

            var style = `
                <style>
                    table { 
                        width: 100%; 
                        border-collapse: collapse; 
                        margin-top: 10px;
                    }
                    th, td {
                        border: 1px solid #000;
                        padding: 6px;
                        text-align: center;
                    }
                    th {
                        background-color: #f4f4f4;
                    }
                </style>
            `;

            var printContent = document.getElementById('printableTable').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = header + style + printContent;
            window.print();
            setTimeout(function () {
                location.reload();
            }, 100);
            document.body.innerHTML = originalContents;
        }

    </script>

</body>
</html>