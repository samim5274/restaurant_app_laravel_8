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
                        <h3 class="page-title"> Employee Details </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/employee-details')}}">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/dashboard/setting')}}">Setting</a></li>
                            </ol>
                        </nav>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body p-2 p-md-4">
                                    <div class="row mb-3 align-items-stretch">
                                        <div class="col-md-10">
                                            <form class="d-flex h-100" method="GET" action="#">
                                                <input type="search" class="form-control mt-2" id="search" name="search" placeholder="Search">
                                                <button type="submit" class="btn btn-success btn-sm w-100 mt-2" style="max-width: 100px;">
                                                    <i class="mdi mdi-account-search" style="font-size: 1.5rem;"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{url('/print-employee')}}" target="_blank" class="d-flex h-100">
                                                <button type="button" class="btn btn-primary btn-sm w-100 mt-2">
                                                    <i class="mdi mdi-printer" style="font-size: 1.5rem;"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div><hr class="m-0">
                                    <div class="table-responsive">                                        
                                        <table class="table table-hover mb-0" >
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Img</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Date of Birth</th>
                                                    <th>Address</th>
                                                    <th>Role</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>                                            
                                            <tbody class="allData">
                                                @if($user)
                                                @foreach($user as $key => $val)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td><img src="{{ asset('img/employee/' . $val->photo) }}" alt="Image not found" width="100"></td>
                                                    <td>{{$val->name}}</td>
                                                    <td>{{$val->email}}</td>
                                                    <td>{{$val->phone}}</td>
                                                    <td>{{$val->address}}</td>
                                                    <td>{{$val->dob}}</td>
                                                    <td>
                                                        @php
                                                            $roles = [1 => 'Admin', 2 => 'Manager', 3 => 'Waiter', 4 => 'Shafe', 5 => 'Other'];
                                                        @endphp
                                                        {{ $roles[$val->role] ?? 'Unknown' }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if($val->status == 1)
                                                            <a href="{{url('/update-employee-status/'.$val->id)}}"><button class="btn btn-success btn-sm">Active</button></a>
                                                        @else
                                                            <a href="{{url('/update-employee-status/'.$val->id)}}"><button class="btn btn-danger btn-sm">Deactive</button></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="9" class="text-center text-danger">No employees found.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                            <tbody id="content" class="searchData"></tbody>
                                        </table>                                        
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $user->links() }}
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
    <script type="text/javascript">
            $(document).ready(function () {
            $('#search').on('keyup', function () {
                let value = $(this).val();

                if (value.trim() !== "") {
                    $('.allData').hide();
                    $('.searchData').show();
                } else {
                    $('.allData').show();
                    $('.searchData').hide();
                }

                $.ajax({
                    type: 'GET',
                    url: '{{ URL::to("live-search-employee") }}',
                    data: { 'search': value },
                    success: function (data) {
                        console.log(data);
                        $('#content').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Search AJAX error:', error);
                    }
                });
            });

            $('form').on('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>
    </body>
    </html>