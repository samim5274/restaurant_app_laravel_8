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
            max-height: 550px;
            overflow-y: auto;
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
                    <h3 class="page-title"> Stock Report</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" onclick="printreport()"><i class="mdi mdi-printer"></i> Print</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/download-all-stock')}}"><i class="mdi mdi-arrow-down-bold-circle-outline" stlye="font-size: 1rem;"></i> Download</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/stock-report')}}">Stock Report</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/dashboard/setting')}}">Setting</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <form action="{{ url('/search-stock-way-wise') }}" method="GET" class="p-3 border rounded shadow-sm bg-white">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="dtpStartDate" class="form-label">Start Date</label>
                                            <input type="date" id="dtpStartDate" name="dtpStartDate" required class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dtpEndDate" class="form-label">End Date</label>
                                            <input type="date" id="dtpEndDate" name="dtpEndDate" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-success btn-sm w-100" value="Search">
                                                <i class="mdi mdi-file-find" style="font-size:1rem"></i> Search
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" name="download" class="btn btn-primary btn-sm w-100" value="download">
                                                <i class="mdi mdi-download" style="font-size:1rem"></i> <span>PDF</span>
                                            </button>
                                        </div>
                                    </div>
                                </form><br>
                                <div class="border rounded shadow-sm bg-white">
                                    <div class="table-responsive table-wrapper"> <!-- moved .table-wrapper here -->
                                        <table class="table table-hover mb-0" id="printableTable">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Date</th>
                                                    <th>Food</th>
                                                    <th class="text-center">Stock In</th>
                                                    <th class="text-center">Stock Out</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($stock)
                                                @foreach($stock as $key => $val)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $val->date }}</td>
                                                    <td>{{ $val->food->name }}</td>
                                                    <td class="text-center">{{ $val->stockIn }} pcs</td>
                                                    <td class="text-center">{{ $val->stockOut }} pcs</td>
                                                    <td class="text-center">
                                                        @if($val->status == 1)
                                                            <span class="text-success">Sale</span>
                                                        @elseif($val->status == 2)
                                                            <span class="text-danger">Stock In</span>
                                                        @else
                                                            <span class="text-secondary">Unknown</span>
                                                        @endif
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

    <script>
        const today = new Date();
        const formattedToday = today.toISOString().split('T')[0]; 

        const startInput = document.getElementById('dtpStartDate');
        startInput.valueAsDate = today;
        startInput.max = formattedToday;

        const endInput = document.getElementById('dtpEndDate');
        endInput.valueAsDate = today;
        endInput.max = formattedToday;

        function printreport() {
            var header = `
                <h1 style="text-align:center;">Restaurant Management System</h1>
                <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
                <h3 style="text-align:center;">Stock Report</h3>
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