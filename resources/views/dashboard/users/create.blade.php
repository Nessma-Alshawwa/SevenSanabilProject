@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:المستخدمين -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  إضافة مستخدم جديد </h6>
            </div>
            <div class="card-body px-5">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تمت الإضافة بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشلت إضافة المستخدم</div>
                    @endif
                @endif
                <form action="{{ URL("/dashboard/user/store") }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label" id="lable_name">اسم المستخدم</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="اسم المستخدم">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label" id="lable_email">البريد الإلكتروني</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label" id="lable_password">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور">
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label" id="lable_image">الصورة الشخصية</label>
                        <input type="file" name="image" class="form-control image" id="formFile" />
                    </div>
                    <div class="form-group" id="level">
                        <label for="message-text" class="col-form-label" id="label_user_level">المستوى</label>
                        <select class="form-control custom-select" name="user_level_id" id="user_level_id">
                            <option value="" class="text-secondary" selected>المستوى</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">
                                {{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="role">
                        <label for="message-text" class="col-form-label" id="role_id">دور المستخدم</label>
                        <select class="form-control custom-select" name="role_id" id="role_id">
                            <option value="" class="text-secondary" selected>دور المستخدم</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                {{ $role->name }}</option>
                            @endforeach
                        </select>
                    
                    </div>
                    <div class="form-group" id="committee">
                        <label for="message-text" class="col-form-label" id="label_committee">تابع للجنة زكاة</label>
                        <select class="form-control custom-select" name="committee_id">
                            <option value="" class="text-secondary" selected>تابع للجنة زكاة</option>
                            @foreach ($committees as $committee)
                                <option value="{{ $committee->id }}">
                                {{ $committee->name }}</option>
                            @endforeach
                        </select>
                    
                    </div>
                    <div class="form-group" id="donor">
                        <label for="message-text" class="col-form-label" id="label_donor">المتبرع</label>
                        <select class="form-control custom-select" name="donor_id">
                            <option value="" class="text-secondary" selected>المتبرع</option>
                            @foreach ($donors as $donor)
                                <option value="{{ $donor->id }}">
                                {{ $donor->name }}</option>
                            @endforeach
                        </select>
                    
                    </div>
                    <button class="btn btn-success" id="save-button">إضافة</button>
                </form>
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    @push('js')

    <script>
        $(document).ready(function () {
            $("#user_level_id").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    $('#committee').hide();
                    $('#donor').hide();
                    if(optionValue == 2 ){
                        $('#committee').show();
                        $('#donor').hide();
                    }else if(optionValue == 3 ){
                        $('#committee').show();
                        $('#donor').show();
                    }
                });
            }).change();
            
        })
    </script>
    @endpush

@stop