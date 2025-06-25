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
                            <li class="breadcrumb-item"><a href="{{url('/order-list')}}">Order list</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/menu')}}">Menu</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body p-2 p-md-4">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped table-hover align-middle text-center border">
                                            <thead class="bg-success text-white">
                                                <tr>
                                                    <th scope="col">#SL</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">REG</th>
                                                    <th scope="col">Table</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col" style="width: 80px;">Pay</th>
                                                    <th scope="col" style="width: 50px;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody class="searchData" id="content"></tbody>
                                            <tbody class="allData">
                                                @if($order)
                                                    @foreach($order as $key => $val)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $val->date }}</td>
                                                            <td>
                                                                <a href="{{ url('/edit/order/' . $val->reg) }}" class="text-primary font-weight-bold">
                                                                    ORD-{{ $val->reg }}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/edit/order/' . $val->reg) }}">
                                                                    {{ $val->table->tName ?? 'N/A' }}
                                                                </a>
                                                            </td>
                                                            <td>৳{{ number_format($val->total, 2) }}/-</td>
                                                            <td>
                                                                <button class="btn btn-outline-success btn-sm py-1 px-2" 
                                                                        data-toggle="modal" 
                                                                        data-target="#exampleModal{{ $val->id }}" 
                                                                        style="width: auto; font-size: 0.8rem;">
                                                                    <i class="mdi mdi-cash" style="font-size: 1.5rem;"></i>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <a href="{{url('/delere/order/'.$val->reg)}}" onclick="return confirm('Are you sure you want to DELETE this bill?')">
                                                                    <i class="mdi mdi-delete-forever text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-muted">No order data available.</td>
                                                    </tr>
                                                @endif

                                                <tr class="bg-light font-weight-bold">
                                                    <td colspan="3"></td>
                                                    <td>Total Order:</td>
                                                    <td>৳{{ number_format($totalOrder ?? 0, 2) }}/-</td>
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $order->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                @if($order)
                @foreach($order as $key => $val)
                <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{url('/payment/'.$val->reg)}}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reg: ORD-{{$val->reg}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="num1{{$val->id}}" class="col-sm-3 col-form-label">Total Amount:</label>
                                        <div class="col-sm-9">
                                            <!-- Hidden total input -->
                                            <input type="text" class="form-control" id="num1{{$val->id}}" name="txtTotal" hidden readonly value="{{ $val->total }}">
                                            <!-- Display total as styled text -->
                                            <h1 class="display-1 text-danger">${{ $val->total }}/-</h1>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="num3{{$val->id}}" class="col-sm-3 col-form-label">Discount:</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num3{{$val->id}}" name="txtDiscount" value="0" placeholder="Discount" onkeyup="calculateAmount({{$val->id}})" onchange="calculateAmount({{$val->id}})">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="num2{{$val->id}}" class="col-sm-3 col-form-label">Pay:</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="num2{{$val->id}}" name="txtPay" placeholder="Pay" onkeyup="calculateAmount({{$val->id}})" onchange="calculateAmount({{$val->id}})">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="num2" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <p id="result{{$val->id}}" class="display-2 text-danger">Amount: 00/-</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{url('/delere/order/'.$val->reg)}}"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to DELETE this bill?')">Delete</button></a>
                                    <button type="submit" id="btnSave{{$val->id}}" class="btn btn-success mr-2" disabled onclick="return confirm('Are you sure you want to Payment this bill?')">Payment</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- https://codepen.io/creativesunil/pen/VweMmQo payment successfull message -->
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
    <script src="/dash/assets/js/orderPayment.js"></script>
    @if(session('success'))
        <script>
            window.onload = function () {
                const reg = "{{ session('success') }}";
                const url = `/download-invoice/${reg}`;
                window.open(url, '_blank');
            };
        </script>
    @endif

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
                url: '{{URL::to("live-search-order")}}',
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