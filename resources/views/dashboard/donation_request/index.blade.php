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
                    <table class="table m-0" >
                        <thead style="color: #19692b;">
                            <tr>
                                <th style="width: 4%">
                                    #
                                </th>
                                <th style="width: 15%">
                                    اسم الطلب 
                                </th>
                                <th style="width: 20%">
                                    صورة التبرع 
                                </th>
                                <th style="width: 20%">
                                    وصف التبرع 
                                </th>
                                <th style="width: 20%">
                                    الكمية 
                                </th>
                                <th style="width: 20%">
                                    الكمية المتاحة 
                                </th>
                                <th style="width: 20%">
                                    الحالة 
                                </th>
                                <th style="width: 20%">
                                    الإجراءات
                                </th>
                            </tr>
                        </thead>
                            <tbody class="text-center">
                            
                    
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