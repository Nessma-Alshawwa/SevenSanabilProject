@extends('dashboard.layout.main')
@section('MainContent')
   <!-- Main content -->
   <section class="content">

    <!-- Table:الأدوار -->
    <div class="card">
      <div class="card-header text-white bg-basic-light-color">
          <h6> الأدوار </h6>
      </div>
      <div class="card-body px-5">
          
        @can('Create Role')
            <a type="button" class="btn btn-success m-2" href="{{ URL('/dashboard/role/create') }}" id="createNewRole">إضافة دور جديدة</a> 
        @endcan

        <table id ="dataTable" class="table-bordered table-striped projects basic-dark-color w-100">
            <thead style="color: #19692b;" class="text-center">
                <tr>
                    <th style="width: 4%">
                        #
                    </th>
                    <th style="width: 15%">
                        الاسم 
                    </th>
                    <th style="width: 13%">
                        المستوى 
                    </th>
                    <th style="width: 13%">
                        اللجنة 
                    </th>
                    <th style="width: 13%">
                        المتبرع 
                    </th>
                    <th style="width: 20%">
                        الإجراءات
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($roles as $role)
                <tr>
                    <td>
                        {{ $i++ }}
                    </td>
                    <td>
                        <a>
                            {{ $role->name }}
                        </a>
                    </td>
                    <td>
                        <a style="color: #23903c;">{{ $role->UserLevels->name }}</a>
                    </td>
                    <td>
                        @if (isset($role->Committees->name))
                            {{ $role->Committees->name }}
                        @else
                            لا يوجد
                        @endif
                        
                    </td>
                    <td>
                        @if (isset($role->Donors->name))
                            {{ $role->Donors->name }}
                        @else
                            لا يوجد
                        @endif
                        
                    </td>
                    <td class="project-actions text-right">
                        <div class="row justify-content-center">
                            @can('Disable Role')
                                <a href="javascript:void(0)" type="button" data-value="{{ $role->id }}" class="deletebutton btn btn-danger btn-sm text-white m-2">
                                    <i class="fas fa-trash"></i>  حذف
                                </a>
                            @endcan
                        </div>
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
  @push('js')
    <script>
        $(document).ready(function () {

            $('body').on('click', '.deletebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/role/destroy')}}";
                console.log(id);
                Deletebutton(url, id);
            });
        });
    </script>
  @endpush


@stop