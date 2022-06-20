@extends('Website.layouts.main')
@section('MainContent')
<!-- ----------------------------------------------------------------------------------------- -->
<div class="container-fluid">
    <h1 class="text-center mt-4 mb-4 color1">
        تسجيل الدخول
    </h1>
    <form class="shadow mx-auto mb-4 p-4 text-right"
            style="width:40%; height: 400px;">
        <div class="mb-4">
            <h6 for="exampleInputEmail1"
                    class="form-label color1">
                أسم المستخدم أو البريد *
            </h6>
            <input type="email"
                    class="form-control bgColor5">
        </div>
        <div class="mb-4">
            <h6 for="exampleInputPassword1"
                    class="form-label color1">
                كلمة السر*
            </h6>
            <input type="password"
                    class="form-control bgColor5"
                    id="exampleInputPassword1">
        </div>
        <div class="mb-4 form-check">
            <input
                    type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1">
            <label class="form-check-label color1 px-4"
                    for="exampleCheck1">
                    تذكرني
            </label>
        </div>
        <div class="mb-4">
            <a href="#" class="color2 col-md-12">
                هل نسيت كلمة السر؟
           </a>
        </div>
        <div class="mb-4 text-center">
            
            <button type="submit"
                        class="btn text-white bgColor1 w-50 ">
                        تسجيل الدخول
            </button>
        </div>
    </form>
</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop