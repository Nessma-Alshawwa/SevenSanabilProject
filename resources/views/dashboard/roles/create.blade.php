@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:الادوارroles -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  إضافة دور جديد </h6>
            </div>
            <div class="card-body px-5">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تمت الإضافة بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشلت إضافة الدور</div>
                    @endif
                @endif
                <form action="{{ URL('/dashboard/role/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">

                    <div class="form-group">
                        <label for="name" class="col-form-label" id="lable_name">اسم الدور</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="اسم الدور">
                    </div>
                    <div class="form-group" >
                        <label for="message-text" class="col-form-label" id="label_user_level">المستوى</label>
                        <select class="form-control custom-select" name="user_level_id">
                            <option value="" class="text-secondary">المستوى</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">
                                {{ $level->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="committee">
                        <label for="message-text" class="col-form-label" id="label_committee">تابع للجنة زكاة</label>
                        <select class="form-control custom-select" name="committee_id">
                            <option value="" class="text-secondary">تابع للجنة زكاة</option>
                            @foreach ($committees as $committee)
                                <option value="{{ $committee->id }}">
                                {{ $committee->name }}</option>
                            @endforeach
                        </select>
                    
                    </div>
                    <div class="form-group" id="donor">
                        <label for="message-text" class="col-form-label" id="label_donor">المتبرع</label>
                        <select class="form-control custom-select" name="donor_id">
                            <option value="" class="text-secondary">المتبرع</option>
                            @foreach ($donors as $donor)
                                <option value="{{ $donor->id }}">
                                {{ $donor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="message-text" class="col-form-label" id="permission">الصلاحيات</label>
                        @foreach($permissions as $permission)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permission" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div><br>
                    <button class="btn btn-success" id="save-button">إضافة</button>
                </form>
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@stop