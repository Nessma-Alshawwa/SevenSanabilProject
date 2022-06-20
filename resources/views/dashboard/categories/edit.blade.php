@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:التصنيفات -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  تعديل بيانات التصنيف  </h6>
            </div>
            <div class="card-body">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تم التعديل بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشل تعديل التصنيف</div>
                    @endif
                @endif
                <div class="row">
                    <div class="col-8 form-inner-cont">
                        <form action="{{ URL('/dashboard/category/update/' . $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label" id="lable_name">اسم التصنيف</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="اسم التصنيف" value="{{ $category->name }}" >
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label" id="lable_image">إضافة صورة للتصنيف</label>
                                <input type="file" name="image" class="form-control image" id="formFile" accept=".png, .jpg, .jpeg" />
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label" id="label_parent">تابع لأي تصنيف؟!</label>
                                <select class="form-control custom-select" name="parent_id" id="parent_id">
                                    <option value="" class="text-secondary" selected>التصنيف</option>
                                    @foreach ($categories as $category_parent)
                                        <option value="{{$category_parent->id}}" class="text-secondary" @if ($category->parent_id == $category_parent->id)
                                            selected
                                        @endif>{{$category_parent->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success" id="save-button">تعديل</button>
                        </form>
                    </div>
                    <div class="col-lg-4 justify-content-center">
                        {{-- @isset($category->image) --}}
                            <img class="card-img-bottom d-block radius-image-full" src="{{ asset('app/'.$category->image) }}" alt="صورة التصنيف">  
                        {{-- @endisset --}}
                    </div>
                </div>
                
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>


@stop
