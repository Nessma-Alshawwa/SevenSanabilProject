@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:اللجان -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  إضافة لجنة جديدة </h6>
            </div>
            <div class="card-body px-5">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تمت الإضافة بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشلت إضافة اللجنة</div>
                    @endif
                @endif
                <form action="{{ URL('/dashboard/committee/store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label" id="lable_name">اسم اللجنة</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="اسم اللجنة">
                    </div>
                    <div class="form-group">
                        <label for="location" class="col-form-label" id="lable_location">المنطقة</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="المنطقة">
                    </div>
                    <div class="form-group">
                        <label for="manager" class="col-form-label" id="lable_manager">مدير اللجنة</label>
                        <input type="text" class="form-control" id="manager" name="manager" placeholder="مدير اللجنة">
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success" id="save-button">إضافة</button>
                </form>
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@stop