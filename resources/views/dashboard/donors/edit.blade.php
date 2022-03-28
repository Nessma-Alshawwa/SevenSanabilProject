@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:المتبرعين -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  تعديل بيانات المتبرع  </h6>
            </div>
            <div class="card-body">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تم التعديل بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشل تعديل بيانات المتبرع</div>
                    @endif
                @endif
                <div class="row">
                    <div class="col-8 form-inner-cont">
                        <form action="{{ URL("/dashboard/donor/update/" . $donor->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label" id="lable_name">اسم المتبرع</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المتبرع" value="{{ $donor->name }}">
                            </div>
                            <div class="form-group">
                                <label for="national_id" class="col-form-label" id="lable_national_id">رقم الهوية</label>
                                <input type="text" class="form-control" id="national_id" name="national_id" placeholder="رقم الهوية" value="{{ $donor->national_id }}">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label" id="lable_phone">رقم الجوال</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الجوال" value="{{ $donor->phone }}">
                            </div>
                            <div class="form-group" id="level">
                                <label for="message-text" class="col-form-label" id="label_status">الحالة</label>
                                <select class="form-control custom-select" name="status" id="status">
                                    <option value="" class="text-secondary" selected>الحالة</option>
                                    <option value="0" class="text-secondary">0</option>
                                    <option value="1" class="text-secondary">1</option>
                                    <option value="2" class="text-secondary">2</option>
                                </select>
                            </div>
                            <button class="btn btn-success" id="save-button">تعديل</button>
                        </form>
                    </div>
                </div>
                
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>


@stop
