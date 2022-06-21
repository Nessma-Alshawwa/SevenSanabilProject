@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:اللجان -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  تعديل بيانات اللجان  </h6>
            </div>
            <div class="card-body">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تم التعديل بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشل تعديل اللجنة</div>
                    @endif
                @endif
                <div class="row">
                    <div class="col-8 form-inner-cont">
                        <form action="{{ URL('/dashboard/committee/update/' . $committee->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label" id="lable_name">اسم اللجنة</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="اسم اللجنة" value="{{ $committee->name }}" >
                            </div>
                            <div class="form-group">
                                <label for="location" class="col-form-label" id="lable_location">المنطقة</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="المنطقة" value="{{ $committee->location }}" >
                            </div>
                            <div class="form-group">
                                <label for="manager" class="col-form-label" id="lable_manager">مدير اللجنة</label>
                                <input type="text" class="form-control" id="manager" name="manager" placeholder="مدير اللجنة" value="{{ $committee->manager }}" >
                            </div>
                            <div class="form-group">
                                <label for="description">الوصف</label>
                                <textarea class="form-control" id="description" name="description" rows="7">{{ $committee->description }}</textarea>
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
