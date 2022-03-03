@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:المستخدمين -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  تعديل بيانات المستخدم  </h6>
            </div>
            <div class="card-body">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تمت التعديل بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشل تعديل المستخدم</div>
                    @endif
                @endif
                <div class="row">
                    <div class="col-8 form-inner-cont">
                        <form action="{{ URL("/dashboard/user/update/" . $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label" id="lable_name">اسم المستخدم</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المستخدم" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label" id="lable_email">البريد الإلكتروني</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label" id="lable_password">كلمة المرور</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور">
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label" id="lable_image">الصورة الشخصية</label>
                                <input type="file" name="image" class="form-control image" id="formFile" />
                            </div>
                            <div class="form-group" id="role">
                                <label for="message-text" class="col-form-label" id="label_user_level">دور المستخدم</label>
                                <select class="form-control custom-select" name="user_level_id">
                                    <option value="" class="text-secondary">دور المستخدم</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}" @if ($user->user_level_id == $level->id)
                                            selected
                                        @endif>
                                        {{ $level->name }}</option>
                                    @endforeach
                                </select>
                            
                            </div>
                            <div class="form-group" id="committee">
                                <label for="message-text" class="col-form-label" id="label_committee">تابع للجنة زكاة</label>
                                <select class="form-control custom-select" name="committee_id">
                                    <option value="" class="text-secondary">تابع للجنة زكاة</option>
                                    @foreach ($committees as $committee)
                                        <option value="{{ $committee->id }}" @if ($user->committee_id == $committee->id)
                                            selected
                                        @endif>
                                        {{ $committee->name }}</option>
                                    @endforeach
                                </select>
                            
                            </div>
                            <div class="form-group" id="donor">
                                <label for="message-text" class="col-form-label" id="label_donor">المتبرع</label>
                                <select class="form-control custom-select" name="donor_id">
                                    <option value="" class="text-secondary">المتبرع</option>
                                    @foreach ($donors as $donor)
                                        <option value="{{ $donor->id }}" @if ($user->donor_id == $donor->id)
                                            selected
                                        @endif>
                                        {{ $donor->name }}</option>
                                    @endforeach
                                </select>
                            
                            </div>
                            <button class="btn btn-success" id="save-button">تعديل</button>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        @isset($user->profile_photo_path)
                            <img class="card-img-bottom d-block radius-image-full" src="{{ asset($user->profile_photo_path) }}" alt="صورة المستخدم">  
                        @endisset
                    </div>
                </div>
                
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@stop