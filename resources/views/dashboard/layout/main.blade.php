<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @include('dashboard.includes.appStyle')
  
  <title>لوحة القيادة</title>
</head>
<style>
  #active{
    background-color: #23903c;
  }
</style>
<!-- ---------------------------------------------------------------------------------------------------- -->

<!-- Aside navBar -->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4" style="background-color: #28a745;">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="{{ asset('dist/img/LOGO.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="text-white">سبع سنابل</span>
        <div class="dropdown-divider"></div>
      </a>
  
  <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="text-white">أدمن</a>
          </div>
        </div>
  <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="{{ URL('dashboard/index') }}" class="nav-link text-white" id="active">
              <i class="nav-icon ion-android-home"></i>
              <p>
                لوحة القيادة
              </p>
            </a>
            <li class="nav-item pt-4">
              <a href="{{ URL('dashboard/doners') }}" class="nav-link text-white">
                <i class="nav-icon ion ion-ios-people"></i>
                <p>
                  المتبرعين
                </p>
              </a>
              <li class="nav-item pt-4">
                <a href="{{ URL('dashboard/beneficiaries') }}" class="nav-link text-white">
                  <i class="nav-icon ion ion-ios-people"></i>
                  <p>
                    المستفيدين
                  </p>
                </a>
                <li class="nav-item pt-4">
                  <a href="{{ URL('dashboard/donations') }}" class="nav-link text-white">
                    <i class="nav-icon ion ion-android-cart"></i>
                    <p>
                      التبرعات
                    </p>
                  </a>
                  <li class="nav-item pt-4">
                    <a href="{{ URL('dashboard/zkat') }}" class="nav-link text-white">
                      <i class="nav-icon ion ion-android-document"></i>
                      <p>
                        اللجان
                      </p>
                    </a>
                    <li class="nav-item pt-4">
                      <a href="#" class="nav-link text-white">
                        <i class="nav-icon ion ion-log-out"></i>
                        <p>
                          تسجيل الخروج
                        </p>
                      </a>
      </div>
      </aside>
<!-- ---------------------------------------------------------------------------------------------------- -->
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">  
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ URL('dashboard/index') }}" class="nav-link" style="color: #19692b;">الرئيسية</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" style="color: #19692b;">تواصل</a>
      </li>
    </ul>

  <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="بحث" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">٥</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  مستخدم
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">الاستفسار عن معلومة</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>قبل ٤ ساعات</p>
              </div>
            </div>
  <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
  <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  مستخدم
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">الاستفسار عن معلومة</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>قبل ٤ ساعات</p>
              </div>
            </div>
  <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">رؤية المزيد من الرسائل</a>
        </div>
      </li>
  <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">١٥</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">٢٣ من الاشعارات</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>٤ رسائل جديدة
            <span class="float-right text-muted text-sm">قبل ٣ دقائق</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>٨ طلبات انشاء حساب
            <span class="float-right text-muted text-sm">قبل ١٢ ساعة</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i>٣ تقارير جديدة
            <span class="float-right text-muted text-sm">قبل ٣ يوم</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">رؤية كل الاشعارات</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @yield('MainContent')

  @include('dashboard.includes.appJS')
</body>
</html>