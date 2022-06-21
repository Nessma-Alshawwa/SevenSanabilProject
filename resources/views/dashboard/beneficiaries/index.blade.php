@extends('dashboard.layout.main')
@section('MainContent')

  <!-- body -->
   <!-- Main content -->
   <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header text-white" style="background-color: #28a745;">
            <h6> حالة المستفيدين</h6>
        </div>
      <div class="card-body p-0">
        @foreach($errors->all() as $message)
            <div class="alert alert-danger m-3">{{$message}}</div>
        @endforeach
        @if (session()->has('add_status'))
            @if (session('add_status'))
                <div class="alert alert-success m-3">تم التعديل بنجاح</div>
            @else
                <div class="alert alert-danger m-3">فشل تعديل المستفيد</div>
            @endif
        @endif
        <table class="table table-striped projects">
            <thead style="color: #19692b;">
                <tr>
                    <th style="width: 5%">
                        #
                    </th>
                    <th >
                        اسم المستفيد
                    </th>
                    <th >
                        رقم الهوية
                    </th>
                    {{-- <th>
                        نسبة الاستفادة
                    </th> --}}
                    <th >
                        الإجراءات
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Beneficiaries as $benficiary)
                    <tr>
                        <td>
                            {{ $i++}}
                        </td>
                        <td>
                            <a>
                                {{ $benficiary->name}}
                            </a>
                            <br/>
                            <small>
                                {{ date('d-m-Y', strtotime($benficiary->created_at)) }}
                            </small>
                        </td>
                        <td>
                            <a href="#" style="color: #23903c;">{{ $benficiary->national_id }}</a>
                        </td>
                        {{-- <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                                    <small>
                                        57% Complete
                                    </small>
                                </div>
                            </div>
                            
                        </td> --}}
                        <td class="project-actions">
                            <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#display{{ $benficiary->id }}" data-whatever="@getbootstrap" data-value="{{ $benficiary->id }}" class="btn btn-primary btn-sm show-benficiary" >
                                <i class="fas fa-folder">
                                </i>
                                فحص
                            </a>
                                <div class="modal fade" id="display{{ $benficiary->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title" id="exampleModalLabel">معلومات المستفيد</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped projects text-center">
                                                    <tr>
                                                        <th style="width: 40%; color: #19692b;" class="table-active">اسم المستفيد</th>
                                                        <td>{{ $benficiary->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 40%; color: #19692b;" class="table-active">رقم الجوال</th>
                                                        <td>{{ $benficiary->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 40%; color: #19692b;" class="table-active">رقم الهوية</th>
                                                        <td>{{ $benficiary->national_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 40%; color: #19692b;" class="table-active">عدد أفراد الأسرة</th>
                                                        <td>{{ $benficiary->family_member }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 40%; color: #19692b;" class="table-active">الدخل الشهري</th>
                                                        <td>{{ $benficiary->income }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 40%; color: #19692b;" class="table-active">تابع للجنة زكاة</th>
                                                        <td>{{ $benficiary->Committee->name }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            <a class="btn btn-info btn-sm" href={{ URL('/dashboard/beneficiary/edit/'. $benficiary->id ) }}>
                                <i class="fas fa-pencil-alt">
                                </i>
                                تعديل
                            </a>
                        </td>
                    </tr>  
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>    

<!-- ./wrapper -->
@stop