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
        <style>
            .loader {
                width: 30px;
                aspect-ratio: 1;
                display: grid;
                border: 4px solid #0000;
                border-radius: 50%;
                border-right-color: #25b09b;
                animation: l15 1s infinite linear;
            }
            .loader::before,
            .loader::after {
                content: "";
                grid-area: 1/1;
                margin: 2px;
                border: inherit;
                border-radius: 50%;
                animation: l15 2s infinite;
            }
            .loader::after {
                margin: 8px;
                animation-duration: 3s;
            }
            @keyframes l15{
                100%{transform: rotate(1turn)}
            }
        </style>
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
                                    <div class="d-flex justify-content-end mb-3">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                                            <i class="mdi mdi-plus" style="font-size:1rem"></i>
                                        </button>
                                        <a href="{{url('/print-expenses')}}" target="_blank"><button type="button" class="btn btn-primary btn-sm ml-1"><i class="mdi mdi-printer" style="font-size:1rem"></i></button></a>
                                    </div>
                                    <div class="table-responsive">                                        
                                        <table class="table table-hover mb-0" >
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
                                    <div class="d-flex justify-content-end mt-3">
                                        {{ $expenses->links('pagination::tailwind') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{url('/add-daily-expenses')}}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daily Expenses</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">                                        
                                        <div class="form-group row">
                                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-9">
                                                <select name="cbxCategory" id="category" required class="form-control">
                                                    <option disabled selected>-- Select Category --</option>
                                                    @if($category)
                                                        @foreach($category as $key => $val)
                                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="loader" id="loader" style="display:none;">Loading...</div>

                                        <div class="form-group row">
                                            <label for="subcategory" class="col-sm-3 col-form-label">Sub-Category</label>
                                            <div class="col-sm-9">
                                                <select name="cbxsubcategory" id="subcategory" required class="form-control">
                                                    <option disabled selected>-- Select Sub-Category --</option>                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Amount" class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="Amount" name="txtAmount" required placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Remark" class="col-sm-3 col-form-label">Remark</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="Remark" name="txtRemark" value="N/A" required placeholder="Remark">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var loader = $('#loader');  // Correct selector with $
                var category = $('#category');

                loader.hide();

                category.change(function(){
                    var categoryId = $(this).val();
                    console.log("Selected Category ID:", categoryId);

                    if(!categoryId) {
                        $("#subcategory").html("<option disabled selected>-- Select Sub-Category --</option>");
                    } else {
                        loader.show();

                        $.ajax({
                            url: "/getSubCategory/" + categoryId,
                            type: "GET",
                            success: function(data){
                                var subCategory = data.subCategory;
                                var html = "<option disabled selected>-- Select Sub Category --</option>";

                                for(let i = 0; i < subCategory.length; i++){
                                    html += `<option value="${subCategory[i].id}">${subCategory[i].name}</option>`;
                                }

                                $("#subcategory").html(html);
                                loader.hide();
                            },
                            error: function(){
                                alert('Failed to fetch subcategories.');
                                loader.hide();
                            }
                        });
                    }
                });
            });
        </script>

    </body>
    </html>