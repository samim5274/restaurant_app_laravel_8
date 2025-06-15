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
                    <h3 class="page-title"> Table Details </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/table')}}">Table</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/dashboard/setting">Setting</a></li>
                        </ol>
                    </nav>
                </div>






                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card" id="toggleDiv">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-0">Add New Table</h4>
                                    <button class="btn btn-inverse-secondary" onclick="toggleDiv()">
                                        X
                                    </button>
                                </div>
                                <form action="{{url('/create-new-table')}}" method="POST" class="forms-sample">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="table-no" class="col-sm-3 col-form-label">Table No</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="table-no" name="txtTableNo" placeholder="Table No: N3C">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="txtStatus" id="statusEmpty" value="1">
                                                <label class="form-check-label" for="statusEmpty">
                                                    Empty
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="txtStatus" id="statusReserved" value="2">
                                                <label class="form-check-label" for="statusReserved">
                                                    Reserved
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="txtStatus" id="statusOrdered" value="3">
                                                <label class="form-check-label" for="statusOrdered">
                                                    Ordered
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="remark" class="col-sm-3 col-form-label">Remark</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="remark" name="txtRemark" value="N/A" placeholder="N/A">
                                        </div>
                                    </div>

                                <button type="submit" class="btn btn-success btn-rounded mr-2 w-100">Submit</button>
                                
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-0">Table Details</h4>
                                    <button class="btn btn-inverse-secondary" onclick="toggleDiv()">
                                        <i class="mdi mdi-library-plus"></i> Add New
                                    </button>
                                </div>                      
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Table Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data && count($data) > 0)
                                        @php
                                            $statusText = [1 => 'Empty', 2 => 'Reserved', 3 => 'Ordered'];
                                            $statusClass = [1 => 'text-success', 2 => 'text-danger', 3 => 'text-warning'];
                                            $sl = ($data->currentPage() - 1) * $data->perPage() + 1;
                                        @endphp

                                        @foreach($data as $val)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $val->tName }}</td>
                                                <td class="{{ $statusClass[$val->status] ?? 'text-secondary' }}">
                                                    {{ $statusText[$val->status] ?? 'Unknown' }}
                                                </td>
                                                <td class="text-center"><a href="#" data-toggle="modal" data-target="#exampleModal{{ $val->id }}"><i class="mdi mdi-pencil-box-outline fa-lg" aria-hidden="true"></i></a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                </table>
                                <!-- Pagination links -->
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $data->links() }}
                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- Modal -->
                    @foreach($data as $val)
                    <div class="modal fade" id="exampleModal{{ $val->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-4">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Table Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('/table-detail-update/'.$val->id)}}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="table-no" class="col-sm-3 col-form-label">Table No</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" id="table-no" value="{{ $val->tName }}" name="txtTableNo" placeholder="Table No: N3C">
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="txtStatus" id="editEmpty{{ $val->id }}" value="1"
                                                        {{ isset($val) && $val->status == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="editEmpty{{ $val->id }}">Empty</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="txtStatus" id="editReserved{{ $val->id }}" value="2"
                                                    {{isset($val) && $val->status == 2 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="editReserved{{ $val->id }}">Reserved</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="txtStatus" id="editOrdered{{ $val->id }}" value="3"
                                                    {{isset($val) && $val->status == 3 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="editOrdered{{ $val->id }}">Ordered</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="remark" class="col-sm-3 col-form-label">Remark</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" id="remark" name="txtRemark" value="{{ $val->remark }}" placeholder="N/A">
                                            </div>
                                        </div>

                                    <button type="submit" class="btn btn-success btn-rounded mr-2 w-100" onclick="return confirm('Are you sure you want to UPDATE this table?')">Update</button>
                                    
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{url('/table-detail-delete/'.$val->id)}}" method="GET">
                                        <button type="submit" class="btn btn-danger mr-2 w-100" onclick="return confirm('Are you sure you want to DELETE this table?')">Delete</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>


















            

     
            <!-- partial -->
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
        <script src="/dash/assets/js/table.js"></script>
        

    </body>
    </html>