<div class="main-panel">
  <div class="content-wrapper">
    <div class="row" id="proBanner">
      <!-- <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
          <p>If you face any problem then direct contact with developer SAMIM-HossaiN</p>
          <a href="https://shamim.deegau.com/" target="_blank" class="btn ml-auto download-button">Contact Us</a>
          <a href="https://shamim.deegau.com/" target="_blank" class="btn purchase-button">Call Now</a>
          <i class="mdi mdi-close" id="bannerClose"></i>
        </span>
      </div> -->
    </div>
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
      <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
        <div class="btn-group bg-white p-3" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-link text-dark py-0 border-right active" data-target="today">Toda</button>
          <button type="button" class="btn btn-link text-dark py-0 border-right " data-target="week">7 Days</button>
          <button type="button" class="btn btn-link text-dark py-0 border-right" data-target="month">1 Month</button>
        </div>
        <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
          <button class="btn bg-white dropdown-toggle p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-calendar mr-1"></i>24 Mar 2019 - 24 Mar 2019 </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
            <h6 class="dropdown-header">Settings</h6>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </div>
      </div>
    </div>








    <div id="today" class="data-container">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid mt-3" id="account">
            
            <div class="row">
              {{-- Total --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-coins mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Total</h6>
                    <h3 class="text-primary font-weight-bold mb-0">৳{{ $total }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Payment --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-hand-holding-usd mb-2 text-success"></i> 
                    <h6 class="text-muted mb-1">Payment</h6>
                    <h3 class="text-success font-weight-bold mb-0">৳{{ $totalPay }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Due --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-danger shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-exclamation-circle mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Due</h6>
                    <h3 class="text-danger font-weight-bold mb-0">৳{{ $totalDue }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Discount --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-warning shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-percentage mb-2 text-warning"></i>
                    <h6 class="text-muted mb-1">Discount</h6>
                    <h3 class="text-warning font-weight-bold mb-0">৳{{ $totalDiscount }}/-</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              {{-- Total Expenses --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class=" mdi mdi-square-inc-cash mb-3 text-warning" style="font-size: 2.5rem;"></i> 
                    <h6 class="text-muted mb-2">Total Expenses</h6>
                    <h3 class="text-warning font-weight-bold mb-0">{{ $expenses }}</h3>
                  </div>
                </div>
              </div>

              {{-- Income --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="mdi mdi-cash-multiple mb-3 text-success" style="font-size: 2.5rem;"></i> 
                    <h6 class="text-muted mb-2">Income</h6>
                    <h3 class="text-success font-weight-bold mb-0">৳{{ $totalPay - $expenses }}/-</h3>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              {{-- Total Food --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-utensils mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Food</h6>
                    <h3 class="text-primary font-weight-bold mb-0">{{ $food }}</h3>
                  </div>
                </div>
              </div>

              {{-- Stock --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-boxes mb-2 text-success"></i> 
                    <h6 class="text-muted mb-1">Stock</h6>
                    <h3 class="text-success font-weight-bold mb-0">{{ $stock }}</h3>
                  </div>
                </div>
              </div>

              {{-- Short Stock --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="mdi mdi-clipboard-arrow-down  mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Short Stock</h6>
                    <h3 class="text-danger font-weight-bold mb-0">{{ $shortStock }}</h3>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="row">
              {{-- Total Table --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-info shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-table mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Total Table</h6>
                    <h3 class="text-primary font-weight-bold mb-0">{{ $totalTable }}</h3>
                  </div>
                </div>
              </div>

              {{-- Empty Table --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-chair mb-2 text-success"></i>
                    <h6 class="text-muted mb-1">Empty Table</h6>
                    <h3 class="text-success font-weight-bold mb-0">{{ $tableEmpty }}</h3>
                  </div>
                </div>
              </div>

              {{-- Reserved --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-warning shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-calendar-check mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Reserved</h6>
                    <h3 class="text-danger font-weight-bold mb-0">{{ $tableReserved }}</h3>
                  </div>
                </div>
              </div>

              {{-- Ordered --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-danger shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-concierge-bell mb-2 text-warning"></i> 
                    <h6 class="text-muted mb-1">Ordered</h6>
                    <h3 class="text-warning font-weight-bold mb-0">{{ $tableOrder }}</h3>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div id="week" class="data-container" style="display:none;">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid mt-3" id="account">
            
            <div class="row">
              {{-- Total --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-coins mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Total</h6>
                    <h3 class="text-primary font-weight-bold mb-0">৳{{ $total7 }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Payment --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-hand-holding-usd mb-2 text-success"></i> 
                    <h6 class="text-muted mb-1">Payment</h6>
                    <h3 class="text-success font-weight-bold mb-0">৳{{ $totalPay7 }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Due --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-danger shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-exclamation-circle mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Due</h6>
                    <h3 class="text-danger font-weight-bold mb-0">৳{{ $totalDue7 }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Discount --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-warning shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-percentage mb-2 text-warning"></i>
                    <h6 class="text-muted mb-1">Discount</h6>
                    <h3 class="text-warning font-weight-bold mb-0">৳{{ $totalDiscount7 }}/-</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              {{-- Total Expenses --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class=" mdi mdi-square-inc-cash mb-3 text-warning" style="font-size: 2.5rem;"></i> 
                    <h6 class="text-muted mb-2">Total Expenses</h6>
                    <h3 class="text-warning font-weight-bold mb-0">{{ $expenses7 }}</h3>
                  </div>
                </div>
              </div>

              {{-- Income --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="mdi mdi-cash-multiple mb-3 text-success" style="font-size: 2.5rem;"></i> 
                    <h6 class="text-muted mb-2">Income</h6>
                    <h3 class="text-success font-weight-bold mb-0">৳{{ $totalPay7 - $expenses7 }}/-</h3>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              {{-- Total Food --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-utensils mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Food</h6>
                    <h3 class="text-primary font-weight-bold mb-0">{{ $food }}</h3>
                  </div>
                </div>
              </div>

              {{-- Stock --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-boxes mb-2 text-success"></i> 
                    <h6 class="text-muted mb-1">Stock</h6>
                    <h3 class="text-success font-weight-bold mb-0">{{ $stock }}</h3>
                  </div>
                </div>
              </div>

              {{-- Short Stock --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="mdi mdi-clipboard-arrow-down  mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Short Stock</h6>
                    <h3 class="text-danger font-weight-bold mb-0">{{ $shortStock }}</h3>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="row">
              {{-- Total Table --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-info shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-table mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Total Table</h6>
                    <h3 class="text-primary font-weight-bold mb-0">{{ $totalTable }}</h3>
                  </div>
                </div>
              </div>

              {{-- Empty Table --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-chair mb-2 text-success"></i>
                    <h6 class="text-muted mb-1">Empty Table</h6>
                    <h3 class="text-success font-weight-bold mb-0">{{ $tableEmpty }}</h3>
                  </div>
                </div>
              </div>

              {{-- Reserved --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-warning shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-calendar-check mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Reserved</h6>
                    <h3 class="text-danger font-weight-bold mb-0">{{ $tableReserved }}</h3>
                  </div>
                </div>
              </div>

              {{-- Ordered --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-danger shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-concierge-bell mb-2 text-warning"></i> 
                    <h6 class="text-muted mb-1">Ordered</h6>
                    <h3 class="text-warning font-weight-bold mb-0">{{ $tableOrder }}</h3>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div id="month" class="data-container" style="display:none;">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid mt-3" id="account">
            
            <div class="row">
              {{-- Total --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-coins mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Total</h6>
                    <h3 class="text-primary font-weight-bold mb-0">৳{{ $totalMonth }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Payment --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-hand-holding-usd mb-2 text-success"></i> 
                    <h6 class="text-muted mb-1">Payment</h6>
                    <h3 class="text-success font-weight-bold mb-0">৳{{ $totalPayMonth }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Due --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-danger shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-exclamation-circle mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Due</h6>
                    <h3 class="text-danger font-weight-bold mb-0">৳{{ $totalDueMonth }}/-</h3>
                  </div>
                </div>
              </div>

              {{-- Discount --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-warning shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-percentage mb-2 text-warning"></i>
                    <h6 class="text-muted mb-1">Discount</h6>
                    <h3 class="text-warning font-weight-bold mb-0">৳{{ $totalDiscountMonth }}/-</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              {{-- Total Expenses --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class=" mdi mdi-square-inc-cash mb-3 text-warning" style="font-size: 2.5rem;"></i> 
                    <h6 class="text-muted mb-2">Total Expenses</h6>
                    <h3 class="text-warning font-weight-bold mb-0">{{ $expensesMonth }}</h3>
                  </div>
                </div>
              </div>

              {{-- Income --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="mdi mdi-cash-multiple mb-3 text-success" style="font-size: 2.5rem;"></i> 
                    <h6 class="text-muted mb-2">Income</h6>
                    <h3 class="text-success font-weight-bold mb-0">৳{{ $totalPayMonth  - $expensesMonth }}/-</h3>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              {{-- Total Food --}}
              <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
                <div class="card border-primary shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-utensils mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Food</h6>
                    <h3 class="text-primary font-weight-bold mb-0">{{ $food }}</h3>
                  </div>
                </div>
              </div>

              {{-- Stock --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-boxes mb-2 text-success"></i> 
                    <h6 class="text-muted mb-1">Stock</h6>
                    <h3 class="text-success font-weight-bold mb-0">{{ $stock }}</h3>
                  </div>
                </div>
              </div>

              {{-- Short Stock --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="mdi mdi-clipboard-arrow-down  mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Short Stock</h6>
                    <h3 class="text-danger font-weight-bold mb-0">{{ $shortStock }}</h3>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="row">
              {{-- Total Table --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-info shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-table mb-2 text-primary"></i> 
                    <h6 class="text-muted mb-1">Total Table</h6>
                    <h3 class="text-primary font-weight-bold mb-0">{{ $totalTable }}</h3>
                  </div>
                </div>
              </div>

              {{-- Empty Table --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-success shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-chair mb-2 text-success"></i>
                    <h6 class="text-muted mb-1">Empty Table</h6>
                    <h3 class="text-success font-weight-bold mb-0">{{ $tableEmpty }}</h3>
                  </div>
                </div>
              </div>

              {{-- Reserved --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-warning shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-calendar-check mb-2 text-danger"></i> 
                    <h6 class="text-muted mb-1">Reserved</h6>
                    <h3 class="text-danger font-weight-bold mb-0">{{ $tableReserved }}</h3>
                  </div>
                </div>
              </div>

              {{-- Ordered --}}
              <div class="col-xl-3 col-lg-6 col-sm-6 mb-4">
                <div class="card border-danger shadow-sm h-100">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <i class="fas fa-concierge-bell mb-2 text-warning"></i> 
                    <h6 class="text-muted mb-1">Ordered</h6>
                    <h3 class="text-warning font-weight-bold mb-0">{{ $tableOrder }}</h3>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>








  </div>
</div>

  </div>
  <!-- content-wrapper ends -->
</div>