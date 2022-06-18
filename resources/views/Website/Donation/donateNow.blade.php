@extends('Website.layouts.main')
@section('MainContent')
<div class="container">
        <h2 class="text-center color1 my-5">إضافة تبرع عيني </h2>
        @foreach($errors->all() as $message)
                <div class="alert alert-danger text-right">{{$message}}</div>
        @endforeach
        @if (session()->has('add_status'))
                @if (session('add_status'))
                <div class="alert alert-success text-right">تمت الإضافة بنجاح</div>
                @else
                <div class="alert alert-danger text-right">فشلت إضافة المستخدم</div>
                @endif
        @endif
        <form class="shadow mx-auto my-5 p-4 text-right" action="{{ URL('DonateNowRequest') }}" method="post">
                @csrf
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
                <div class="row justify-content-md-center">
                        <button type="submit" class="col-md-6 btn text-white bgColor1"> 
                                تبرع 
                        </button>
                </div>
        </form>
</div>
@stop