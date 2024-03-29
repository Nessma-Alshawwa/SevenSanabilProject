@extends('dashboard.layout.main')
@section('MainContent')
  <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- TABLE: donationRequests-->
            <div class="card">
                <div class="card-header text-white" style="background-color: #28a745;">
                    <i class="nav-icon ion ion-android-cart"></i>
                    <span>طلبات التبرع</span>
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

                    @can('Add new Donation')
                        <a type="button" class="btn btn-success m-2" href="{{ URL('/dashboard/DonateNow') }}" id="createNewUser">إضافة تبرع عيني جديدة</a>
                    @endcan
                    <div class="table-responsive">
                    <table class="table m-0" >
                        <thead style="color: #19692b;">
                            <tr>
                                <th style="width: 4%">#</th>
                                <th style="width: 15%">طلب التبرع</th>
                                @can('View Donors')
                                <th style="width: 15%">رقم الهوية</th>
                                @endcan
                                <th style="width: 15%">صورة للطلب</th>
                                {{-- <th style="width: 10%">الفئة</th> --}}
                                <th style="width: 10%">الكمية</th>
                                <th style="width: 10%">الحالة</th>
                                @can('Edit Donation Action')
                                    
                                <th style="width: 20%">الإجراءات</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DonationRequests as $DonationRequest)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="#donation_request{{ $DonationRequest->id }}" data-value="{{ $DonationRequest->id }}" style="color: #23903c;">{{ $DonationRequest->title	}}</a></td>
                                    <div class="modal fade bd-example-modal-lg" id="donation_request{{ $DonationRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
                                                          <div class="row border justify-content-center">
                                                            <img src="{{ asset('app/'.$DonationRequest->image) }}" height="300px" alt="donation Image">
                                                          </div>
                                                          <div class="row border">
                                                            <div class="col-md-4 border"><h6 style="color: #19692b;">العنوان</h6>
                                                                </div>
                                                            <div class="col-md-8"><p>{{ $DonationRequest->title }}</p></div>
                                                          </div>
                                                          
                                                          <div class="row border">
                                                            <div class="col-md-4 border"><h6 style="color: #19692b;">الكمية المتاحة</h6>
                                                                </div>
                                                            <div class="col-md-8"><p>{{ $DonationRequest->available_quantity }}</p></div>
                                                          </div>
                                                          
                                                          <div class="row border">
                                                            <div class="col-md-4 border"><h6 style="color: #19692b;">الوصف</h6>
                                                                </div>
                                                            <div class="col-md-8"><p>{{ $DonationRequest->description }}</p></div>
                                                          </div>

                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    @can('View Donors')
                                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="#Donor{{ $DonationRequest->id }}" data-value="{{ $DonationRequest->id }}" data-whatever="@getbootstrap" style="color: #23903c;">{{ $DonationRequest->Donors->national_id }}</a></td>
                                    <div class="modal fade bd-example-modal-lg" id="Donor{{ $DonationRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title" id="exampleModalLabel">معلومات المتبرع</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid border">
                                                    @foreach ($Donors as $donor)
                                                        @if ($donor->id == $DonationRequest->donor_id )
                                                            <div class="row border">
                                                            <div class="col-md-4 border"><h6 style="color: #19692b;">اسم المتبرع</h6>
                                                                </div>
                                                            <div class="col-md-8"><p>{{ $donor->name }}</p></div>
                                                            </div>
                                                            
                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">رقم الجوال</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $donor->phone }}</p></div>
                                                            </div>
                                                            
                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">رقم الهوية</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $donor->national_id }}</p></div>
                                                            </div>
                                                            <div class="row border">
                                                                <div class="col-md-4 border"><h6 style="color: #19692b;">تابع للجنة زكاة</h6>
                                                                </div>
                                                                <div class="col-md-8"><p>{{ $donor->Committee->name }}</p></div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                    <td>
                                        <img src="{{ asset('app/'. $DonationRequest->image) }}" class="w-50" alt="donation Image">
                                    </td>
                                    <td>{{ $DonationRequest->available_quantity }}</td>
                                    <!-- <td>{{ $DonationRequest->QuantitiesSpent->sum('amount_spent') }}</td>
                                    <td>{{ $DonationRequest->available_quantity }}</td> -->
                                    <td><span class="badge {{ $DonationRequest->status == 0 ? 'badge-danger' : ( $DonationRequest->status == 1 ? 'badge-success' : ( $DonationRequest->status == 2 ? 'badge-warning' : ( $DonationRequest->status == 3 ? 'badge-info' : ( $DonationRequest->status == 4 ? 'badge-secondary' : '' ) ) ) ) }}">{{ config('constance.donationRequest_status.' .$DonationRequest->status) }}</span></td>
                                    @can('Edit Donation Action')
                                    <td>
                                        <div class="row justify-content-center">
                                            <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#add_image{{ $DonationRequest->id }}" data-value="{{ $DonationRequest->id }}" data-whatever="@getbootstrap" class="btn btn-outline-success btn-sm m-2 col-md-9">
                                                <i class="fas fa-edit"></i>إضافة/تعديل صورة 
                                            </a>
                                            <div class="modal fade" id="add_image{{ $DonationRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title" id="exampleModalLabel">إضافة صورة للطلب</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{URL('/dashboard/donation_request/add_image/' . $DonationRequest->id) }}" method="POST" id="DonationRequestStatus-form" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="image" class="col-form-label" id="lable_image">صورة الطلب</label>
                                                                    <input type="file" name="image" class="form-control image" id="formFile" />
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">تأكيد</button>
                                                            </form>

                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        @if($DonationRequest->status == 2 )
                                            @can('Approve Donation Request')
                                                <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#display{{ $DonationRequest->id }}" data-whatever="@getbootstrap" data-value="{{ $DonationRequest->id }}" class="approvebutton btn btn-info btn-sm text-white m-2">
                                                    <i class="fas fa-check"></i>  موافقة
                                                </a>
                                            @endcan
                                            @can('Select Category to Donation Request')
                                                <div class="modal fade" id="display{{ $DonationRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success">
                                                                <h5 class="modal-title" id="exampleModalLabel">يجب إدخال بعض البيانات  !!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{URL('/dashboard/donation_request/approve_request/' . $DonationRequest->id) }}" method="POST" id="DonationRequestCategory-form">
                                                                    @csrf
                                                                    <label for="message-text" class="col-form-label" id="label_status">يجب إدخال فئة التبرع !!</label>
                                                                    <select class="form-control custom-select" name="category">
                                                                        <option value="" class="text-secondary">تحديد فئة التبرع</option>
                                                                        @foreach ($Categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                            {{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    <label for="message-text" class="col-form-label" id="label_status">يجب إدخال حالة التبرع !!</label>
                                                                    <select class="form-control custom-select" name="status" id="status">
                                                                        <option value="" class="text-secondary">تحديد الحالة</option>
                                                                        @foreach (config('constance.donationRequest_status') as $key => $value)
                                                                            @if ($key == 1 || $key > 2)
                                                                                <option value="{{ $key }}" @if ($DonationRequest->status == $key)
                                                                                    selected
                                                                                @endif>
                                                                                {{ $value }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <div id="quantity">
                                                                        <label for="message-text" class="col-form-label" id="label_status">يجب إدخال قيمة التبرع !!</label>
                                                                        <input class="w-100" type="number" min="1" name="quantity" placeholder="الكمية التي سيتم التبرع بها">
                                                                    </div>
                                                                    

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
                                                @else
                                                @can('Edit Status of Donation Request')
                                                <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#edit_status{{ $DonationRequest->id }}" data-whatever="@getbootstrap" data-value="{{ $DonationRequest->id }}" class="btn btn-primary btn-sm text-white m-2">
                                                    <i class="fas fa-edit"></i>  تعديل الحالة
                                                </a>
                                                <div class="modal fade" id="edit_status{{ $DonationRequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success">
                                                                <h5 class="modal-title" id="exampleModalLabel">تعديل حالة الطلب!!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{URL('/dashboard/donation_request/edit_status/' . $DonationRequest->id) }}" method="POST" id="DonationRequestStatus-form">
                                                                    @csrf
                                                                    {{-- <input type="hidden" name="id" value="{{ $DonationRequest->id }}"> --}}
                                                                    <label for="message-text" class="col-form-label" id="label_status">حالة الطلب</label>
                                                                    <select class="form-control custom-select" name="status">
                                                                        <option value="" class="text-secondary">تحديد الحالة</option>
                                                                        @foreach (config('constance.donationRequest_status') as $key => $value)
                                                                            @if ($key >= 1)
                                                                                <option value="{{ $key }}" @if ($DonationRequest->status == $key)
                                                                                    selected
                                                                                @endif>
                                                                                {{ $value }}</option>
                                                                            @endif
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
                                            @if($DonationRequest->status != 0)
                                                @can('Reject Donation Request')
                                                    <a href="javascript:void(0)" type="button" data-value="{{ $DonationRequest->id }}" class="rejectButton btn btn-danger btn-sm text-white m-2">
                                                        <i class="fas fa-trash"></i>  رفض
                                                    </a>
                                                @endcan
                                            @endif
                                        </div>
                                    </td>
                                    @endcan
                                    
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

                $('body').on('click', '.rejectButton', function () {
                    var id = $(this).attr('data-value');
                    var url = "{{url('/dashboard/donation_request/reject')}}";
                    console.log(id);
                    Rejectbutton(url, id);
                });
                $("#status").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    $('#quantity').hide();
                    if(optionValue == 1 || optionValue > 2){
                        $('#quantity').show();
                    }
                });
            }).change();
            });

        </script>
    @endpush
@stop