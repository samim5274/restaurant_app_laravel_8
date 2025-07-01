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
        <!-- Layout styles -->
        <link rel="stylesheet" href="/dash/assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="/dash/assets/images/favicon.png" />
    </head>
    <body>


    <div class="container-scroller">
        @include('dashboard.layouts.menu_top')
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
                                    <table class="table table-hover table-bordered align-middle">
                                        <thead class="table-dark text-center">
                                            <tr>
                                                <th style="width: 50px;">SL</th>
                                                <th style="width: 120px;">Image</th>
                                                <th>Food Name</th>
                                                <th style="width: 100px;">Price</th>
                                                <th style="width: 100px;">Stock</th>
                                                <th style="width: 100px;">Status</th>
                                                <th style="width: 100px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data)
                                            @php
                                                $statusText = [1 => 'Active', 2 => 'De-active'];
                                                $statusClass = [1 => 'bg-success', 2 => 'bg-danger'];
                                            @endphp
                                            @foreach($data as $key => $val)
                                            <tr>
                                                <td class="text-center">{{ ++$key }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('/specific-food-view/' . $val->id) }}">
                                                        <img src="{{ asset('img/food/' . $val->image) }}" alt="Image" width="80" class="img-thumbnail">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('/specific-food-view/' . $val->id) }}" class="text-decoration-none">
                                                        {{ $val->name }}
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ $val->price }}</td>
                                                <td class="text-center">{{ $val->stock }}</td>
                                                <td class="text-center">
                                                    <span class="badge {{ $statusClass[$val->status] ?? 'bg-secondary' }} me-1">
                                                        {{ $statusText[$val->status] ?? 'Unknown' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-outline-primary p-1 px-2" data-toggle="modal" data-target="#exampleModal{{ $val->id }}">
                                                        <i class="mdi mdi-library-plus" style="font-size: 14px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <!-- Pagination links -->
                                    <div class="d-flex justify-content-end mt-3">
                                        <div class="d-flex justify-content-end mt-3">
                                            {{ $data->links('pagination::tailwind') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($data as $key => $val)
                            <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{url('/food-stock-in/'.$val->id)}}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $val->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Stock: {{ $val->stock }}pcs</p>
                                                <div class="form-group row">
                                                    <label for="Price" class="col-sm-3 col-form-label">Stock</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="Price" name="txtStock" required placeholder="Stock">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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