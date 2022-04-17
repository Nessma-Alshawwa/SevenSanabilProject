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
                                <th style="color: #046306; width: 15%">طلب التبرع</th>
                                <th style="width: 15%">رقم الهوية</th>
                                <th style="width: 15%">الكمية المطلوبة</th>
                                <th style="width: 15%">الحالة</th>
                                <th style="width: 20%">التفاصيل</th>
                                <th style="width: 20%">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($BenefitRequests as $BenefitRequest)
                                <tr>
                                    <td><a href="{{ URL('/dashboard/donation_request/'. $BenefitRequest->donation_request_id ) }}" style="color: #23903c;">{{ $BenefitRequest->DonationRequests->title	}}</a></td>
                                    <td><a href={{ URL('/dashboard/beneficiary/'. $BenefitRequest->beneficiry_id ) }}>{{ $BenefitRequest->Beneficiaries->national_id }}</a></td>
                                    <td>{{ $BenefitRequest->quantity }}</td>
                                    <td><span class="badge {{ $BenefitRequest->status == 0 ? 'badge-danger' : ( $BenefitRequest->status == 1 ? 'badge-success' : ( $BenefitRequest->status == 2 ? 'badge-warning' : '' ) ) }}">{{ config('constance.status.' .$BenefitRequest->status) }}</span></td>
                                    <td>{{ $BenefitRequest->description }}</td>
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