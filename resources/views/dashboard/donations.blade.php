@extends('dashboard.layout.main')
@section('MainContent')



  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header text-white" style="background-color: #28a745;">
          <i class="nav-icon ion ion-android-cart"></i>
          <span>تبرعات جديدة</span>

        </div>
                <!-- <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div> -->
              <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead style="color: #19692b;">
                  <tr>
                    <th>نوع التبرع</th>
                    <th>المتبرع</th>
                    <th>الكمية</th>
                    <th>المزيد</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="{{ asset('dist/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                      ألة كهربائية
                      <span class="badge bg-danger">جديد</span>
                    </td>
                    <td>متبرع</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        ١٢%
                      </small>
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('dist/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                      ألة كهربائية
                      <span class="badge bg-danger">جديد</span>
                    </td>
                    <td>متبرع</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        ٠.٥%
                      </small>
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('dist/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                      ألة كهربائية
                      <span class="badge bg-danger">جديد</span>
                    </td>
                    <td>متبرع</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        ٣%
                      </small>
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('dist/img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                      ألة كهربائية
                      <span class="badge bg-danger">جديد</span>
                    </td>
                    <td>متبرع</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        ٦٧%
                      </small>
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->

  <!-- TABLE: donations-->
          <div class="card">
            <div class="card-header text-white" style="background-color: #28a745;">
              <i class="nav-icon ion ion-android-cart"></i>
              <span>اخر التبرعات</span>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0" >
                  <thead style="color: #19692b;">
                  <tr>
                    <th style="color: #046306;">رقم التبرع</th>
                    <th>فئة التبرع</th>
                    <th>الحالة</th>
                    <th>الزمن</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR9842</a></td>
                    <td>أثاث</td>
                    <td><span class="badge badge-success">مقبول</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">منذ اسبوع</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR1848</a></td>
                    <td>أجهزة كهربائية</td>
                    <td><span class="badge badge-warning">قيد الانتظار</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">منذ يومين</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR7429</a></td>
                    <td>أجهزة كهربائية</td>
                    <td><span class="badge badge-danger">مرفوض</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR7429</a></td>
                    <td>Sملابس</td>
                    <td><span class="badge badge-info">تتم المعالجة</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR1848</a></td>
                    <td>أثاث</td>
                    <td><span class="badge badge-warning">قيد الانتظار</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">منذ اسبوع</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR7429</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-danger">مرفوض</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR9842</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-success">مقبول</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR9842</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-success">مقبول</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR7429</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-danger">مرفوض</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR7429</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-danger">مرفوض</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR7429</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-danger">مرفوض</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR9842</a></td>
                    <td>ملابس</td>
                    <td><span class="badge badge-success">مقبول</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">منذ يوم</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#" style="color: #23903c;">OR9842</a></td>
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
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
</div>
</div>
@stop