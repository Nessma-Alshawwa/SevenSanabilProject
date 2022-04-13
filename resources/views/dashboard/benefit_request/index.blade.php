@extends('dashboard.layout.main')
@section('MainContent')



  <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- TABLE: donations-->
            <div class="card">
                <div class="card-header text-white" style="background-color: #28a745;">
                    <i class="nav-icon ion ion-android-cart"></i>
                    <span>طلبات الإستفادة</span>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <table class="table m-0" >
                        <thead style="color: #19692b;">
                            <tr>
                                <th style="color: #046306;">رقم التبرع</th>
                                <th>رقم الهوية</th>
                                <th>الكمية المطلوبة</th>
                                <th>الحالة</th>
                                <th>التفاصيل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($BenefitRequests as $BenefitRequest)
                                <tr>
                                    <td><a href="{{ URL('/dashboard/donation_request/'. $BenefitRequest->donation_request_id ) }}" style="color: #23903c;">{{ $BenefitRequest->donation_request_id	}}</a></td>
                                    @foreach ($BenefitRequest->Beneficiaries as $Beneficiary)
                                        @if ( $BenefitRequest->beneficiry_id == $Beneficiary->id)
                                            <td>{{ $Beneficiary->national_id }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $BenefitRequest->quantity }}</td>
                                    {{-- <td><span class="badge badge-success">مقبول</span></td> --}}
                                    <td><span class="badge badge-warning">قيد الانتظار</span></td>
                                    {{-- <td><span class="badge badge-danger">مرفوض</span></td> --}}
                                    {{-- <td><span class="badge badge-info">تتم المعالجة</span></td> --}}
        
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@stop