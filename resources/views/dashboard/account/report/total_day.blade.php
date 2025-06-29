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
                        <h3 class="page-title"> Daily Expenses </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/daily-expenses')}}">Daily Expenses</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/expenses-setting')}}">Setting</a></li>
                            </ol>
                        </nav>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body p-2 p-md-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2 class="cart-title mb-0">Selected day and category wise Report</h2>
                                        <button type="button" onclick="printreport()" class="btn btn-primary btn-sm">
                                            <i class="mdi mdi-printer" style="font-size:1rem"></i>
                                        </button>
                                    </div>
                                    <form action="{{ url('/search-total-day') }}" method="GET" class="p-3 border rounded shadow-sm bg-white">
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
                                        <br>
                                        <button type="submit" class="btn btn-success btn-sm w-100">
                                            <i class="mdi mdi-file-find" style="font-size:1rem"></i> Search
                                        </button>
                                    </form>                                    
                                </div>
                                <div class="card-body p-2 pb-md-4 px-md-4">                                    
                                    <div class="table-responsive border rounded shadow-sm bg-white">                                        
                                        <table class="table table-hover mb-0" id="printableTable">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Date</th>
                                                    <th>Category.</th>
                                                    <th>Sub-Category</th>
                                                    <th>Remark</th>
                                                    <th class="text-center">Amount (৳)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($expenses)
                                                @foreach($expenses as $key => $val)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$val->date}}</td>
                                                    <td>{{$val->category->name}}</td>
                                                    <td>{{$val->subcategory->name}}</td>
                                                    <td>{{$val->remark}}</td>
                                                    <td class="text-center">৳{{$val->amount}}/-</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                <tr>
                                                    <td colspan="5">Total:</td>
                                                    <td class="text-center">৳{{$total}}/-</td>
                                                </tr>
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
        <script>
            document.getElementById('dtpStartDate').valueAsDate = new Date();
            document.getElementById('dtpEndDate').valueAsDate = new Date();

            function printreport() {
                var header = `
                    <h1 style="text-align:center;">Restaurant Management System</h1>
                    <p style="text-align:center;">House # 02, Road # 11, Sector # 6, Uttara, Dhaka-1230</p>
                    <h3 style="text-align:center;">Selected day wise Report</h3>
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
                document.body.innerHTML = originalContents;
            }
        </script>
    </body>
    </html>