@extends('dashboard.layout.main')
@section('MainContent')
<!-- Main content -->
    <section class="content">

        <!-- Table:المستفيدين -->
        <div class="card">
            <div class="card-header text-white bg-basic-light-color">
                <h6>  تعديل بيانات المستفيد  </h6>
            </div>
            <div class="card-body">
                @foreach($errors->all() as $message)
                    <div class="alert alert-danger">{{$message}}</div>
                @endforeach
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">تم التعديل بنجاح</div>
                    @else
                        <div class="alert alert-danger">فشل تعديل المستفيد</div>
                    @endif
                @endif
                <div class="row">
                    <div class="col-8 form-inner-cont">
                        <form action="{{ URL('/dashboard/beneficiary/update/' . $beneficiary->id ) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label" id="lable_name">اسم المستفيد</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المستفيد" value="{{ $beneficiary->name }}">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label" id="lable_name">رقم الجوال </label>
                                <input type="number" class="form-control" name="phone" placeholder="رقم الجوال" value="{{ $beneficiary->phone }}" >
                            </div>
                            <div class="form-group">
                                <label for="national_id" class="col-form-label" id="lable_name">رقم الهوية</label>
                                <input type="number" class="form-control" name="national_id" placeholder="رقم الهوية" value="{{ $beneficiary->national_id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="family_member" class="col-form-label" id="lable_name">عدد أفراد العائلة</label>
                                <input type="number" class="form-control" name="family_member" placeholder="عدد أفراد العائلة" value="{{ $beneficiary->family_member }}">
                            </div>
                            <div class="form-group">
                                <label for="income" class="col-form-label" id="lable_name">الدخل الشهري</label>
                                <input type="number" class="form-control" name="income" placeholder="الدخل الشهري" value="{{ $beneficiary->income }}">
                            </div>
                            <div class="form-group" id="committee">
                                <label for="message-text" class="col-form-label" id="label_committee">تابع للجنة زكاة</label>
                                <select class="form-control custom-select" name="committee_id">
                                    <option value="" class="text-secondary">تابع للجنة زكاة</option>
                                    @foreach ($committees as $committee)
                                        <option value="{{ $committee->id }}" @if ($beneficiary->committee_id == $committee->id)
                                            selected
                                        @endif>
                                        {{ $committee->name }}</option>
                                    @endforeach
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
