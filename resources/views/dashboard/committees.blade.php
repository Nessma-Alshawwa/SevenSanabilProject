@extends('dashboard.layout.main')
@section('MainContent')
<!-- --------------------------------------------------------------------------------------------------- -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0" style="color: #23903c;"> لجان الزكاة</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- TABLE: donations-->
    <div class="card">
      <div class="card-header text-white" style="background-color: #28a745;">
        <i class="nav-icon ion ion-android-document"></i>
        <span>لجان الزكاة</span>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0" >
            <thead style="color: #19692b;">
            <tr>
              <th>اسم اللجنة</th>
              <th>المدينة</th>
              <th>المنطقة</th>
              <th>الحالة</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
                <td>غزة</td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
                </td>
                <td><span class="badge badge-danger">قيد الانتظار</span></td>
              </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-warning">تم الاستلام</span></td>
            </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-success">تم التسليم</span></td>
            </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-danger">قيد الانتظار</span></td>
            </tr>
          <tr>
            <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
            <td>غزة</td>
            <td>
              <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
            </td>
            <td><span class="badge badge-warning">تم الاستلام</span></td>
          </tr>
          <tr>
            <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
            <td>غزة</td>
            <td>
              <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
            </td>
            <td><span class="badge badge-success">تم التسليم</span></td>
            </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-danger">قيد الانتظار</span></td>
            </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-danger">قيد الانتظار</span></td>
            </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-danger">قيد الانتظار</span></td>
            </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-danger">قيد الانتظار</span></td>
            </tr>
            <tr>
              <td><a href="#" style="color: #19692b;">لجنة تل الهوا</a></td>
              <td>غزة</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">تل الهوا</div>
              </td>
              <td><span class="badge badge-danger">قيد الانتظار</span></td>
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
    </div>
    </div>  
<!-- ./wrapper -->

@stop