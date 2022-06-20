@extends('dashboard.layout.main')
@section('MainContent')
   <!-- Main content -->
   <section class="content">

    <!-- Table:المستخدمين -->
    <div class="card">
      <div class="card-header text-white bg-basic-light-color">
          <h6> صلاحيات المستخدمين </h6>
      </div>
      <div class="card-body px-5">
        <div id="success_message"></div>
        @can('Create User')
            <a type="button" class="btn btn-success m-2" href="{{ URL('/dashboard/user/create') }}" id="createNewUser">إضافة مستخدم جديدة</a>
        @endcan
        {{-- {!! $dataTable->table([
            'id' => 'dataTable',
            'class'=> 'dataTable table-bordered table-striped projects basic-dark-color w-100'
            ]) !!} --}}
            <table id ="dataTable" class="table-bordered table-striped projects basic-dark-color w-100">
                <thead style="color: #19692b;" class="text-center">
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 15%">
                            الاسم 
                        </th>
                        <th style="width: 15%">
                            الصورة الشخصية 
                        </th>
                        <th style="width: 20%">
                            البريد الإلكتروني 
                        </th>
                        <th style="width: 10%">
                            دور المستخدم 
                        </th>
                        <th style="width: 10%">
                            اللجنة 
                        </th>
                        <th style="width: 10%">
                            المتبرع 
                        </th>
                        <th style="width: 19%">
                            الإجراءات
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            <a>
                                {{ $user->name }}
                            </a>
                        </td>
                        <td>
                            @isset($user->profile_photo_path)
                                <img class="card-img-bottom m-auto p-2 d-block radius-image-full w-50 rounded-circle" src="{{ asset('app/'.$user->profile_photo_path) }}" alt="صورة المستخدم">  
                            @endisset
                        </td>
                        <td>
                            <a>
                                {{ $user->email }}
                            </a>
                        </td>
                        <td>
                            <a style="color: #23903c;">{{ $user->UserLevels->name }}</a>
                        </td>
                        <td>
                            @if (isset($user->Committees->name))
                                {{ $user->Committees->name }}
                            @else
                                لا يوجد
                            @endif
                            
                        </td>
                        <td>
                            @if (isset($user->Donors->name))
                                {{ $user->Donors->name }}
                            @else
                                لا يوجد
                            @endif
                            
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-center">
                                @if(Auth::user()->id !== $user->id)
                                    @can('Edit User')
                                        <a href="{{ URL('/dashboard/user/edit/'. $user->id ) }}" type="button" data-value="{{ $user->id }}" class="btn btn-primary btn-sm text-white m-2">
                                            <i class="fas fa-edit"></i>  تعديل
                                        </a>
                                    @endcan
                                    @if($user->deleted_at == null)
                                        @can('Disable User')
                                            <a href="javascript:void(0)" type="button" data-value="{{ $user->id }}" class="deletebutton btn btn-danger btn-sm text-white m-2">
                                                <i class="fas fa-trash"></i>  حذف
                                            </a>
                                        @endcan
                                    @else
                                        @can('Activate User')
                                            <a href="javascript:void(0)" type="button" data-value="{{ $user->id }}" class="restorebutton btn btn-warning btn-sm text-white m-2">
                                                <i class="fa-solid fa-trash-undo"></i>  استرجاع
                                            </a>
                                        @endcan
                                    @endif
                                @else
                                <a href="{{ URL('/dashboard/profile/edit/'. Auth::user()->id ) }}" type="button" data-value="{{ Auth::user()->id }}" class="btn btn-primary btn-sm text-white m-2">
                                    <i class="fas fa-edit"></i>  تعديل البيانات
                                </a>
                                @endif
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
                var url = "{{url('/dashboard/user/destroy')}}";
                console.log(id);
                Deletebutton(url, id);
            });
            $('body').on('click', '.restorebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/user/restore')}}";
                console.log(id);
                Restorebutton(url, id);
            });

            
        });
    </script>
    
  @endpush

@stop