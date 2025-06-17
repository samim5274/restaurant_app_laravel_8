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
                        <h3 class="page-title"> Food Item </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/food')}}">Food</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/dashboard/setting')}}">Setting</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-0">Food Details</h4>
                                    </div>  
                                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Food Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data)
                                        @php
                                            $statusText = [1 => 'Active', 2 => 'De-active'];
                                            $statusClass = [1 => 'text-success', 2 => 'text-danger'];
                                        @endphp
                                        @foreach($data as $key => $val)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td><img src="{{ asset('img/food/' . $val->image) }}" alt="Image not found" width="100"></td>
                                                <td>{{ $val->name }}</td>
                                                <td class="text-center">{{ $val->price }}</td>
                                                <td class="text-center">{{ $val->stock }}</td>
                                                <td class="text-center {{ $statusClass[$val->status] ?? 'text-success' }}">
                                                    {{ $statusText[$val->status] ?? 'Unknown' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                    </table>
                                    <!-- Pagination links -->
                                    <div class="d-flex justify-content-end mt-3">
                                        <div class="d-flex justify-content-end mt-3">
                                            
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