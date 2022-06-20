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
                        <div class="alert alert-success">تم التعديل بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشل تعديل المستخدم</div>
                    @endif
                @endif
                <div class="row">
                    <div class="col-8 form-inner-cont">
                        <form action="{{ URL("/dashboard/profile/update/" . $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label" id="lable_name">اسم المستخدم</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المستخدم" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label" id="lable_email">البريد الإلكتروني</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label" id="lable_image">الصورة الشخصية</label>
                                <input type="file" name="image" class="form-control image" id="formFile" />
                            </div>
                            <div class="form-group" id="level">
                                <label for="message-text" class="col-form-label" id="label_user_level">المستوى</label>
                                <select class="form-control custom-select" name="user_level_id" id="user_level_id" disabled>
                                    <option value="" class="text-secondary" selected>المستوى</option>
                                    @foreach ($levels as $level)
                                        @if (Auth::user()->user_level_id == 3)
                                            @if ($level->id == 3)
                                                <option value="{{ $level->id }}" @if ($user->user_level_id == $level->id)
                                                    selected
                                                @endif>
                                                {{ $level->name }}</option>
                                            @endif
                                        @elseif (Auth::user()->user_level_id == 2)
                                            @if ($level->id > 1 )
                                                <option value="{{ $level->id }}" @if ($user->user_level_id == $level->id)
                                                    selected
                                                @endif>
                                                {{ $level->name }}</option>
                                            @endif   
                                        @else
                                            <option value="{{ $level->id }}" @if ($user->user_level_id == $level->id)
                                                    selected
                                                @endif>
                                                {{ $level->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="role">
                                <label for="message-text" class="col-form-label" id="role_id">دور المستخدم</label>
                                <select class="form-control custom-select" name="role_id" id="role_id" disabled>
                                    <option value="" class="text-secondary" selected>دور المستخدم</option>
                                    @foreach ($roles as $role)
                                        @foreach ($user_roles as $user_role)
                                            @if (Auth::user()->user_level_id == 3)
                                                @if ($role->user_level_id == 3)
                                                    <option value="{{ $role->id }}" @if ($user_role == $role->name)
                                                        selected
                                                    @endif >
                                                    {{ $role->name }}</option>
                                                @endif
                                            @elseif (Auth::user()->user_level_id == 2)
                                                @if ($role->user_level_id > 1 )
                                                    <option value="{{ $role->id }}" @if ($user_role == $role->name)
                                                        selected
                                                    @endif >
                                                    {{ $role->name }}</option>
                                                @endif   
                                            @else
                                                <option value="{{ $role->id }}" @if ($user_role == $role->name)
                                                        selected
                                                    @endif >
                                                    {{ $role->name }}</option>
                                            @endif
                                        @endforeach
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
                                <select class="form-control custom-select" name="donor_id" disabled>
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
                    <div class="col-lg-4 justify-content-center">
                        @isset($user->profile_photo_path)
                            <img class="card-img-bottom d-block radius-image-full" src="{{ asset($user->profile_photo_path) }}" alt="صورة المستخدم">  
                            <p class="text-center font-weight-bold">الصورة الشخصية</p>
                        @endisset
                    </div>
                </div>
                
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
