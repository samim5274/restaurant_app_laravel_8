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
                    <h3 class="page-title"> Total Order list</h3>
                    <div class="container">
                        <div class="py-4">
                            <input type="search" name="search" id="search" class="form-control py-4" placeholder="Search by order">
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/show-order-item')}}">Order list</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Serve</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover align-middle text-center border">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">REG</th>
                                    <th scope="col">Table</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 80px;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="searchData" id="content"></tbody>
                            <tbody class="allData">
                                @if($order)
                                    @foreach($order as $key => $val)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $val->date }}</td>
                                            <td><a href="{{ url('/list/order/' . $val->reg) }}" class="text-primary font-weight-bold">ORD-{{ $val->reg }}</a></td>
                                            <td><a href="{{ url('/list/order/' . $val->reg) }}">{{ $val->table->tName ?? 'N/A' }}</a></td>                                        
                                            <td>
                                                @php
                                                    $statuses = [
                                                        1 => 'Pending',
                                                        2 => 'Preparing',
                                                        3 => 'Ready',
                                                        4 => 'Served'
                                                    ];
                                                    $colors = [
                                                        1 => 'danger',
                                                        2 => 'warning',
                                                        3 => 'info text-white',
                                                        4 => 'success'
                                                    ];
                                                @endphp    
                                                <span class="badge bg-{{ $colors[$val->kitchen] ?? 'secondary' }}">
                                                    {{ $statuses[$val->kitchen] ?? 'Unknown' }}
                                                </span>
                                            </td>
                                            <td><button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#exampleModal{{ $val->id }}">Status</button></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-muted">No order data available.</td>
                                    </tr>
                                @endif

                                <tr class="bg-light font-weight-bold">
                                    <td colspan="6">Note: All Order is urgent.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>




                <!-- Modal -->
                @if($order)
                @foreach($order as $key => $val)
                <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{url('/update-kitchen-status/'.$val->reg)}}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reg: ORD-{{$val->reg}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="mb-4 text-primary">Order Status: <span class="text-dark">ORD-{{ $val->reg }}</span></h4>

                                    <div class="form-group row align-items-center mb-3">
                                        <label for="statusSelect{{ $val->id }}" class="col-sm-3 col-form-label">Status:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="statusSelect{{ $val->id }}" name="cbxStatus">
                                                <option disabled {{ empty($order->tableId) ? 'selected' : '' }}>-- Select Status --</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Preparing</option>
                                                <option value="3">Ready</option>
                                                <option value="4">Served</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="btnSave{{$val->id}}" class="btn btn-success mr-2" onclick="return confirm('Are you sure you want to change this order status?')">Updated</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif





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
    <script type="text/javascript">
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
                type: 'get',
                url: '{{URL::to("live-search-kitchen")}}',
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