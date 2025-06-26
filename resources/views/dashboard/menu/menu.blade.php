<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restaurant Manager</title>

    <link rel="stylesheet" href="/dash/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/dash/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/dash/assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="/dash/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/dash/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="/dash/assets/css/style.css">

    <link rel="shortcut icon" href="/dash/assets/images/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                    <h3 class="page-title"> Food List </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                             @if($count)<li class="breadcrumb-item"><a href="{{url('/cart-view')}}">Cart  <span class="badge badge-success">[{{ $count }}]</span> </a></li>@endif
                            <li class="breadcrumb-item"><a href="{{url('/menu')}}">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/dashboard/setting')}}">Setting</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-0">Search Food</h4>
                                    <div class="container">
                                        <div class="py-4">
                                            <form action="/add-to-cart-2" method="GET">
                                                <input type="search" name="search" id="search" class="form-control py-4" placeholder="Search by food name or category or food iD">
                                            </form>
                                        </div>
                                    </div>
                                    @if($count)<a href="{{url('/cart-view')}}">
                                        <button class="btn btn-inverse-primary"><i class="mdi mdi-cart fa-lg" aria-hidden="true"></i> Cart <span class="badge badge-danger">{{$count}}</span></button>
                                    </a>
                                    @endif
                                </div>
                            </div> 
                        </div>
                    </div>
                           
                    @if($food)
                    @foreach($food as $val)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4 allData">
                        <div class="card h-100 shadow-sm">
                            <a href="{{url('/specific-food-view/'.$val->id)}}"><img src="{{ asset('img/food/' . $val->image) }}" class="card-img-top" alt="image not found"></a>
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title"><a href="{{url('/specific-food-view/'.$val->id)}}">{{strlen($val->name) > 22 ? substr($val->name, 0, 22).'...' : $val->name}} - ৳{{ $val->price }}/-</a></h4>
                                <!-- <span>Category: {{$val->category }}</span> -->
                                <p>Ingredients: {{ strlen($val->ingredients) > 40 ? substr($val->ingredients, 0, 40) . '...' : $val->ingredients }}</p>
                                <a href="{{ url('/add-to-cart/'.$val->id) }}" class="mt-auto btn btn-outline-success w-100">
                                    <i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i>
                                    <span style="font-size: 1rem;" class="mb-0">Add Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="row searchData" id="content"></div>
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
    
    <script type="text/javascript">
        //https://www.youtube.com/watch?v=BL0v0pduwPo live search
        $('#search').on('keyup', function() {
            $value = $(this).val(); 
            if($value) {
                $('.allData').hide();
                $('.searchData').show();
            } else {
                $('.allData').show();
                $('.searchData').hide();
            }
            $.ajax({
                type:'get',
                url: '{{URL::to("live-search-food-menu")}}',
                data:{'search':$value},

                success:function(data) {
                    console.log(data);
                    $('#content').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('Search AJAX error:', error);
                }
            });
        });
    </script>
</body>
</html>