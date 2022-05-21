@extends('Website.layouts.main')
@section('MainContent')
<!-- ------------------------------------------------------------------------------------ -->

<!-- ----------------------------------------------------------------------------------------- -->
<!-- body -->
    <!-- slider -->
    <div>
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="{{ asset('dist/img/wheat-field.jpg') }}"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption d-none d-md-block">
              <p>
                ان الحب شيء في متناول الجميع ولكن تأكد أن تبرعك هو امتحان
                للقلب
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('dist/img/slider2.jpg') }}" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <p>
                ان الحب شيء في متناول الجميع ولكن تأكد أن تبرعك هو امتحان
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('dist/img/slider3.jpg') }}" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <p>
                ان الحب شيء في متناول الجميع ولكن تأكد أن تبرعك هو امتحان
              </p>
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
    <!-- Donations -->
    <div class="container">
      <div class="row p-5">
        <h2 class="text-center color1">فئات التبرع</h2>
        <h2 class="text-center color1">
          -----------------------
        </h2>
      </div>
      <div class="row justify-content-evenly">
        <div class="col-3 rounded-pill">
          <h5 class="text-center shadow rounded-pill p-3 color1">تبرع بالأثاث</h5>
        </div>
        <div class="col-3 rounded-pill">
          <h5 class="text-center shadow rounded-pill p-3 color1">
            تبرع بالأجهزة الكهربائي
            </h5>
        </div>
        <div class="col-3 rounded-pill">
          <h5 class="text-center shadow rounded-pill p-3 color1">
            تبرع بالملابس
          </h5>
        </div>
      </div>
      <div class="row justify-content-evenly p-4">
        <div class="col-4" style="height:600px;">
          <img 
          src="{{ asset('dist/img/furniture.jpg') }}"
          alt=""
          class=""
          width="100%"
          height="70%"
          style="border-bottom-left-radius: 8%;
                 border-top-right-radius: 8%">
          <div class="d-flex justify-content-evenly pt-2">
            <a href="{{ URL('furnature') }}"
               class="btn shadow p-3 mb-5 bg-body rounded color1"
               style="width: 40%;height: 40%;">
                تصفح
            </a>
            <a href="#"
                class="btn shadow text-white p-3 mb-5 rounded bgColor1"
                style="width: 40%;height: 10%;"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
                تبرع
            </a>
            <div class="modal fade" id="exampleModal" tabindex="-1"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title color1" id="exampleModalLabel">
                      تبرع الأن
                    </h5>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label class="form-label color1">اسم المتبرع</label>
                        <input type="text" class="form-control bgColor5">
                      </div>
                      <div class="mb-3">
                        <label class="form-label color1">رقم الهاتف</label>
                        <input type="phone" class="form-control bgColor5">
                      </div>
                      <div class="mb-3">
                        <label class="form-label color1">نوع التبرع</label>
                        <input type="text" class="form-control bgColor5">
                      </div>
                      <div class="mb-3 d-flex">
                        <label class="form-label color1">صورة للتبرع</label>
                        <input type="text" class="form-control bgColor5">
                        <button type="submit" class="btn bgColor2 mx-2 text-white">ادراج</button>
                      </div>
                      <div class="row justify-content-center">
                        <button type="submit"
                                class="btn bgColor2 col-6 text-white rounded-pill">
                                تبرع
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn bgColor2 text-white">تأكيد</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4" style="height: 600px;">
          <img src="{{ asset('dist/img/electric.jpg') }}"
          alt=""
          width="100%"
          height="70%"
          style="border-bottom-left-radius: 8%;
          border-top-right-radius: 8%">
          <div class="d-flex justify-content-evenly pt-2">
            <a href="{{ URL('electronic') }}"
               class="btn shadow p-3 mb-5 bg-body rounded color1"
               style="width: 40%;height: 40%;">
                تصفح
            </a>
            <a href="#"
                class="btn shadow text-white p-3 mb-5 rounded bgColor1"
                style="width: 40%;height: 10%;">
                تبرع
              </a>
          </div>
        </div>
        <div class="col-4" style="height: 600px;">
          <img src="{{ asset('dist/img/clothes.jpg') }}"
          alt=""
          width="100%"
          height="70%"
          style="border-bottom-left-radius: 8%;
          border-top-right-radius: 8%">
          <div class="d-flex justify-content-evenly pt-2">
            <a href="{{ URL('clothes') }}"
               class="btn shadow p-3 mb-5 bg-body rounded color1"
               style="width: 40%;height: 40%;">
                تصفح
            </a>
            <a href="#"
                class="btn shadow text-white p-3 mb-5 rounded bgColor1"
                style="width: 40%;height: 10%;">
                تبرع
              </a>
          </div>
        </div>
      </div>
      <!-- --------------------------------------------------------------------------------- -->
      <!-- section 2 -->
      <section>
      <div class="row p-5">
        <h2 class="text-center color1">مشاريع تنتظر دعمكم</h2>
        <h2 class="text-center color1">
          -----------------------
        </h2>
      </div>
      <div class="row p-4 d-flex justify-content-evenly">
        <div class="col-6 card shadow"
             style="width: 18rem;border-radius: 10%;">
          <h5 class="card-title text-center p-2 color1">
              كسوة الشتاء
          </h5>
          <img
          src="{{ asset('dist/img/cozy.jpg') }}"
          class="card-img-top border border-success"
          alt="...">
            <div class="progress mt-4">
              <div class="progress-bar bgColor4"
                    role="progressbar"
                    style="width: 25%;"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100">
                    25%
              </div>
            </div>
          <div class="card-body ">
            <p class="card-text color1">
              تأمين مستلزمات الشتاءالاساسية
              من ملابس وبطانيات وأحذية شتوية
            </p>
            <div class="row justify-content-center">
              <a href="#" class="col-6 btn text-white rounded-pill bgColor3">
                تبرع
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 card shadow" style="width: 18rem;border-radius: 10%;">
          <h5 class="card-title text-center p-2 color1">
           احتياجات الطالب
          </h5>
          <img src="{{ asset('dist/img/school.jpg') }}"
                class="card-img-top border border-success"
                alt="...">
          <div class="progress mt-4">
            <div class="progress-bar bgColor1"
                 role="progressbar"
                 style="width: 50%;"
                 aria-valuenow="50"
                 aria-valuemin="0"
                 aria-valuemax="100">
                 50%
            </div>
          </div>
          <div class="card-body">
            <p class="card-text color1">
              تأمين المستلزمات الدراسية  
              لأبناء الأسر ومساعدتهم في مواصلة حياتهم الدراسية
            </p>
            <div class="row justify-content-center">
              <a href="#" class="col-6 btn text-white rounded-pill bgColor3">
                تبرع
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- --------------------------------------------------------------------------------- -->
    <!-- section3 -->
    <section class="container-fluid pb-5">
      <div class="row p-5">
        <h2 class="text-center color1">الاحصائيات</h2>
        <h2 class="text-center color1">
          -----------------------
        </h2>
      </div>
      <div class="container" style="width: 100%;height: 1050px;">
        <div
         class="row d-flex flex-md-column justify-content-center"
         style="width: 100%;height:100%;
                background-image: url({{ asset('dist/img/donate.jpg') }});
                background-size: cover">
                <div class="mb-4 align-self-center"
                     style="opacity: 0.8;
                     width: 500px;
                     height: 300px;
                     background-color: white;">
                     <div class="d-flex flex-md-column justify-content-center">
                          <img src="{{ asset('dist/img/total.png') }}"
                              alt="" 
                              width="100"
                              height="100"
                              class="mt-4 mb-4 align-self-center"
                              >
                              <h3 class="mb-4 align-self-center color1">
                                اجمالي التبرعات
                              </h3>
                              <h3 class="mb-4 align-self-center color1">
                                70.000
                              </h3>
                      </div>
                </div>
                <div class="mb-4 align-self-center"
                     style="opacity: 0.8;
                     width: 500px;
                     height: 300px;
                     background-color: white;">
                     <div class="d-flex flex-md-column justify-content-center">
                          <img src="{{ asset('dist/img/people.png') }}"
                              alt="" 
                              width="100"
                              height="100"
                              class="mt-4 mb-4 align-self-center"
                              >
                              <h3 class="mb-4 align-self-center color1">
                                 عدد المستفيدين
                              </h3>
                              <h3 class="mb-4 align-self-center color1">
                                70.000
                              </h3>
                      </div>
                </div>
                <div class="mb-4 align-self-center"
                style="opacity: 0.8;
                width: 500px;
                height: 300px;
                background-color: white;">
                <div class="d-flex flex-md-column justify-content-center">
                     <img src="{{ asset('dist/img/heart.png') }}"
                         alt="" 
                         width="100"
                         height="100"
                         class="mt-4 mb-4 align-self-center"
                         >
                         <h3 class="mb-4 align-self-center color1">
                            عدد عمليات التبرع
                         </h3>
                         <h3 class="mb-4 align-self-center color1">
                           70.000
                         </h3>
                 </div>
           </div>
        </div>
      </div>
      <div class="row mt-4">
        <h2 class="text-center color1">
          (لَنْ تَنالُوا الْبِرَّ حَتَّى تُنْفِقُوا مِمَّا تُحِبُّونَ وَما تُنْفِقُوا مِنْ شَيْءٍ فَإِنَّ اللَّهَ بِهِ عَلِيمٌ)
        </h2>
      </div>
    </section>
    </div>
<!-- ----------------------------------------------------------------------------------------- -->

@stop