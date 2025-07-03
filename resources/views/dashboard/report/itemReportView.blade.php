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
                                <div class="table-responsive border rounded shadow-sm bg-white">
                                    <table class="table table-hover  mb-0" id="printableTable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Stock</th>
                                                <th>Price (৳)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($food)
                                            @foreach($food as $key => $val)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td><a href="{{url('/food-stock-show-report/'.$val->id)}}"><img src="{{ asset('img/food/' . $val->image) }}" alt="Image not found" class="img-thumbnail" width="80"></a></td>
                                                <td><a href="{{url('/food-stock-show-report/'.$val->id)}}">{{$val->name}}</a></td>
                                                <td>{{$val->category}}</td>
                                                <td>{{$val->stock}} pcs</td>
                                                <td>৳{{$val->price}}/-</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $food->links('pagination::tailwind') }}
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