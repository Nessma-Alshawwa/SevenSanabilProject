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
        <table class="table table-striped projects">
            <thead style="color: #19692b;">
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        اسم المستفيد
                    </th>
                    <th style="width: 20%">
                        رقم الهوية
                    </th>
                    <th>
                        نسبة الاستفادة
                    </th>
                    <th style="width: 8%" class="text-center">
                        الحالة
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                            </div>
                        </div>
                        <small>
                            57% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-info">تم الطلب</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="47" aria-volumemin="0" aria-volumemax="100" style="width: 47%">
                            </div>
                        </div>
                        <small>
                            47% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">تم التسليم</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="77" aria-volumemin="0" aria-volumemax="100" style="width: 77%">
                            </div>
                        </div>
                        <small>
                            77% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-danger">مرفوض</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="60" aria-volumemin="0" aria-volumemax="100" style="width: 60%">
                            </div>
                        </div>
                        <small>
                            60% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-warning">مقبول</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="12" aria-volumemin="0" aria-volumemax="100" style="width: 12%">
                            </div>
                        </div>
                        <small>
                            12% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">Success</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="35" aria-volumemin="0" aria-volumemax="100" style="width: 35%">
                            </div>
                        </div>
                        <small>
                            35% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-info">تم الطلب</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="87" aria-volumemin="0" aria-volumemax="100" style="width: 87%">
                            </div>
                        </div>
                        <small>
                            87% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-info">تم الطلب</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="77" aria-volumemin="0" aria-volumemax="100" style="width: 77%">
                            </div>
                        </div>
                        <small>
                            77% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-info">تم الطلب</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <a>
                            مستفيد
                        </a>
                        <br/>
                        <small>
                            ٢٢٠٢/٢/١
                        </small>
                    </td>
                    <td>
                        <a href="#" style="color: #23903c;">123456789</a>
                    </td>
                    <td class="project_progress">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="77" aria-volumemin="0" aria-volumemax="100" style="width: 77%">
                            </div>
                        </div>
                        <small>
                            77% Complete
                        </small>
                    </td>
                    <td class="project-state">
                        <span class="badge badge-info">تم الطلب</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            حذف
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>    

<!-- ./wrapper -->
@stop