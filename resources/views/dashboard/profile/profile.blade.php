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
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.layouts.menu_main')
            <div class="main-panel">
                @include('dashboard.message.message')
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Profile : {{$user->name}} </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/profile/'.$user->id)}}">Profile</a></li>
                                <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#exampleModal">Change password</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/dashboard/setting')}}">Setting</a></li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{url('/change-password/'.$user->id)}}" method="POST" onsubmit="return validatePassword()">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            @csrf                                    
                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                <input type="password" name="current_password" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                <input type="password" name="new_password" id="new_password" class="form-control" onkeyup="checkPassword()" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="confirm_password">Retype Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" onkeyup="checkPassword()" required>
                                            </div>

                                            <div id="password_error" style="color:red; font-size:14px; margin-top:5px;"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Left side (Profile Info) -->
                                        <div class="col-md-4 text-center mb-4 mb-md-0">
                                            <img src="{{ asset('/img/employee/' . $user->photo) }}" 
                                                class="rounded-circle mb-3 shadow" 
                                                width="150" height="150" 
                                                alt="Profile Image"
                                                style="border: 3px solid rgb(61, 255, 93);">
                                                <br><br>

                                            <h5 class="mb-1">{{ $user->name }}</h5>
                                            <p class="mb-1 text-muted">{{ $user->email }}</p>
                                            <p class="mb-1 text-muted">+880 {{ $user->phone }}</p>
                                            <p class="mb-1">
                                                <strong>Role:</strong>
                                                @php
                                                    $roles = [1 => 'Admin', 2 => 'Manager', 3 => 'Waiter', 4 => 'Shafe', 5 => 'Other'];
                                                @endphp
                                                {{ $roles[$user->role] ?? 'Unknown' }}
                                            </p>
                                            <p class="mb-1">
                                                <strong>Status:</strong>
                                                @php
                                                    $statuses = [
                                                        0 => 'Inactive',
                                                        1 => 'Active',
                                                    ];
                                                @endphp
                                                {{ $statuses[$user->status] ?? 'Unknown' }}
                                            </p>

                                        </div>

                                        <!-- Right side (Form) -->
                                        <div class="col-md-8">
                                            <form action="{{url('/edit-profile/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" maxlength="10" pattern="\d{10}" value="{{ $user->phone }}" placeholder="Enter 10-digit phone number without zero '0'">
                                                </div>

                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="photo">Change Profile Image. Max: 2MB</label>
                                                    <input type="file" name="photo" class="form-control-file" accept="image/*">
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Old Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Enter your password for updated your profile.">
                                                </div>

                                                <button type="submit" class="btn btn-success btn-sm w-100 d-flex align-items-center justify-content-center">
                                                    <i class="mdi mdi-pencil-box-outline m-0" style="font-size: 1.5rem;"></i> 
                                                    <span> <strong>Update</strong></span>
                                                </button>

                                            </form>
                                        </div>
                                    </div> <!-- End inner row -->
                                </div>
                            </div>
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

        <script>
            function checkPassword() {
                const password = document.getElementById('new_password').value;
                const confirmPassword = document.getElementById('confirm_password').value;
                const errorDiv = document.getElementById('password_error');

                const minLength = 7;
                const hasUpper = /[A-Z]/.test(password);
                const hasLower = /[a-z]/.test(password);
                const hasNumber = /[0-9]/.test(password);
                const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

                if (password.length < minLength) {
                    errorDiv.innerText = "At least 7 characters.";
                } else if (!hasUpper) {
                    errorDiv.innerText = "At least one uppercase letter.";
                } else if (!hasLower) {
                    errorDiv.innerText = "At least one lowercase letter.";
                } else if (!hasNumber) {
                    errorDiv.innerText = "At least one number.";
                } else if (!hasSpecial) {
                    errorDiv.innerText = "At least one special character.";
                } else if (password !== confirmPassword) {
                    errorDiv.innerText = "Passwords do not match.";
                } else {
                    errorDiv.innerText = "";
                }
            }

            function validatePassword() {
                checkPassword();
                return document.getElementById('password_error').innerText === "";
            }
        </script>



    </body>
    </html>