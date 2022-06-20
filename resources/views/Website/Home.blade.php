@extends('Website.layouts.main')
@section('MainContent')
<!-- ------------------------------------------------------------------------------------ -->

<!-- ----------------------------------------------------------------------------------------- -->
<!-- body -->
    <!-- slider -->
    <div style="margin-top: -10px">
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="{{ asset('dist/img/wheat-field.jpg') }}"
              class="d-block w-100"
              alt="..."
              height="500"
            />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="text-white my-5">
                ان الحب شيء في متناول الجميع ولكن تأكد أن تبرعك هو امتحان
                للقلب
              </h1>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('dist/img/slider2.jpg') }}" class="d-block w-100" height="500" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="text-white my-5">
                ان الحب شيء في متناول الجميع ولكن تأكد أن تبرعك هو امتحان للقلب
              </h1>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('dist/img/slider3.jpg') }}" class="d-block w-100" height="500" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="text-white my-5">
                ان الحب شيء في متناول الجميع ولكن تأكد أن تبرعك هو امتحان للقلب
              </h1>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- banner image bottom shape -->
    <div class="position-relative" style="height: 500;">
      <div class="shape overflow-hidden">
          <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor">
              </path>
          </svg>
      </div>
    </div>
    <!-- banner image bottom shape -->
    <!-- home page block1 -->
    {{-- <section class="homeblock1">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="box-wrap">
                      <h4><a href="{{ URL('donateNow') }}">طلب تبرع</a></h4>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-sm-4 mt-3">
                  <div class="box-wrap">
                      <h4><a href="#goals">أهدافنا</a></h4>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-sm-4 mt-3">
                  <div class="box-wrap">
                      <h4><a href="{{ URL('benefitNow') }}">طلب استفادة</a></h4>
                  </div>
              </div>
          </div>
      </div>
    </section> --}}
    <!-- middle -->
    <div class="middle py-5" id="facts">
      <div class="container pt-lg-3">
        <div class="welcome-left text-center py-md-5 py-3">
                  <h3 class="title-big">أكثر من 99% من طلبات التبرع تذهب مباشرة لتغطية طلبات الاستفادة والمستفيدين.</h3>
                  <p class="my-3">أقل من 1% للإدارة والخدمات والتخزين.</p>
                  <h4>شكراً لدعمكم المتواصل <span class="fa fa-heart mr-1"></span></h4>
          <a href="{{ URL('donateNow') }}" class="btn btn-style btn-primary mt-sm-5 mt-4">تبرع الآن  <span class="fa fa-heart mr-1"></span></a>
        </div>
      </div>
    </div>
    <!-- //middle -->
    <!-- Donations -->
    <div class="w3l-index5">
      <div class="container">
        <div class="row p-5">
          <h2 class="text-center color1">فئات التبرع</h2>
          <h2 class="text-center color1">
            -----------------------
          </h2>
        </div>
        <div class="row justify-content-evenly my-5">
          @foreach ($categories as $category)
            <div class="rounded-pill col-md-4 col-sm-12 mt-3 mb-5">
              <h5 class="text-center shadow rounded-pill py-3 color1">{{$category->name}}</h5>
              <div style="height:400px" class="py-2">
                <img 
                src="{{ asset('app/'.$category->image) }}"
                alt=""
                class=""
                width="100%"
                height="100%"
                style="border-bottom-left-radius: 8%;
                      border-top-right-radius: 8%"
                >
                <div class="d-flex justify-content-evenly pt-2">
                  <a href="{{ URL('/categories/show/'.$category->id) }}"
                  class="btn btn-style btn-primary"
                    >
                      تصفح
                  </a>
                </div>
              </div>
            </div>
          @endforeach
          <div class="text-center pt-5 mt-5">
            <div class="d-flex justify-content-center py-3">
              {!! $categories->links() !!}
            </div>
            <a href="{{ URL('categories') }}"
                  class="btn btn-style btn-primary py-2"
                    >
                      عرض المزيد
                  </a>
          </div>
        </div>
      </div>
       <!-- middle -->
    <div class="middle" id="goals">
      <div class="pt-lg-3 w3l-bg py-5">
        <div class="container welcome-left text-center py-3">
          <h3 class="title-big py-5">أهدافنا</h3>
          <p class="text-white" style="line-height: 200%; font-size: 26px">يهدف مشروعنا إلى تطوير تطبيق ويب لإدارة جمع التبرعات العينية لوزارة الأوقاف والشؤون الدينية في قطاع غزة، لتسهيل عملية إدارة التبرعات من حيث تقديم التبرعات أو طلب الاستفادة من تبرع معين من خلال الموقع والربط بينهم وبين الجهة الرسمية المسؤولة عن منح التبرعات، يتم إيصال طلب القبول وإرساله عبر التطبيق وربطه بجهة رسمية تابعة لوزارة الأوقاف والشؤون الدينية في قطاع غزة.</p>
        </div>
      </div>
    </div>
    <!-- //middle --> 
        <!-- --------------------------------------------------------------------------------- -->
        <!-- section 2 -->
      </div>
    </div>
    <div class="w3l-aboutblock1">
      <div class="container">
        <section >
          <div class="row p-5">
            <h2 class="text-center color1">تبرعات للاستفادة متوفرة</h2>

            <h2 class="text-center color1">
              -----------------------
            </h2>
          </div>
          <div class="row py-4 d-flex justify-content-evenly">
            @foreach ($DonationRequests as $DonationRequest)
            <div class="card shadow col-md-3 col-sm-12 m-4"
            style="width: 18rem; border-radius: 25%;">
              <h5 class="card-title text-center p-2 color1">
                {{ $DonationRequest->title }}
              </h5>
              <img
              src="{{ asset( 'app/'.$DonationRequest->image ) }}"
              class="card-img-top border border-success"
              alt="..."
              height="350"
              style="border-radius: 25%;">
                {{-- <div class="progress mt-4">
                  <div class="progress-bar bgColor4"
                        role="progressbar"
                        style="width: 25%;"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        25%
                  </div>
                </div> --}}
              <div class="card-body ">
                {{-- <p class="card-text color1 text-center">
                  {{ $DonationRequest->description }}
                </p> --}}
                <div class="row justify-content-center">
                  <a href="{{URL('benefitNow/'.$DonationRequest->id)}}" class="col-6 btn text-white rounded-pill bgColor3">
                    تقديم طلب
                  </a>
                </div>
              </div>
            </div>
            @endforeach
            <div class="text-center pt-5 mt-5">
              <div class="d-flex justify-content-center py-3">
                {!! $DonationRequests->links() !!}
              </div>
              <a href="{{ URL('benefitRequest') }}"
                    class="btn btn-style btn-primary py-2"
                      >
                        عرض المزيد
                    </a>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- --------------------------------------------------------------------------------- -->
    <!-- section3 -->
    
      <section class="w3l-index5" >
        <div class="container py-5">
          <div class="container row">
            <h2 class="text-center color1">الاحصائيات</h2>
            <h2 class="text-center color1">
              -----------------------
            </h2>
          </div>
          <div class="w-100">
  
            <div
             class="row justify-content-center w-100 py-5 px-5"
             style="background-image: url({{ asset('dist/img/donate.jpg') }});
                    background-size: cover;">
                    <div class="col-md-4 col-sm-12 w-100"
                         style="opacity: 0.8;
                         background-color: white;">
                      <div class="counter text-center">
                        <span class="fa fa-box-open text-center"></span>
                        <div class="timer count-title count-number my-3 color1" data-to="70000" data-speed="1500"></div>
                        <h3 class="mb-4 color1">اجمالي التبرعات</h3>
                      </div>
                      <div class="counter text-center">
                        <i class="fa fa-sack"></i>
                        <div class="timer count-title count-number my-3 color1" data-to="70000" data-speed="1500"></div>
                        <h3 class="mb-4 color1">عدد عمليات التبرع</h3>
                      </div>
                      <div class="counter text-center">
                        <span class="fa fa-users text-center"></span>
                        <div class="timer count-title count-number my-3 color1" data-to="70000" data-speed="1500"></div>
                        <h3 class="mb-4 color1">عدد المستفيدين</h3>
                      </div>
                    </div>
            </div>
          </div>
          <div class="row pt-5">
            <h2 class="text-center color1">
              (لَنْ تَنالُوا الْبِرَّ حَتَّى تُنْفِقُوا مِمَّا تُحِبُّونَ وَما تُنْفِقُوا مِنْ شَيْءٍ فَإِنَّ اللَّهَ بِهِ عَلِيمٌ)
            </h2>
          </div>
        </div>
        
      </section>
<!-- ----------------------------------------------------------------------------------------- -->

@stop