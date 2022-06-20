@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:التصنيفات -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  إضافة تبرع عيني جديدة </h6>
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
                <form action="{{ URL('/dashboard/DonateNowRequest') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (Auth::user()->user_level_id == 3)
                        <input type="hidden"  name="national_id" value="{{ Auth::user()->Donors->national_id }}">
                        <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                                    نوع التبرع
                            </h6>
                            <input name="title" type="text" value="{{ old('title')}}" class="form-control " aria-label="" placeholder="نوع التبرع">
                    </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                                    الكمية
                            </h6>
                            <input name="quantity" value="{{ old('quantity')}}" type="number" class="form-control " aria-label="" placeholder="الكمية المتبرع بها">
                    </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                                    التفاصيل
                            </h6>
                            <textarea name="description" placeholder="يرجى ادخال تفاصيل طلب الاستفادة " class="form-control w-100" rows="10">{{ old('description') }}</textarea>
                    </div>
                    @else
                    <div class="mb-4">
                        <h6 for="exampleInputEmail1" class="form-label color1">
                        الاسم رباعي 
                        </h6>
                        <input type="text" name="name" value="{{ old('name')}}" class="form-control" placeholder="الاسم رباعي">
                    </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                            رقم الجوال
                            </h6>
                            <input type="string" name="phone" value="{{ old('phone')}}" class="form-control" placeholder="رقم الجوال" required>
                    </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                            رقم الهوية
                            </h6>
                            <input name="national_id" type="number" value="{{ old('national_id')}}" minlength="9" maxlength="9" class="form-control" placeholder="رقم الهوية">
                    </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                                    نوع التبرع
                            </h6>
                            <input name="title" type="text" value="{{ old('title')}}" class="form-control " aria-label="" placeholder="نوع التبرع">
                    </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                                    الكمية
                            </h6>
                            <input name="quantity" value="{{ old('quantity')}}" type="number" class="form-control " aria-label="" placeholder="الكمية المتبرع بها">
                    </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                            تابع للجنة زكاة
                            </h6>
                            <select class="form-control custom-select" name="committee_id">
                                <option value="" class="text-secondary">تابع للجنة زكاة</option>
                                @foreach ($committees as $committee)
                                    <option value="{{ $committee->id }}">
                                    {{ $committee->name }}</option>
                                @endforeach
                            </select>
                        
                        </div>
                    <div class="mb-4">
                            <h6 for="exampleInputEmail1" class="form-label color1 ">
                                    التفاصيل
                            </h6>
                            <textarea name="description" placeholder="يرجى ادخال تفاصيل طلب الاستفادة " class="form-control w-100" rows="10">{{ old('description') }}</textarea>
                    </div>
                    @endif
                    
                    <button class="btn btn-success" id="save-button">تبرع الآن</button>

                </form>
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@stop