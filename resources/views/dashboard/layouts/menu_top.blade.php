

      <!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}" style="width: 100%; height: 100%; overflow: hidden;">
            <img src="/dash/assets/images/logo-mini.png" alt="logo" class="brand-logo-img"
                style="height: 35px; width: auto; object-fit: contain;" />
            <span class="brand-text ml-2">MERCUVIAX</span>
        </a> -->

        <a class="navbar-brand brand-logo-mini d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}" style="width: 100%;">
            <img src="/dash/assets/images/logo-mini.png" alt="logo"
                style="height: 30px; width: auto; object-fit: contain;" />
        </a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="#">
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify text-muted"></i>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0" placeholder="Search products...">
                </div>
            </form>
        </div>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-md-block">
                <a class="nav-link count-indicator" href="{{url('/cart-view')}}">
                    <i class="mdi mdi-cart-outline"></i>
                    @if($count)
                        <span class="count-symbol bg-warning"></span>
                        <span class="nav-profile-text ml-1 text-dark">{{$count}} Cart</span>
                    @endif
                </a>
            </li>

            <li class="nav-item dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown"> Reports </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                    <a class="dropdown-item" href="#"><i class="mdi mdi-file-pdf mr-2 text-danger"></i>Daily Report</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-file-excel mr-2 text-success"></i>Weekly Sales</a>
                </div>
            </li>

            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="nav-profile-img">
                        <img src="{{ asset('img/employee/' . $user->photo) }}" alt="image">
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black font-weight-bold">{{$user->name}}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0" aria-labelledby="profileDropdown">
                    <div class="p-3 text-center bg-primary text-white rounded-top">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('img/employee/' . $user->photo) }}" alt="">
                        <p class="mt-2 mb-0">{{$user->name}}</p>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item py-2 d-flex align-items-center justify-content-between font-size-sm" href="{{url('/profile/'.$user->id)}}">
                            <span>Profile</span>
                            <i class="mdi mdi-account-outline text-primary"></i>
                        </a>
                        <a class="dropdown-item py-2 d-flex align-items-center justify-content-between font-size-sm" href="{{url('/dashboard/setting')}}">
                            <span>Settings</span>
                            <i class="mdi mdi-settings text-primary"></i>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item py-2 d-flex align-items-center justify-content-between font-size-sm text-danger" href="{{url('/login')}}">
                            <span>Log Out</span>
                            <i class="mdi mdi-logout ml-1"></i>
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count-symbol bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0 bg-primary text-white">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success text-white"><i class="mdi mdi-calendar"></i></div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                            <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                        </div>
                    </a>
                </div>
            </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>


