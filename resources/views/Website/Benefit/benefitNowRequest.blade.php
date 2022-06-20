@extends('Website.layouts.main')
@section('MainContent')
      <!-- ------------------------------------------------------------------------------------ -->
      <div class="container-fluid">
        <div class="container my-5">
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" style="font-size: 22px" id="benefitRequestShow-tab" data-toggle="tab" href="#benefitRequestShow" role="tab" aria-controls="benefitRequestShow" aria-selected="true">عرض الطلب</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="font-size: 22px" id="benefitRequest-tab" data-toggle="tab" href="#benefitRequest" role="tab" aria-controls="benefitRequest" aria-selected="false">تقديم طلب الاستفادة</a>
                </li>
            </ul>
        </div>
        
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="benefitRequestShow" role="tabpanel" aria-labelledby="benefitRequestShow-tab">
                <div class="container rounded shadow my-5 p-5">
                        <div class="row">
                                <div class="col-md-6 col-sm-12">
                                        <img src="{{ asset('app/'.$DonationRequest->image) }}" class="border border-success rounded shadow w-100" >
                                </div>
                                <div class="col-md-6 col-sm-12 card rounded shadow w-100">
                                        <div class="card-body text-right">
                                                <h5 class="card-title">{{ $DonationRequest->title }}</h5>
                                                @foreach ($DonationRequest->DonationCategory as $DonationCategory)
                                                        <h6 class="card-subtitle mb-2 text-muted"> التصنيف:
                                                                <a href="{{ URL('/categories/show/'. $DonationCategory->categories->id) }}" class="card-link">{{$DonationCategory->categories->name}}</a> 
                                                        </h6>
                                                @endforeach                                                
                                                
                                                <p class="card-text">{{ $DonationRequest->description }}</p>
                                        </div>
                                </div>
                        </div>
                </div>
            </div>
            <div class="tab-pane fade" id="benefitRequest" role="tabpanel" aria-labelledby="benefitRequest-tab">
                <div class="container">
                        <h2 class="text-center color1 mt-5">تقديم طلب استفادة</h2>
                        <form class="shadow mx-auto my-5 p-4 text-right" action="{{ URL('benefitNow/'.$DonationRequest->id) }}" method="post">
                                @csrf
                                <div class="mb-4">
                                        <h6 for="exampleInputEmail1" class="form-label color1">
                                        الاسم رباعي 
                                        </h6>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="الاسم رباعي">
                                </div>
                                <div class="mb-4">
                                        <h6 for="exampleInputEmail1" class="form-label color1 ">
                                        رقم الجوال
                                        </h6>
                                        <input type="string" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="رقم الجوال" required>
                                </div>
                                <div class="mb-4">
                                        <h6 for="exampleInputEmail1" class="form-label color1 ">
                                        رقم الهوية
                                        </h6>
                                        <input name="national_id" value="{{ old('national_id') }}" type="number" minlength="9" maxlength="9" class="form-control" placeholder="رقم الهوية">
                                </div>
                                <div class="mb-4">
                                        <h6 for="exampleInputEmail1" class="form-label color1 ">
                                        عدد أفراد العائلة
                                        </h6>
                                        <input type="number" name="family_member" value="{{ old('family_member') }}" class="form-control" placeholder="عدد أفراد العائلة">
                                </div>
                                <div class="mb-4">
                                        <h6 for="exampleInputEmail1" class="form-label color1 ">
                                                الدخل الشهري
                                        </h6>
                                        <input type="number" name="income" value="{{ old('income') }}" class="form-control " aria-label="" placeholder="الدخل الشهري">
                                </div>
                                <div class="mb-4">
                                        <h6 for="exampleInputEmail1" class="form-label color1 ">
                                                الكمية المحتاجة
                                        </h6>
                                        <input type="number" name="required_quantity" value="{{ old('required_quantity') }}" class="form-control " aria-label="" placeholder="الدخل الشهري">
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
                                <div class="row justify-content-md-center">
                                        <button type="submit" class="col-md-6 btn text-white bgColor1"> 
                                                تقديم طلب استفادة
                                        </button>
                                </div>
                        </form>
                </div>
            </div>
          </div>
    </div>

<!-- ----------------------------------------------------------------------------------------- -->
@stop