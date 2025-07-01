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
                        <div id="toggleDiv" class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-0">Add New Food Item</h4>
                                        <button class="btn btn-inverse-secondary" onclick="toggleDiv()">
                                            X
                                        </button>
                                    </div>
                                    <form action="/create-new-food" method="POST" enctype="multipart/form-data" class="forms-sample">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="table-no" class="col-sm-3 col-form-label">Food Name</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" id="table-no" name="txtFoodName" required placeholder="Food name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Price" class="col-sm-3 col-form-label">Price</label>
                                            <div class="col-sm-9">
                                            <input type="number" class="form-control" id="Price" name="txtPrice" required placeholder="Price">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-9">
                                                <select name="txtCategory" id="category" required class="form-control">
                                                    <option disabled selected>-- Select Category --</option>
                                                    <option value="starter">Starter</option>
                                                    <option value="main">Main Course</option>
                                                    <option value="side">Side Dish</option>
                                                    <option value="dessert">Dessert</option>
                                                    <option value="drink">Beverage</option>
                                                    <option value="salad">Salad</option>
                                                    <option value="snack">Snack</option>
                                                    <option value="combo">Combo Meal</option>
                                                    <option value="special">Special Item</option>
                                                    <option value="breakfast">Breakfast</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Stock" class="col-sm-3 col-form-label">Stock</label>
                                            <div class="col-sm-9">
                                            <input type="number" class="form-control" id="Stock" name="txtStock" required placeholder="Stock">
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="txtStatus" checked required id="statusActive" value="1">
                                                    <label class="form-check-label" for="statusActive">
                                                        Active
                                                    </label>
                                                    <input class="form-check-input" type="radio" name="txtStatus" required id="statusDeactive" value="2">
                                                    <label class="form-check-label" for="statusDeactive">
                                                        De-active
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label for="Discription" class="col-sm-3 col-form-label">Discription</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="remark" id="Discription" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="Ingredients" class="col-sm-3 col-form-label">Ingredients</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" id="Ingredients" name="txtIngredients" required placeholder="Ingredients">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="imageInput" class="col-sm-3 col-form-label">
                                                Food Image <span class="small">(Max size: 5MB)</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <div id="uploadArea" class="upload-area">
                                                    <p class="mb-0 text-muted">Click or drag & drop an image here</p>
                                                    <img id="previewImage" class="img-fluid mt-2" alt="Image Preview">
                                                </div>
                                                <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">
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
                                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-0">Food Details</h4>

                                        <button class="btn btn-outline-secondary btn-sm mt-2 mt-md-0" onclick="toggleDiv()">
                                            <i class="mdi mdi-library-plus me-1"></i> Add New
                                        </button>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered align-middle">
                                            <thead class="table-dark text-center">
                                                <tr>
                                                    <th style="width: 50px;">SL</th>
                                                    <th style="width: 100px;">Image</th>
                                                    <th>Food Name</th>
                                                    <th style="width: 100px;">Price</th>
                                                    <th style="width: 120px;">Status</th>
                                                    <th style="width: 60px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($food)
                                                @php
                                                    $statusText = [1 => 'Active', 2 => 'De-active'];
                                                    $statusClass = [1 => 'bg-success', 2 => 'bg-danger'];
                                                    $sl = ($food->currentPage() - 1) * $food->perPage() + 1;
                                                @endphp
                                                @foreach($food as $val)
                                                <tr>
                                                    <td class="text-center">{{ $sl++ }}</td>

                                                    <td class="text-center">
                                                        <img src="{{ asset('img/food/' . $val->image) }}" alt="Image not found" class="img-thumbnail" width="80">
                                                    </td>

                                                    <td>{{ $val->name }}</td>

                                                    <td class="text-center">{{ $val->price }}</td>

                                                    <td class="text-center">
                                                        <span class="badge {{ $statusClass[$val->status] ?? 'bg-secondary' }}">
                                                            {{ $statusText[$val->status] ?? 'Unknown' }}
                                                        </span>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="{{ url('/food-edit-view/' . $val->id) }}" class="btn btn-sm btn-outline-primary p-1 px-2" title="Edit">
                                                            <i class="mdi mdi-pencil" style="font-size: 14px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Pagination links -->
                                    <div class="d-flex justify-content-end mt-3">
                                        <div class="d-flex justify-content-end mt-3">
                                            {{ $food->links() }}
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