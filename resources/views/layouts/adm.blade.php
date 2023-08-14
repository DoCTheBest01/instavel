<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>پنل ارائه مدیریت</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('back/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
  <link rel="stylesheet" href="{{asset('back/assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('back/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('back/assets/vendors/css/vendor.bundle.addons.css')}}">
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('back/assets/css/shared/style.css')}}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('back/assets/css/demo_1/style.css')}}">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="{{asset('back/assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="{{asset('back/assets/images/logo.svg')}}" alt="logo" /> </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="{{asset('back/assets/images/logo-mini.svg')}}" alt="logo" /> </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{asset(Auth::user()->pic)}}" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="{{asset(Auth::user()->pic)}}" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                <p class="font-weight-light text-muted mb-0">{{Auth::user()->email}}</p>
              </div>
                    <a href="{{route('home')}}" class="dropdown-item">خانه</a>
                  <a href="{{route('logout')}}" class="dropdown-item text-danger" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit()">خروج</a>
            </div>
            <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="profile-image" style="position: relative; left: 18px;">
                <img class="img-xs rounded-circle" src="{{asset(Auth::user()->pic)}}" alt="profile image" >
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">{{Auth::user()->name}}</p>
              </div>
            </a>
          </li>
          <li class="nav-item nav-category">منوی اصلی</li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('adminpanel')}}">
              <i class="menu-icon typcn typcn-document-text"></i>
              <span class="menu-title">کنترل پنل</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon typcn typcn-coffee"></i>
              <span class="menu-title">فعالیت ها</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('adminpanel.createpost')}}">ساخت پست</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('adminpanel.allposts')}}">لیست همه ی پست ها</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('user.postlist')}}">لیست پست های مدیر</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon typcn typcn-coffee"></i>
              <span class="menu-title">کاربران</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('adminpanel.createuser')}}">ساخت کاربر جدید</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/allusers">لیست کاربران</a>
                </li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">پنل ارائه مدیریت</h4>
              </div>
            </div>
             
          </div>
          <!-- Page Title Header Ends-->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                    <!-- STARTS -->
                      @yield('content')
                    <!--  ENDS  -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('back/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('back/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('back/assets/js/shared/off-canvas.js')}}"></script>
  <script src="{{asset('back/assets/js/shared/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('back/assets/js/demo_1/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>