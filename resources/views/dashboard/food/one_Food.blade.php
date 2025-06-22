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
                    @if($food)
                    <div class="page-header">
                        <h3 class="page-title">  {{$food->name}}  </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/menu')}}">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/dashboard/setting')}}">Setting</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <img src="{{ asset('img/food/' . $food->image) }}" alt="Food image not found!" class="card-img-top img-magnifier-container" id="myimage">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card mt-2">
                                <div class="card-body">
                                    <h1 class="display-1" style="color: #00346a;">  {{$food->name}}  </h1>
                                    <div class="card-body">
                                        <h1 class="display-3 text-danger">  ৳{{$food->price}}/- <span class="text-small">(BDT)</span> </h1>
                                    </div>
                                    <h4>Ingrediendts: {{$food->ingredients}}</h4>
                                    <h6>Stock: {{$food->stock}}</h6>
                                    <h6>Discription: {{$food->remark}}</h6><hr>
                                    <p class="lead text-small">Note: After order wait minimum 15 min. Thanks</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{ url('/add-to-cart/'.$food->id) }}" class="mt-2 btn btn-outline-success w-100">
                                                <i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i>
                                                <span style="font-size: 1rem;" class="mb-0">Add Cart</span>
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{ url('/cart-view') }}" class="mt-2 btn btn-outline-warning w-100">
                                                <i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i>
                                                <span style="font-size: 1rem;" class="mb-0">Go to Cart</span>
                                            </a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        @if($category)
                        @foreach($category as $val)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card h-100 shadow-sm">
                                <a href="{{url('/specific-food-view/'.$val->id)}}"><img src="{{ asset('img/food/' . $val->image) }}" class="card-img-top" alt="Image Not Found"></a>
                                <div class="card-body d-flex flex-column">
                                    <a href="{{url('/specific-food-view/'.$val->id)}}"><h1 class="card-title">{{$val->name}} </a> <span class="text-small">৳{{$val->price}}/- (BDT)</span></h1>
                                    <p class="card-text">{{$val->ingredients}}</p>
                                    <a href="{{ url('/add-to-cart/'.$val->id) }}" class="mt-auto btn btn-outline-success w-100"><i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i><span style="font-size: 1rem;" class="mb-0">Add Cart</span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    @endif
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
        <!-- image magnify -->
        <script> magnify("myimage", 3); </script>

    </body>
    </html>