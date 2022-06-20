@extends('dashboard.layout.main')
@section('MainContent')
   <!-- Main content -->
   <section class="content">

    <!-- Table:التصنيفات -->
    <div class="card">
      <div class="card-header text-white bg-basic-light-color">
          <h6> التصنيفات </h6>
      </div>
      <div class="card-body px-5">
      @foreach($errors->all() as $message)
            <div class="alert alert-danger m-3">{{$message}}</div>
        @endforeach
        @if (session()->has('add_status'))
            @if (session('add_status'))
                <div class="alert alert-success m-3">تم التعديل بنجاح</div>
            @else
                <div class="alert alert-danger m-3">فشل تعديل التصنيف</div>
            @endif
        @endif
        <div id="success_message"></div>
        @can('Create Category')
            <a type="button" class="btn btn-success m-2" href="{{ URL('/dashboard/category/create') }}" id="createNewUser">إضافة تصنيف جديدة</a>
        @endcan
        {{-- {!! $dataTable->table([
            'id' => 'dataTable',
            'class'=> 'dataTable table-bordered table-striped projects basic-dark-color w-100'
            ]) !!} --}}
            <table id ="dataTable" class="table-bordered table-striped projects basic-dark-color w-100">
                <thead style="color: #19692b;" class="text-center">
                    <tr>
                        <th style="width: 4%">
                            #
                        </th>
                        <th style="width: 15%">
                            الاسم 
                        </th>
                        <th style="width: 20%">
                            الصورة 
                        </th>
                        <th style="width: 20%">
                            الإجراءات
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            <a>
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>
                            <a>
                                <img src="{{ asset('app/'. $category->image) }}" class="w-50 p-3" alt="category Image">
                                
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-center">
                                    @can('Edit Category')
                                        <a href="{{ URL('/dashboard/category/edit/'. $category->id ) }}" type="button" data-value="{{ $category->id }}" class="btn btn-primary btn-sm text-white m-2">
                                            <i class="fas fa-edit"></i>  تعديل
                                        </a>
                                    @endcan
                                    @if($category->deleted_at == null)
                                        @can('Disable Category')
                                            <a href="javascript:void(0)" type="button" data-value="{{ $category->id }}" class="deletebutton btn btn-danger btn-sm text-white m-2">
                                                <i class="fas fa-trash"></i>  حذف
                                            </a>
                                        @endcan
                                    @else
                                        @can('Activate Category')
                                            <a href="javascript:void(0)" type="button" data-value="{{ $category->id }}" class="restorebutton btn btn-warning btn-sm text-white m-2">
                                                <i class="fa-solid fa-trash-undo"></i>  استرجاع
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
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  @push('js')
    <script>
        $(document).ready(function () {

            $('body').on('click', '.deletebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/category/destroy')}}";
                console.log(id);
                Deletebutton(url, id);
            });
            $('body').on('click', '.restorebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/category/restore')}}";
                console.log(id);
                Restorebutton(url, id);
            });

            
        });
    </script>
    
  @endpush

@stop