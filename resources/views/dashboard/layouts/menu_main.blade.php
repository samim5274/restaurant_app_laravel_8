@php
    $currentUrl = request()->path();
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('dashboard')}}">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="{{ url('/menu') }}">
        <span class="icon-bg"><i class="mdi mdi-menu menu-icon"></i></span>
        <span class="menu-title">Menu</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('cart-view') ? 'active' : '' }}" href="{{url('/cart-view')}}">
        <span class="icon-bg"><i class="mdi mdi-cart menu-icon"></i></span>
        <span class="menu-title">Cart</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('order-list') ? 'active' : '' }}" href="{{ url('/order-list') }}">
        <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
        <span class="menu-title">Order List</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('due-collection') ? 'active' : '' }}" href="{{ url('/due-collection') }}">
        <span class="icon-bg"><i class=" mdi mdi-view-list menu-icon"></i></span>
        <span class="menu-title">Due Collection</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title">Booking list</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
        <span class="menu-title">Populer Food</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->is('empty') ? 'active' : '' }}" href="{{ url('/empty') }}">
        <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
        <span class="menu-title">Reserved</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
        <span class="menu-title">Food Setting</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link {{ request()->is('table') ? 'active' : '' }}" href="{{url('/table')}}">Table</a></li>
          <li class="nav-item"> <a class="nav-link {{ request()->is('food') ? 'active' : '' }}" href="{{url('/food')}}">Food</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/stock-in')}}">Stock in Food</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
        <span class="menu-title">Reports</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/total-sale')}}"> Total Sale </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/day-wise-report')}}"> Day wise Reports </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/report-due-list')}}"> Due List </a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item sidebar-user-actions">
      <div class="user-details">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="d-flex align-items-center">
              <div class="sidebar-profile-img">
                <img src="/dash/assets/images/faces/face28.png" class="w-100 rounded" alt="image">
              </div>
              <div class="sidebar-profile-text">
                <p class="mb-1">SAMIM-HosseN</p>
              </div>
            </div>
          </div>
          <div class="badge badge-success">3</div>
        </div>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="{{url('/dashboard/setting')}}" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
          <span class="menu-title">Take Tour</span></a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="{{url('/login')}}" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title">Log Out</span></a>
      </div>
    </li>
  </ul>
</nav>