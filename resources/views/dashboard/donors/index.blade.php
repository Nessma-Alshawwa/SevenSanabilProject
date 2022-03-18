@extends('dashboard.layout.main')
@section('MainContent')
   <!-- Main content -->
   <section class="content">

    <!-- Table: المتبرعين-->
    <div class="card">
      <div class="card-header text-white bg-basic-light-color">
          <h6> حالة المتبرعين </h6>
      </div>
      <div class="card-body px-5">
        <div id="success_message"></div>
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
                            رقم الهوية 
                        </th>
                        <th style="width: 20%">
                            رقم الجوال 
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
                    @foreach($donors as $donor)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            <a>
                                {{ $donor->name }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $donor->national_id }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $donor->phone }}
                            </a>
                        </td>
                        <td>
                            {{ $donor->status }}
                        </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-center">
                                    <a href="{{ URL('/dashboard/donor/edit/'. $donor->id ) }}" type="button" data-value="{{ $donor->id }}" class="btn btn-primary btn-sm text-white m-2">
                                        <i class="fas fa-edit"></i>  تعديل
                                    </a>
                                    @if($donor->deleted_at == null)
                                        <a href="javascript:void(0)" type="button" data-value="{{ $donor->id }}" class="deletebutton btn btn-danger btn-sm text-white m-2">
                                            <i class="fas fa-trash"></i>  حذف
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" type="button" data-value="{{ $donor->id }}" class="restorebutton btn btn-warning btn-sm text-white m-2">
                                            <i class="fa-solid fa-trash-undo"></i>  استرجاع
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
                var url = "{{url('/dashboard/donor/destroy')}}";
                console.log(id);
                Deletebutton(url, id);
            });
            $('body').on('click', '.restorebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/donor/restore')}}";
                console.log(id);
                Restorebutton(url, id);
            });

            
        });
    </script>
    
  @endpush

@stop