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
                        <h2 class="page-title"> Category Setting </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/daily-expenses')}}">Daily Expenses</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/expenses-option')}}">Setting</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="page-header">
                        <h2 class="page-title"> Sub-Category Details </h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body p-2 p-md-4">
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <form action="{{url('/add-sub-category')}}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="category" class="col-sm-3 col-form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <select name="cbxCategory" id="category" required class="form-control">
                                                            <option disabled selected>-- Select Category --</option>
                                                            @if($category)
                                                            @foreach($category as $key => $val)
                                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="SubCategory" class="col-sm-3 col-form-label">Sub-Category</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="SubCategory" name="txtSubCategory" required placeholder="Sub-Category">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-rounded mr-2 w-100">Submit</button>
                                            </form>
                                        </div> 
                                        <div class="col-md-6">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Category</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($Subcategory)
                                                    @foreach($Subcategory as $key => $val)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $val->category->name }}</td>
                                                        <td>{{$val->name}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div> 
                                        <div class="d-flex justify-content-end mt-3">
                                            <div class="d-flex justify-content-end mt-3">
                                                 {{ $Subcategory->links('pagination::tailwind') }}
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body p-2 p-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($category)
                                                    @foreach($category as $key => $val)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$val->name}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{url('/add-category')}}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="Category" class="col-sm-3 col-form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="Category" name="txtCategory" required placeholder="Category">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-rounded mr-2 w-100">Submit</button>
                                            </form>
                                        </div>  
                                        <div class="d-flex justify-content-end mt-3">
                                            <div class="d-flex justify-content-end mt-3">
                                                 {{ $category->links('pagination::tailwind') }}
                                            </div>
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
        

    </body>
    </html>