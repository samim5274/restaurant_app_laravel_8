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
                        <li class="breadcrumb-item">edit</li>
                        <li class="breadcrumb-item"><a href="{{url('/dashboard/setting')}}">Food</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Setting</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ url('/food/update/'.$val->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="table-no" class="col-sm-3 col-form-label">Food Name</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="table-no" name="txtFoodName" value="{{$val->name}}" required placeholder="Food name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Price" class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" id="Price" name="txtPrice" value="{{$val->price}}" required placeholder="Price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="txtCategory" id="category" required class="form-control">
                                                <option disabled {{ empty($val->category) ? 'selected' : '' }}>-- Select Category --</option>
                                                <option value="starter" {{ $val->category == 'starter' ? 'selected' : '' }}>Starter</option>
                                                <option value="main" {{ $val->category == 'main' ? 'selected' : '' }}>Main Course</option>
                                                <option value="side" {{ $val->category == 'side' ? 'selected' : '' }}>Side Dish</option>
                                                <option value="dessert" {{ $val->category == 'dessert' ? 'selected' : '' }}>Dessert</option>
                                                <option value="drink" {{ $val->category == 'drink' ? 'selected' : '' }}>Beverage</option>
                                                <option value="salad" {{ $val->category == 'salad' ? 'selected' : '' }}>Salad</option>
                                                <option value="snack" {{ $val->category == 'snack' ? 'selected' : '' }}>Snack</option>
                                                <option value="combo" {{ $val->category == 'combo' ? 'selected' : '' }}>Combo Meal</option>
                                                <option value="special" {{ $val->category == 'special' ? 'selected' : '' }}>Special Item</option>
                                                <option value="breakfast" {{ $val->category == 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Stock" class="col-sm-3 col-form-label">Stock</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" id="Stock" name="txtStock" value="{{$val->stock}}" required placeholder="Stock">
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label d-flex align-items-center mb-0">Status</label>
                                        <div class="col-sm-9 d-flex align-items-center">
                                            <div class="form-check mr-4 d-flex align-items-center">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="txtStatus"
                                                    id="statusActive{{ $val->id }}"
                                                    value="1"
                                                    {{ $val->status == 1 ? 'checked' : '' }}
                                                    required
                                                >
                                                <label class="form-check-label mb-0 ml-2" for="statusActive{{ $val->id }}">
                                                    Active
                                                </label>
                                            </div>

                                            <div class="form-check d-flex align-items-center">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="txtStatus"
                                                    id="statusDeactive{{ $val->id }}"
                                                    value="2"
                                                    {{ $val->status == 2 ? 'checked' : '' }}
                                                    required
                                                >
                                                <label class="form-check-label mb-0 ml-2" for="statusDeactive{{ $val->id }}">
                                                    De-active
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    
                                    <div class="form-group row">
                                        <label for="Discription" class="col-sm-3 col-form-label">Discription</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" name="remark" id="Discription" rows="4">{{$val->remark}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Ingredients" class="col-sm-3 col-form-label">Ingredients</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Ingredients" name="txtIngredients" value="{{$val->ingredients}}" required placeholder="Ingredients">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imageInput" class="col-sm-3 col-form-label">
                                            Food Image 
                                        </label>
                                        @if($val->image)
                                            <img src="{{ asset('img/food/'.$val->image) }}" class="img-thumbnail mb-2" width="100">
                                        @endif
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



                                    <button type="submit" class="btn btn-success btn-rounded mr-2 w-100">Update</button>
                                
                                </form>

                                    <hr>

                                <form action="{{ url('/food/delete/'.$val->id) }}" method="GET">
                                    <button type="submit" class="btn btn-danger mr-2 w-100" onclick="return confirm('Are you sure you want to DELETE this food?')">Delete</button>
                                </form>



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