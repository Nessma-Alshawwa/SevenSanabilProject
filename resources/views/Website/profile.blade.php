@extends('Website.layouts.main')
@section('MainContent')
      <!-- ------------------------------------------------------------------------------------ -->
<div class="container">
  <h2 class="text-center color1 mb-4">الملف الشخصي للمتبرع</h2>
  <div class="row shadow rounded mb-4 mt-4 p-4 mx-auto"
       style="width: 30%;height: 40%;">
    <div class="col-6">
      <img src="{{ asset('dist/img/profilePic.png') }}"
           alt=""
           width="100%"
           height="100%"
           class="rounded-circle">
    </div>
    <div class="col-6">
      <h6 class="text-white bgColor5 text-center rounded-pill p-2">
        متبرع أ
      </h6>
      <h6 class="text-white bgColor5 text-center rounded p-2">
         تبرعت منذ خمس دقائق
      </h6>
    </div>
  </div>
  <div class="row shadow rounded mb-4 mt-4 p-4 mx-auto"
       style="width: 30%;height: 40%;">
    <div class="col">
      <h6 class="text-white bgColor5 text-center rounded-pill p-2">
        <!-- <i class="nav-icon ion-ios-cart-outline"></i> -->
        <img src="{{ asset('dist/img/donate.png') }}"
             alt=""
             width="15%"
             height="15%"
             class="rounded-circle mx-3">
        أكلمت 3 تبرعات
      </h6>
    </div>
  </div>
  <div class="row shadow rounded mb-4 mt-4 p-4 mx-auto"
       style="width: 30%;height: 40%;">
    <div class="row bgColor5 mx-auto"
         style="border-radius: 20px;">
      <h5 class="text-center text-white mb-4">التبرعات الاخيرة</h5>
      <div class="row">
        <div class="col">
          <h6 class="text-center bgColor3 text-white rounded-pill mb-3">طاولة خشبية</h6>
          <h6 class="text-center bgColor3 text-white rounded-pill mb-3">تلفاز</h6>
          <h6 class="text-center bgColor3 text-white rounded-pill mb-3">سرير</h6>
        </div>
        <div class="col">
          <h6 class="text-center bgColor3 text-white rounded-pill mb-3">منذ 5 دقائق</h6>
          <h6 class="text-center bgColor3 text-white rounded-pill mb-3">منذ 5 دقائق</h6>
          <h6 class="text-center bgColor3 text-white rounded-pill mb-3">منذ 5 دقائق</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="row shadow rounded mb-4 mt-4 p-4 mx-auto"
       style="width: 30%;height: 60%;">
    <div class="row bgColor5 mx-auto justify-content-center"
         style="border-radius: 20px;">
      <h5 class="text-center text-white mb-4 mt-4 mb-4">رقم الهاتف</h5>
      <input type="phone"
             class="form-control mb-4 text-center"
             placeholder="0533 333 3333">
      <button type="submit"
              class="btn text-white bgColor3 rounded-pill mb-4"
              style="width: 60%;">
              اضافة رقم هاتف
      </button>
    </div>
  </div>

</div>

<!-- ----------------------------------------------------------------------------------------- -->
@stop