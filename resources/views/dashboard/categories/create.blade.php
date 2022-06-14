@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:التصنيفات -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  إضافة تصنيف جديدة </h6>
            </div>
            <div class="card-body px-5">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تمت الإضافة بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشلت إضافة التصنيف</div>
                    @endif
                @endif
                <form action="{{ URL('/dashboard/category/store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label" id="lable_name">اسم التصنيف</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="اسم التصنيف">
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label" id="lable_image">إضافة صورة للتصنيف</label>
                        <input type="file" name="image" class="form-control image" id="formFile" accept=".png, .jpg, .jpeg" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label" id="label_parent">تابع لأي تصنيف؟!</label>
                        <select class="form-control custom-select" name="parent_id" id="parent_id">
                            <option value="" class="text-secondary" selected>التصنيف</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" class="text-secondary">{{$category->name}}</option>
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

@stop