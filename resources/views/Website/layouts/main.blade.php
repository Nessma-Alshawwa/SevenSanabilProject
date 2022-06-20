<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  @include('Website.includes.appStyle')

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>سبع سنابل</title>
  </head>
  <style>
    .color1 {
      color: #19692b;
    }
    .bgColor1{
      background-color: #19692b;
    }
    .color2 {
      color: #23903c;
    }
    .bgColor2{
        background-color: #23903c;
    }
    .color3 {
      color: #28a745;
    }
    .bgColor3{
        background-color: #28a745;
    }
    .color4 {
      color: #31cd55;
    }
    .bgColor4{
        background-color: #31cd55;
    }
    .color5 {
      color: #56d773;
    }
    .bgColor5 {
      background-color: #56d773;
    }
  </style>
  <body>
    <!--header-->
<header id="site-header" class="fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg stroke">
      <a class="navbar-brand" href="{{ URL('/') }}">
        <img src="{{ asset('dist/img/logo2.png') }}" class="rounded-circle" alt="" width="80" height="80" />
      </a>
      <!-- Authentication Links -->
      <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav w-100">
          <ul>
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
              <a class="nav-link " aria-current="page" href="{{ URL('/') }}"
                >الرئيسية</a
              >
            </li>
            
            <li class="nav-item {{ (request()->is('benefitRequest')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ URL('benefitRequest') }}">
                طلبات الاستفادة
              </a>
            </li>
            <li class="nav-item {{ (request()->is('categories')) ? 'active' : '' }}">
              <a class="nav-link"  href="{{ URL('categories') }}">فئات التبرع</a>
            </li>
            <li class="nav-item {{ (request()->is('about')) ? 'active' : '' }}">
              <a class="nav-link"  href="{{ URL('about') }}">عن سبع سنابل</a>
            </li>
          </ul>
            <li class="nav-item"></li>
          <li class="ml-lg-auto mr-lg-0 m-auto">
            <!--/search-right-->
            <div class="search-right">
              <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
              <!-- search popup -->
              <div id="search" class="pop-overlay">
                  <div class="popup">
                      <h4 class="mb-3">ابحث هنا</h4>
                      <form action="error.html" method="GET" class="search-box">
                          <input type="search" placeholder="ابحث هنا" name="search" required="required"
                              autofocus="">
                          <button type="submit" class="btn btn-style btn-primary">بحث</button>
                      </form>

                  </div>
                  <a class="close" href="#close">×</a>
              </div>
              <!-- /search popup -->
          </div>
          <!--//search-right-->
          </li>
          <li class="align-self">
            <a href="{{ URL('donateNow') }}" class="btn btn-style btn-primary "> تبرع الآن <span class="fa fa-heart mr-1"></span></a>
          </li>
          <div>
            @if (Auth::guest())
              <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <div class="image">
                        <img src="{{ Auth::user()->profile_photo_path ? asset(Storage::url(Auth::user()->profile_photo_path)) : Auth::user()->profile_photo_url }}" class="rounded-circle" width="50" height="50" alt="User Image">
                      </div>
                    </a>
    
                    <ul class="dropdown-menu text-right" role="menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ URL('/dashboard')}}">لوحة التحكم</a>
                      </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">تسجيل الخروج
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
          </div>
        </ul>
      </div>
      <!-- toggle switch for light and dark theme -->
      <div class="mobile-position">
        <nav class="navigation text-right">
          <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
              <input type="checkbox" id="checkbox">
              <div class="mode-container">
                <i class="gg-sun"></i>
                <i class="gg-moon"></i>
              </div>
            </label>
          </div>
        </nav>
      </div>
      

      <!-- //toggle switch for light and dark theme -->
    </nav>
  </div>
</header>

<div class="mt-5 pt-5">
  @yield('MainContent')
</div>
  <!-- footer -->
{{-- <div class="container-fluid"> --}}
  <footer>
    <div class="p-3 bgColor4">
      <div class="nav">
        <a class="mx-auto navbar-brand" href="#">
          <img src="{{ asset('dist/img/logo2.png') }}"
          width="80"
          height="80"
          class="rounded-circle"/>
        </a>
        
        
      </div>
  
      <div class="row d-flex mx-5 justify-content-around">
        <div class="col-6 d-flex justify-content-center">
          <h5 class="text-white text-center font-weight-bold">تابعنا على </h5>
          <div class="social-media text-white d-flex justify-content-between">
            <a class="nav-link" href=""><i class="fa fa-facebook-f fa-lg px-1"></i></a>
            <a class="nav-link" href=""><i class="fa fa-twitter fa-lg px-1"></i></a>
            <a class="nav-link" href=""><i class="fa fa-envelope fa-lg px-1"></i></a>
          </div>
          
  
        </div>
        <div class="col-6 d-flex justify-content-center">
          <h5 class="text-center"><a class="nav-link text-white" href="{{ URL('about') }}">عن سبع سنابل</a></h5>
          <h5 class="text-center"><a class="nav-link text-white" href="">سياسة الخصوصية</a></h5>
          <h5 class="text-center"><a class="nav-link text-white" href="{{URL('donateNow')}}">تبرع الآن</a></h5>
        </div>
        </div>
  
      </div>
    </div>
    
    <div class="d-flex justify-content-center bg-white py-2">
      <h6 class="text-success">جميع الحقوق محفوظة لمنصة سبع سنابل 2022</h6>
    </div>
  </footer>
{{-- </div> --}}

  @include('Website.includes.appJS')
  </body>
</html>