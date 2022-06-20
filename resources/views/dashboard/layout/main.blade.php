<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

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

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/LOGO.png') }}" alt="Logo" height="60" width="60">
  </div> -->
<!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 right" style="background-color: #28a745;">
      <!-- Brand Logo -->
      <a href="{{ URL('dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/LOGO.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="text-white mx-3">سبع سنابل</span>
        <div class="dropdown-divider"></div>
      </a>
  
  <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel my-3 pb-3 d-flex">
          <div class="image">
            <img src="{{ Auth::user()->profile_photo_path ? asset(Storage::url(Auth::user()->profile_photo_path)) : Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="" class="text-white">{{ Auth::user()->name }}</a>
          </div>
        </div>
  <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column">
            <li class="nav-item">
              <a href="{{ URL('dashboard') }}" class="nav-link text-white" id="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                <i class="nav-icon ion-android-home"></i>
                <p>
                  لوحة القيادة
                </p>
              </a>
            </li>

            {{------------ Users ---------------}}
              @can('View Users')
                <li class="nav-item menu-open pt-3">
                  <a class="nav-link text-white" id="{{ (request()->is('dashboard/users')) ? 'active' : '' }}">

                    <i class="nav-icon ion ion-ios-people"></i>
                    <p>
                      المستخدمين
                    </p>
                    <i class="right fas fa-angle-left"></i>
                  </a>
                  <ul class="nav nav-treeview px-3">
                    @can('View Users')
                      <li class="nav-item">
                        <a href="{{ URL('/dashboard/users') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/users')) ? 'active' : '' }}">
                          <i class="far fa-user nav-icon"></i>
                          <p>عرض المستخدمين</p>
                        </a>
                      </li>
                    @endcan
                    
                    @can('Create User')
                      <li class="nav-item">
                        <a href="{{ URL('/dashboard/user/create') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/user/create')) ? 'active' : '' }}">
                          <i class="far fa-user nav-icon"></i>
                          <p>إضافة مستخدم جديد</p>
                        </a>
                      </li>
                    @endcan
                      
                  </ul>
                </li>
              @endcan
            {{------------ End Users ---------------}}

            {{------------ Roles ---------------}}
              @can('View Roles')
                <li class="nav-item menu-open pt-3">
                  <a class="nav-link text-white" id="{{ (request()->is('dashboard/roles')) ? 'active' : '' }}">
                    <i class="nav-icon ion ion-ios-people"></i>
                    <p>
                      الأدوار
                    </p>
                    <i class="right fas fa-angle-left"></i>
                  </a>
                  <ul class="nav nav-treeview px-3">
                    @can('View Roles')
                      <li class="nav-item">
                        <a href="{{ URL('/dashboard/roles') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/roles')) ? 'active' : '' }}">
                          <i class="far fa-user nav-icon"></i>
                          <p>عرض الأدوار</p>
                        </a>
                      </li>
                    @endcan

                    @can('Create Role')
                      <li class="nav-item">
                        <a href="{{ URL('/dashboard/role/create') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/role/create')) ? 'active' : '' }}">
                          <i class="far fa-user nav-icon"></i>
                          <p>إضافة دور جديد</p>
                        </a>
                      </li>
                    @endcan
                    
                  </ul>
                </li>
              @endcan
            {{------------ End Roles ---------------}}
            
            {{------------ Categories ---------------}}
              @can('View Categories')
                <li class="nav-item menu-open pt-3">
                  <a class="nav-link text-white" id="{{ (request()->is('dashboard/categories')) ? 'active' : '' }}">
                    <i class="nav-icon ion ion-ios-people"></i>
                    <p>
                      التصنيفات
                    </p>
                    <i class="right fas fa-angle-left"></i>
                  </a>
                  <ul class="nav nav-treeview px-3">
                      <li class="nav-item">
                        @can('View Categories')
                          <a href="{{ URL('/dashboard/categories') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/categories')) ? 'active' : '' }}">
                            <i class="far fa-user nav-icon"></i>
                            <p>عرض التصنيفات</p>
                          </a>
                        @endcan
                      </li>
                      <li class="nav-item">
                      @can('Create Category')
                        <a href="{{ URL('/dashboard/category/create') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/category/create')) ? 'active' : '' }}">
                          <i class="far fa-user nav-icon"></i>
                          <p>إضافة تصنيف جديد</p>
                        </a>
                      @endcan
                      </li>
                    
                  </ul>
                </li>
              @endcan
            {{------------ End Categories ---------------}}

            {{------------ Donors ---------------}}
              @can('View Donors')
                <li class="nav-item pt-3" >
                  <a href="{{ URL('dashboard/donors') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/donors')) ? 'active' : '' }}">
                    <i class="nav-icon ion ion-ios-people"></i>
                    <p>
                      المتبرعين
                    </p>
                  </a>
                </li>
              @endcan
            {{------------ End Donors ---------------}}

            {{------------ DonationRequest ---------------}}
            @can('View Donation Requests')
              <li class="nav-item pt-3" >
                <a href="{{ URL('/dashboard/donation_request') }}" class="nav-link text-white" id="{{ (request()->is('/dashboard/donation_request')) ? 'active' : '' }}">
                  <i class="nav-icon ion ion-android-cart"></i>
                  <p>
                    طلبات التبرع
                  </p>
                </a>
              </li>
              @endcan
            {{------------ End DonationRequest ---------------}}
            
            {{------------ Beneficiaries ---------------}}
              @can('View Beneficiaries')
                <li class="nav-item pt-3" >
                  <a href="{{ URL('dashboard/beneficiaries') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/beneficiaries')) ? 'active' : '' }}">
                    <i class="nav-icon ion ion-ios-people"></i>
                    <p>
                      المستفيدين
                    </p>
                  </a>
                </li>
              @endcan
            {{------------ End Beneficiaries ---------------}}

            {{------------ BenefitRequest ---------------}}
            @can('View Benefite Requests')
              <li class="nav-item pt-3" >
                <a href="{{ URL('/dashboard/benefit_request') }}" class="nav-link text-white" id="{{ (request()->is('/dashboard/benefit_request')) ? 'active' : '' }}">
                  <i class="nav-icon ion ion-android-cart"></i>
                  <p>
                    طلبات الاستفادة
                  </p>
                </a>
              </li>
            @endcan
            {{------------ End BenefitRequest ---------------}}

            {{------------ Donations ---------------}}
              {{-- <li class="nav-item pt-3" >
                <a href="{{ URL('dashboard/donations') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/donations')) ? 'active' : '' }}">
                  <i class="nav-icon ion ion-android-cart"></i>
                  <p>
                    التبرعات
                  </p>
                </a>
              </li> --}}
            {{------------ End Donations ---------------}}

            {{------------ Committees ---------------}}
              @can('View Committees')
                <li class="nav-item menu-open pt-3">
                    <a href="{{ URL('dashboard/committees') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/committees')) ? 'active' : '' }}">
                    <i class="nav-icon ion ion-android-document"></i>
                    <p>
                      اللجان
                    </p>
                    <i class="right fas fa-angle-left"></i>
                  </a>
                  <ul class="nav nav-treeview px-3">
                    @can('View Committees')
                      <li class="nav-item">
                        <a href="{{ URL('/dashboard/committees') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/committees')) ? 'active' : '' }}">
                          <i class="far fa-file nav-icon"></i>
                          <p>عرض اللجان</p>
                        </a>
                      </li>
                    @endcan

                    @can('Create Committee')
                      <li class="nav-item">
                        <a href="{{ URL('/dashboard/committee/create') }}" class="nav-link text-white" id="{{ (request()->is('dashboard/committee/create')) ? 'active' : '' }}">
                          <i class="far fa-file nav-icon"></i>
                          <p>إضافة لجنة جديدة</p>
                        </a>
                      </li>
                    @endcan
                  </ul>
                </li>
              @endcan
            {{------------ End Committees ---------------}}
            
            {{------------ LOGOUT ---------------}}
              <li class="nav-item pt-3 pb-5">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                            this.closest('form').submit();" class="nav-link text-white">
                      <i class="nav-icon ion ion-log-out"></i>
                    <p>
                      تسجيل الخروج
                    </p>
                  </a>
                </form>
              </li>
            {{------------ End LOGOUT ---------------}}

          </ul>
        </nav>
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
        <a href="{{ URL('/') }}" class="nav-link" style="color: #19692b;">الرئيسية</a>
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
<!-- ---------------------------------------------------------------------------------------------------- -->
<!-- First body section -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0" style="color: #23903c;">
            <a href="{{ URL('dashboard') }}" style="color: #23903c;"> لوحة التحكم</a>
            <a style="color: #23903c;">{{ $title }}</a>
          </h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  @yield('MainContent')

  @include('dashboard.includes.appJS')
</body>
</html>