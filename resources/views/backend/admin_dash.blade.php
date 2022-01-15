<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.1/sweetalert.css" integrity="sha512-fRVSQp1g2M/EqDBL+UFSams+aw2qk12Pl/REApotuUVK1qEXERk3nrCFChouag/PdDsPk387HJuetJ1HBx8qAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Winkle_dashboard</title>

    <!-- vendor css -->
    <link href="{{asset('backend')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">


    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.css" integrity="sha512-89dj20t0ePIY5LVWjdFJwXKHq326wykdMXRvJ0IApshtw79sL5IURuvU5A3w/fwKW5pUZlwMer12Gg2MA/pvng==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/css/starlight.css">
  </head>

  <body>
    {{-- @guest
    @else --}}
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
        <div class="sl-sideleft">
            <div class="input-group input-group-search">
                <input type="search" name="search" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                <button class="btn"><i class="fa fa-search"></i></button>
                </span><!-- input-group-btn -->
            </div><!-- input-group -->

            <label class="sidebar-label">Navigation</label>
            <div class="sl-sideleft-menu">
                <a href="{{route('admin.dashboard')}}" class="sl-menu-link active">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <a href="{{url('/')}}" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="fa fa-braille tx-20"></i>
                        <span class="menu-item-label">Visit Site</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <a href="{{url('ajax-crud-datatable')}}" class="sl-menu-link @yield('category')">
                    <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Category</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <a href="{{url('brand/index')}}" class="sl-menu-link @yield('brand')">
                    <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Brand</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <a href="{{url('role/index')}}" class="sl-menu-link @yield('role')">
                    <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">User Role</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                 <a href="{{route('products.index')}}" class="sl-menu-link @yield('product')">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Products</span>
                        {{-- <i class="menu-item-arrow fa fa-angle-down"></i> --}}
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                <a href="{{route('coupons.index')}}" class="sl-menu-link @yield('coupon')">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Coupons</span>
                        {{-- <i class="menu-item-arrow fa fa-angle-down"></i> --}}
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                <a href="{{url('division_datatable')}}" class="sl-menu-link @yield('division')">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Division</span>
                        {{-- <i class="menu-item-arrow fa fa-angle-down"></i> --}}
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                <a href="{{url('district_datatable')}}" class="sl-menu-link @yield('district')">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Distric</span>
                        {{-- <i class="menu-item-arrow fa fa-angle-down"></i> --}}
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                {{-- <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
                    <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
                </ul> --}}
                {{--
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                        <span class="menu-item-label">UI Elements</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
                    <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
                    <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
                    <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
                    <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
                    <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
                    <li class="nav-item"><a href="navigation.html" class="nav-link">Navigation</a></li>
                    <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
                    <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
                    <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
                    <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
                    <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
                </ul>
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                        <span class="menu-item-label">Tables</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
                    <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
                </ul>
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                        <span class="menu-item-label">Maps</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
                    <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
                </ul>
                <a href="mailbox.html" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                        <span class="menu-item-label">Mailbox</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                        <span class="menu-item-label">Pages</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
                    <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
                    <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
                    <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
                </ul> --}}
            </div><!-- sl-sideleft-menu -->

            <br>
        </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">Jane<span class="hidden-md-down"> Doe</span></span>
              <img src="{{asset('backend')}}/img/img3.jpg" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li><a href="{{route('logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        {{-- <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right --> --}}
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        {{-- <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Starlight</a> --}}
            @yield('main_content')
    <!-- ########## END: MAIN PANEL ########## -->
    {{-- @endguest --}}
    @yield('login_content')

    <script src="{{asset('backend')}}/lib/popper.js/popper.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('backend')}}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{asset('backend')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{asset('backend')}}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{asset('backend')}}/lib/d3/d3.js"></script>
    <script src="{{asset('backend')}}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{asset('backend')}}/lib/chart.js/Chart.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{asset('backend')}}/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="{{asset('backend')}}/js/starlight.js"></script>
    <script src="{{asset('backend')}}/js/ResizeSensor.js"></script>
    <script src="{{asset('backend')}}/js/dashboard.js"></script>

    {{-- Yajra --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.1/sweetalert.min.js" integrity="sha512-bQTg0yQoJONPPP2GJpVEWYayw5y7LmCrN+VMCr3l3jl1mn8a2yjYLDBkvt4TkQCJjLaI3kprfiJ2ivEUOw63ow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
  </body>
</html>
