@extends('dashboard.layout.main')
@section('MainContent')
  <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>١٥٠</h3>  
                  <p>أخر المستفيدين</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-people"></i>
                </div>
                <a href="beneficiaries.html" class="small-box-footer">معلومات أخرى<i class="fas fa-arrow-circle-left"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>٥٣</h3>  
                  <p>اخر المتبرعين</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-people"></i>
                </div>
                <a href="doners.html" class="small-box-footer">معلومات أخرى<i class="fas fa-arrow-circle-left"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning text-white">
                <div class="inner">
                  <h3>٤٤</h3> 
                  <p>الزيارات</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer"><span class="text-white">معلومات أخرى</span><i class="fas fa-arrow-circle-left text-white"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>٦٥</h3>
  
                  <p>التبرعات المتوفرة حاليا</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="donations.html" class="small-box-footer">معلومات أخرى<i class="fas fa-arrow-circle-left"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
  <!-- Main row -->
  <!-- First chart -->
      <div class="row">
          <!-- Left col -->
          <section class="col-6">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header d-flex p-0" style="background-color: #28a745;">
                <h3 class="card-title p-3 text-white">
                  <i class="fas fa-chart-pie mr-1" ></i>
                  التبرعات
                </h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item">
                    <a  href="#revenue-chart" data-toggle="tab"
                    class="text-white">مساحة</a>
                  </li>
                  <li class="nav-item">
                    <a class="p-3 text-white" href="#sales-chart" data-toggle="tab"
                    > تمثيل دائري</a>
                  </li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>   
                      <div id="sparkline-1"></div>
                      <div id="sparkline-2"></div>
                      <div id="sparkline-3"></div>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>  

                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
            <!-- /.card -->
            
  <!-- Second chart -->
            <section class="col-6">
              <!-- USERS LIST -->
              <div class="card">
                <div class="card-header text-white"  style="background-color: #28a745">
                  <i class="nav-icon ion ion-ios-people"></i>
                  <span>اخر المتبرعين المسجلين</span>
              </div>

                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#"  style="color: #19692b;">مستخدم</a>
                      <span class="users-list-date" >اليوم</span>
                    </li>
                    <li>
                      <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#" style="color: #19692b;">مستخدم</a>
                      <span class="users-list-date">اليوم</span>
                    </li>
                    <li>
                      <img src="{{ asset('dist/img/user7-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#" style="color: #19692b;">مستخدم</a>
                      <span class="users-list-date">اليوم</span>
                    </li>
                    <li>
                      <img src="{{ asset('dist/img/user6-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#" style="color: #19692b;">مستخدم</a>
                      <span class="users-list-date">اليوم</span>
                    </li>
                    <li>
                      <img src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#" style="color: #19692b;">مستخدم</a>
                      <span class="users-list-date">اليوم</span>
                    </li>
                    <li>
                      <img src="{{ asset('dist/img/user5-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#" style="color: #19692b;">مستخدم</a>
                      <span class="users-list-date">اليوم</span>
                    </li>
                    <li>
                      <img src="{{ asset('dist/img/user4-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#" style="color: #1b842c;">مستخدم</a>
                      <span class="users-list-date">اليوم</span>
                    </li>
                    <li>
                      <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Image">
                      <a class="users-list-name" href="#" style="color: #1b842c;">مستخدم</a>
                      <span class="users-list-date">اليوم</span>
                    </li>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="doners.html" class="btn btn-sm float-right text-white"
                  style="background-color:#28a745">مشاهدة كل المتبرعين</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!--/.card -->
          
          <!-- /.row -->
              </section>
              <!-- /.card -->   
            </div>         
<!-- ---------------------------------------------------------------------------------------------------- -->
<!-- TABLE:  اخر التبرعات -->
          <div class="card">
            <div class="card-header text-white" style="background-color: #28a745;">
              <i class="nav-icon ion ion-android-cart"></i>
              <span>اخر التبرعات</span>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0" >
                  <thead style="color: #046306;">
                  <tr>
                    <th>رقم التبرع</th>
                    <th>فئة التبرع</th>
                    <th>الحالة</th>
                    <th>الزمن</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#" style="color: #046306;">OR9842</a></td>
                    <td>أثاث</td>
                    <td><span class="badge badge-success">مقبول</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">منذ اسبوع</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #046306;">OR1848</a></td>
                    <td>أجهزة كهربائية</td>
                    <td><span class="badge badge-warning">قيد الانتظار</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">منذ يومين</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #046306;">OR7429</a></td>
                    <td>أجهزة كهربائية</td>
                    <td><span class="badge badge-danger">مرفوض</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #046306;">OR7429</a></td>
                    <td>Sملابس</td>
                    <td><span class="badge badge-info">تتم المعالجة</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #046306;">OR1848</a></td>
                    <td>أثاث</td>
                    <td><span class="badge badge-warning">قيد الانتظار</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">منذ اسبوع</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #046306;">OR7429</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-danger">مرفوض</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #046306;">OR9842</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-success">مقبول</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="donations.html" class="btn btn-sm float-right text-white"
              style="background-color: #28a745">مشاهدة كل التبرعات</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
<!-- ./wrapper -->
@stop
