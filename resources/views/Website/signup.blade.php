@extends('Website.layouts.main')
@section('MainContent')
<!-- ---------------------------------------------------------------------------------------- -->
<!-- body -->
<div class="container">
<h3 class="text-center color1">
    مستخدم جديد
</h3>
<form action="#" class="shadow p-4 mb-4">
    <div class="row">
        <div class="col-6 d-flex flex-column justify-content-center">
            <label class="text-center mb-4 color1">اسم المستخدم</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
        <div class="col-6 d-flex flex-column justify-content-center">
            <label class="text-center  mb-4 color1">البريد الاكتروني</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-6  d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">كلمة السر </label>
            <input type="password"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
        <div class="col-6 d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">تأكيد كلمة السر</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-6  d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">الاسم الاول</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
        <div class="col-6 d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">اسم لأب</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-6  d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">اسم العائلة</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
        <div class="col-6 d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">تاريخ الميلاد</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-6  d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">رقم الهوية</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
        <div class="col-6 d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">رقم الجوال</label>
            <input type="text"
                    style="height: 40px;width: 80%;"
                    class="form-control align-self-center bgColor5"
                    aria-describedby="passwordHelpInline"
                    >
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-6  d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">الجنس</label>
            <select class="form-select align-self-center rounded"
                    aria-label="Default select example"
                    style="height: 40px;width: 80%;">
                <option value="selected">أنثى</option>
                <option value="2">ذكر</option>
                </select>
        </div>
        <div class="col-6 d-flex flex-column justify-content-center">
            <label class="text-center mb-4 mt-4 color1">المنطقة</label>
            <select class="form-select align-self-center rounded"
                    aria-label="Default select example"
                    style="height: 40px;width: 80%;">                    
                <option value="selected">غزة</option>
                <option value="2">خانيونس</option>
                <option value="3">رفح</option>
                </select>
        </div>
    </div>
</form>
<div class="row justify-content-md-center mb-4">
    <button type="submit"
    class="btn text-white bgColor2"
    style="width: 15%;">
    تسجيل الدخول
</button>
</div>

</div>
<!-- ----------------------------------------------------------------------------------------- -->
@stop