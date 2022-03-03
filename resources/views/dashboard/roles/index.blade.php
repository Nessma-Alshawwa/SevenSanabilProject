@extends('dashboard.layout.main')
@section('MainContent')

  <!-- body -->
   <!-- Main content -->
   <section class="content">

            @include('dashboard.includes.Button')
    <!-- Default box -->
    <div class="card">
        <div class="card-header text-white" style="background-color: #28a745;">
            <h6> دور المستخدمين</h6>
        </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead style="color: #19692b;">
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        اسم الرول
                    </th>
                    <th style="width: 20%">
                        اسم اليوزر ليفل
                    </th>
                    <th style="width: 20%">
                        اي دي
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>
                            {{$role->id}}
                        </td>
                        <td>
                            {{$role->name}}
                        </td>
                     <td class="project-actions text-left">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            فحص
                        </a>
                        <a class="btn btn-info btn-sm" href="{{URL('/dashboard/roles/edit/'. $role->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                        </a>
                        <a href="{{URL('/dashboard/roles/destroy/' . $role->id) }}" type="button"  class="mx-1 btn btn-danger" >
                        <i class="fa fa-trash"></i></a>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>    

<!-- ./wrapper -->

@stop