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
                    @foreach($errors->all() as $message)
                        <div class="alert alert-danger m-3">{{$message}}</div>
                    @endforeach
                    @if (session()->has('add_status'))
                        @if (session('add_status'))
                            <div class="alert alert-success m-3">تمت الموافقة على الطلب بنجاح</div>
                        @else
                            <div class="alert alert-danger m-3">فشلت الموافقة على الطلب</div>
                        @endif
                    @endif
                    <div class="table-responsive">
                    <table class="table m-0" >
                        <thead style="color: #19692b;">
                            <tr>
                                <th style="color: #046306; width: 10%">طلب التبرع</th>
                                <th style="width: 10%">رقم الهوية</th>
                                <th style="width: 10%">الكمية المطلوبة</th>
                                <th style="width: 10%">الكمية المصروفة</th>
                                <th style="width: 10%">الكمية المتبقية</th>
                                <th style="width: 10%">الحالة</th>
                                <th style="width: 20%">التفاصيل</th>
                                <th style="width: 20%">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($BenefitRequests as $BenefitRequest)
                                <tr>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#donation_request{{ $BenefitRequest->id }}" data-whatever="@getbootstrap" data-value="{{ $BenefitRequest->donation_request_id }}" style="color: #23903c;">{{ $BenefitRequest->DonationRequests->title	}}</a></td>
                                        @can('View Donation Requests')
                                            <div class="modal fade bd-example-modal-lg" id="donation_request{{ $BenefitRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title" id="exampleModalLabel">معلومات التبرع</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <div class="container-fluid border">
                                                                <div class="row border">
                                                                    <div class="col-md-4 border"><h6 style="color: #19692b;">العنوان</h6>
                                                                        </div>
                                                                    <div class="col-md-8"><p>{{ $BenefitRequest->DonationRequests->title }}</p></div>
                                                                </div>
                                                                
                                                                <div class="row border">
                                                                    <div class="col-md-4 border"><h6 style="color: #19692b;">الوصف</h6>
                                                                        </div>
                                                                    <div class="col-md-8"><p>{{ $BenefitRequest->DonationRequests->description }}</p></div>
                                                                </div>
                                                                
                                                                <div class="row border">
                                                                    <div class="col-md-4 border"><h6 style="color: #19692b;">الكمية</h6>
                                                                        </div>
                                                                    <div class="col-md-8"><p>{{ $BenefitRequest->DonationRequests->quantity }}</p></div>
                                                                </div>
                                                                
                                                                <div class="row border">
                                                                    <div class="col-md-4 border"><h6 style="color: #19692b;">الكمية المتاحة</h6>
                                                                        </div>
                                                                    <div class="col-md-8"><p>{{ $BenefitRequest->DonationRequests->available_quantity }}</p></div>
                                                                </div>
                                                                @foreach ($Donors as $donor)
                                                                    @if ($donor->id == $BenefitRequest->DonationRequests->donor_id )
                                                                        <div class="row border">
                                                                            <div class="col-md-4 border"><h6 style="color: #19692b;">بواسطة المتبرع</h6>
                                                                                </div>
                                                                            <div class="col-md-8"><p>{{ $donor->name }}</p></div>
                                                                        </div>    
                                                                        <div class="row border">
                                                                            <div class="col-md-4 border"><h6 style=" color: #19692b;">رقم هوية المتبرع</h6>
                                                                                </div>
                                                                            <div class="col-md-8"><p>{{ $donor->national_id }}</p></div>
                                                                        </div>    
                                                                    @endif
                                                                @endforeach
                                                                </div>
                                                            </div>
                                                            {{-- <table class="table projects text-center">
                                                                <tr>
                                                                    <th style="width: 40%; color: #19692b;" class="table-active">العنوان</th>
                                                                    <td>{{ $BenefitRequest->donation_requests->title }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 40%; color: #19692b;" class="table-active">الصورة</th>
                                                                    <td><img src="{{ asset($BenefitRequest->donation_requests->image) }}" class="img-circle elevation-2" alt="donation Image"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 40%; color: #19692b;" class="table-active">الوصف</th>
                                                                    <td>{{ $BenefitRequest->donation_requests->description }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 40%; color: #19692b;" class="table-active">الكمية</th>
                                                                    <td>{{ $BenefitRequest->donation_requests->quantity }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 40%; color: #19692b;" class="table-active">الكمية المتاحة</th>
                                                                    <td>{{ $BenefitRequest->donation_requests->available_quantity }}</td>
                                                                </tr>
                                                                @foreach ($Donors as $donor)
                                                                    @if ($donor->id == $BenefitRequest->donation_requests->donor_id )
                                                                        <tr>
                                                                            <th style="width: 40%; color: #19692b;" class="table-active">بواسطة المتبرع</th>
                                                                            <td>{{ $donor->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th style="width: 40%; color: #19692b;" class="table-active">رقم هوية المتبرع</th>
                                                                            <td>{{ $donor->national_id  }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </table> --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>  
                                        @endcan
                                        
                                    
                                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="#Beneficiary{{ $BenefitRequest->id }}" data-whatever="@getbootstrap" style="color: #23903c;">{{ $BenefitRequest->Beneficiaries->national_id }}</a></td>
                                    @can('View Beneficiaries')
                                        <div class="modal fade bd-example-modal-lg" id="Beneficiary{{ $BenefitRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success">
                                                        <h5 class="modal-title" id="exampleModalLabel">معلومات المستفيد</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid border">
                                                            <div class="row border">
                                                            <div class="col-md-4 border"><h6 style="color: #19692b;">اسم المستفيد</h6>
                                                                </div>
                                                            <div class="col-md-8"><p>{{ $BenefitRequest->Beneficiaries->name }}</p></div>
                                                            </div>
                                                            
                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">رقم الجوال</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $BenefitRequest->Beneficiaries->phone }}</p></div>
                                                            </div>
                                                            
                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">رقم الهوية</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $BenefitRequest->Beneficiaries->national_id }}</p></div>
                                                            </div>
                                                            
                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">عدد أفراد الأسرة</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $BenefitRequest->Beneficiaries->family_member }}</p></div>
                                                            </div>

                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">الدخل الشهري</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $BenefitRequest->Beneficiaries->income }}</p></div>
                                                            </div>
                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">تابع للجنة زكاة</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $BenefitRequest->Beneficiaries->Committee->name }}</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                    <td>{{ $BenefitRequest->required_quantity }}</td>
                                    <td>{{ $BenefitRequest->amount_spent }}</td>
                                    <td>{{ $BenefitRequest->remaining_quantity }}</td>
                                    <td><span class="badge {{ $BenefitRequest->status == 0 ? 'badge-danger' : ( $BenefitRequest->status == 1 ? 'badge-success' : ( $BenefitRequest->status == 2 ? 'badge-warning' : ( $BenefitRequest->status == 3 ? 'badge-info' : ( $BenefitRequest->status == 4 ? 'badge-secondary' : '' ) ) ) ) }}">{{ config('constance.benefitRequest_status.' .$BenefitRequest->status) }}</span></td>
                                    <td>{{ $BenefitRequest->description }}</td>
                                    <td>
                                        <div class="row justify-content-center">
                                            @if($BenefitRequest->status == 2 )
                                                @can('Approve Benefite Request')
                                                    <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#display{{ $BenefitRequest->id }}" data-whatever="@getbootstrap" data-value="{{ $BenefitRequest->id }}" class="approvebutton btn btn-info btn-sm text-white m-2">
                                                        <i class="fas fa-check"></i>  موافقة
                                                    </a>
                                                    @can('Add Quantity to Benefite Request')
                                                        <div class="modal fade" id="display{{ $BenefitRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-success">
                                                                        <h5 class="modal-title" id="exampleModalLabel">يجب إدخال الكمية التي سيتم التبرع بها؟!!</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{URL('/dashboard/benefit_request/add_quantity/' . $BenefitRequest->id) }}" method="POST" id="BenefitRequestQuantity-form">
                                                                            @csrf
                                                                            {{-- <input type="hidden" name="id" value="{{ $BenefitRequest->id }}"> --}}
                                                                            <input class="w-100" type="number" max="{{ $BenefitRequest->DonationRequests->available_quantity }}" min="1" name="quantity" placeholder="الكمية التي سيتم التبرع بها">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success">تأكيد</button>
                                                                        </form>

                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    @endcan
                                                @endcan
                                            @elseif($BenefitRequest->status != 0 )
                                                @can('Edit Status of Benefite Request')
                                                    <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#edit_status{{ $BenefitRequest->id }}" data-whatever="@getbootstrap" data-value="{{ $BenefitRequest->id }}" class="btn btn-primary btn-sm text-white m-2">
                                                        <i class="fas fa-edit"></i>  تعديل الحالة
                                                    </a>
                                                    <div class="modal fade" id="edit_status{{ $BenefitRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل حالة الطلب!!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{URL('/dashboard/benefit_request/edit_status/' . $BenefitRequest->id) }}" method="POST" id="BenefitRequestStatus-form">
                                                                        @csrf
                                                                        {{-- <input type="hidden" name="id" value="{{ $BenefitRequest->id }}"> --}}
                                                                        <label for="message-text" class="col-form-label" id="label_status">حالة الطلب</label>
                                                                        <select class="form-control custom-select" name="status">
                                                                            <option value="" class="text-secondary">تحديد الحالة</option>
                                                                            @foreach (config('constance.benefitRequest_status') as $key => $value)
                                                                                <option value="{{ $key }}" @if ($BenefitRequest->status == $key)
                                                                                    selected
                                                                                @endif>
                                                                                {{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success">تأكيد</button>
                                                                    </form>

                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endcan
                                            @endif
                                            @if($BenefitRequest->status != 0)
                                                @can('Reject Benefite Request')
                                                    <a href="javascript:void(0)" type="button" data-value="{{ $BenefitRequest->id }}" class="reject_benefit_request_button btn btn-danger btn-sm text-white m-2">
                                                        <i class="fas fa-trash"></i>  رفض
                                                    </a>
                                                @endcan
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

                $('body').on('click', '.reject_benefit_request_button', function () {
                    var id = $(this).attr('data-value');
                    var url = "{{url('/dashboard/benefit_request/reject')}}";
                    console.log(id);
                    Rejectbutton(url, id);
                });
            });

        </script>
    @endpush
@stop