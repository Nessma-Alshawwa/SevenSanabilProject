@extends('dashboard.layout.main')
@section('MainContent')
  <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- TABLE: donation_requests-->
            <div class="card">
                <div class="card-header text-white" style="background-color: #28a745;">
                    <i class="nav-icon ion ion-android-cart"></i>
                    <span>طلبات التبرع</span>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        {{-- {!! $dataTable->table([
                            'id' => 'dataTable',
                            'class'=> 'dataTable table-bordered table-striped projects basic-dark-color w-100'
                            ]) !!} --}}
                        <table id ="dataTable" class="table-bordered table-striped projects basic-dark-color w-100">
                        <thead style="color: #19692b;">
                            <tr>
                                <th style="width: 4%">#</th>
                                <th style="width: 15%">اسم الطلب</th>
                                <th style="width: 15%">صورة التبرع</th>
                                <th style="width: 15%">الحالة</th>
                                <th style="width: 10%">الكمية</th>
                                <th style="width: 10%">الكمية المتاحة</th>
                                <th style="width: 15%">التفاصيل</th>
                                <th style="width: 20%">الإجراءات</th>
                            </tr>
                        </thead>
                            <tbody  class="text-center">
                                @foreach ($DonationRequests as $DonationRequest)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            {{ $DonationRequest->title }}
                                        </td>
                                        <td>
                                            {{ $DonationRequest->image }}
                                        </td>
                                        <td>
                                            {{ config('constance.donationRequest_status.' . $DonationRequest->status) }}
                                        </td>
                                        <td>
                                            {{ $DonationRequest->quantity }}
                                        </td>
                                        <td>
                                            {{ $DonationRequest->available_quantity }}
                                        </td>
                                        <td>
                                            {{ $DonationRequest->description }}
                                        </td>
                                        <td class="project-actions text-right">
                                            <div class="row justify-content-center">
                                                @if($DonationRequest->status == 2 or $DonationRequest->status == 0)
                                                    <a href="javascript:void(0)" type="button" data-value="{{ $DonationRequest->id }}" class="approvebutton btn btn-info btn-sm text-white m-2">
                                                        <i class="fas fa-check"></i>  موافقة
                                                    </a>
                                                    <a href="javascript:void(0)" type="button" data-value="{{ $DonationRequest->id }}" class="rejectbutton btn btn-danger btn-sm text-white m-2">
                                                    <i class="fas fa-trash"></i>  رفض
                                                    </a>
                                                @endif
                                                @if($DonationRequest->status == 1)
                                                    <a href="javascript:void(0)" type="button" data-value="{{ $DonationRequest->id }}" class="shippingbutton btn btn-success btn-sm text-white m-2">
                                                        <i class="nav-icon ion ion-android-cart"></i> تم الشحن
                                                    </a>
                                                @endif
                                                @if($DonationRequest->status == 3)
                                                    <a href="javascript:void(0)" type="button" data-value="{{ $DonationRequest->id }}" class="deliverybutton btn btn-success btn-sm text-white m-2">
                                                        <i class="fas fa-check"></i> تم التسليم
                                                    </a>
                                                @endif
                                            </div>
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
    @push('js')
    <script>
        $(document).ready(function () {
            $('body').on('click', '.approvebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/donation_request/approve')}}";
                console.log(id);
                Approvebutton(url, id);
            });

            $('body').on('click', '.shippingbutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/donation_request/shipping')}}";
                console.log(id);
                Shippingbutton(url, id);
            });

            $('body').on('click', '.deliverybutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/donation_request/delivery')}}";
                console.log(id);
                Deliverybutton(url, id);
            });

            $('body').on('click', '.rejectbutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/donation_request/reject')}}";
                console.log(id);
                Rejectbutton(url, id);
            });
            
        });
    </script>
    
  @endpush
@stop