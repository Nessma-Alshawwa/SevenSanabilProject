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
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <div class="d-flex">
            <div>
              <a class="navbar-brand" href="{{ URL('Home') }}">
                <img src="{{ asset('dist/img/logo2.png') }}" alt="" width="80" height="80" />
              </a>
            </div>
            <ul class="nav nav-pills p-4">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ URL('Home') }}"
                  >الرئيسية</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ URL('donateNow') }}">تبرع الأن</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ URL('about') }}">معلومات عنا</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ URL('login') }}">تسجيل الدخول</a>
              </li>
              <li class="nav-item"></li>
            </ul>
          </div>
          <div class="d-flex justify-content-evenly">
            <img
              class="m-4"
              src="{{ asset('dist/img/notification.png') }}"
              alt=""
              width="25"
              height="25"
            />
            <form>
              <input
                class="form-control mt-4"
                type="search"
                placeholder="بحث"
                aria-label="Search"
              />
            </form>
            <a href="{{ URL('profile') }}">
              <img
                src="{{ asset('dist/img/avatar.png') }}"
                alt="mdo"
                width="40"
                height="40"
                class="rounded-circle m-4"
              />
            </a>
          </div>
        </div>
      </nav>

    </header>
  
  
  @yield('MainContent')

  <!-- footer -->
<div class="container-fluid bgColor4">
  <footer class="py-2">
    <div class="row justify-content-md-center">
      <a class="col-md-auto navbar-brand" href="#">
        <img src="{{ asset('dist/img/logo2.png') }}"
             width="120"
             height="120"
             class="rounded-circle"/>
      </a>
    </div>

    <div class="row d-flex justify-content-center">
      <div class="col-4">
        <h4 class="text-white text-center">معلومات الاتصال</h4>
      </div>
      <div class="col-6">
        <h4 class="text-white  text-center">من نحن</h4>
      </div>
      </div>

      <div class="row d-flex justify-content-evenly">
        <div class=" pt-2 bgColor3"
          style="height: 250px;width: 20%;">
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <a href="#" class="nav-link text-white">
              <i class="nav-icon ion-email"></i>
              7snabel@gmail.com
              </a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link text-white">
              <i class="nav-icon ion-social-instagram"></i>
              @7snabel
              </a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link text-white">
              <i class="nav-icon ion-social-facebook"></i>
              7snabel
              </a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link text-white">
              <i class="nav-icon ion-social-twitter"></i>
              @7snabel
              </a>
            </li>
            <li class="nav-item mb-2">
              <a href="#" class="nav-link text-white">
              <i class="nav-icon ion-android-phone-portrait"></i>
              0000 111 222
              </a>
            </li>
          </ul>
          </div>
          <div class=" text-white p-4 bgColor3"
            style="height: 250px; width: 30%;">
            <p class="pt-4">تسعى منصة سبع سنابل الى ان تلبي جميع احتياجات كل 
            المحتاجين حيث وفرت للمتبرعين أن يتبرعوا بشكل عيني 
            وبكل انواعه سواء ملابس و أثاث ,طعام , اجهزة الكترونية 
            أو اي تبرعات عينية يريدها
            <br>
            #تبرعكم_يصلهم
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

  @include('Website.includes.appJS')
  </body>
</html>