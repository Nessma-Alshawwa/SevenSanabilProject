@extends('Website.layouts.main')
@section('MainContent')
      <!-- ------------------------------------------------------------------------------------ -->
<div class="container">
    <h2 class="text-center color1">اضافة تبرع عيني</h2>
    <form class="shadow mx-auto mb-4 p-4"
    style="width:40%; height: 700px;">
     <div class="mb-4">
         <h6 for="exampleInputEmail1"
                 class="form-label color1">
                 اسم المتبرع
         </h6>
         <input type="text"
                 class="form-control bgColor5">
     </div>
     <div class="mb-4">
         <h6 for="exampleInputPassword1"
                 class="form-label color1">
                 البريد الالكتروني
         </h6>
         <input type="password"
                 class="form-control bgColor5"
                 id="exampleInputPassword1">
     </div>
     <div class="mb-4">
        <h6 for="exampleInputEmail1"
                class="form-label color1">
                 رقم الجوال
        </h6>
        <input type="phone"
                class="form-control bgColor5">
    </div>
    <div class="mb-4">
        <h6 for="exampleInputEmail1"
                class="form-label color1">
                المنطقة
        </h6>
        <input type="text"
                class="form-control bgColor5">
    </div>
    <div class="mb-4">
        <h6 for="exampleInputEmail1"
                class="form-label color1">
                الحي
        </h6>
        <input type="text"
                class="form-control bgColor5">
    </div>
    <div class="mb-4">
        <h6 for="exampleInputEmail1"
                class="form-label color1">
                تفاصيل التبرع
        </h6>
        <textarea class="form-control bgColor5"
                  aria-label="تفاصيل التبرع">
        </textarea>
    </div>
    <div class="row justify-content-md-center">
        <button type="submit"
                class="col-md-6 btn text-white bgColor1">
        تسجيل الدخول
        </button>
    </div>
</form>
</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop