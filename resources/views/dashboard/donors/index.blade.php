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
      @foreach($errors->all() as $message)
            <div class="alert alert-danger m-3">{{$message}}</div>
        @endforeach
        @if (session()->has('add_status'))
            @if (session('add_status'))
                <div class="alert alert-success m-3">تم التعديل بنجاح</div>
            @else
                <div class="alert alert-danger m-3">فشل تعديل بيانات المتبرع</div>
            @endif
        @endif
        
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
                                {{ config('constance.status.' . $donor->status) }}
                            </td>
                        <td class="project-actions text-right">
                            <div class="row justify-content-center">
                                    @if($donor->status == 2 )
                                        @can('Approve Donor')
                                            <a href="javascript:void(0)" type="button" data-value="{{ $donor->id }}" class="approvebutton btn btn-info btn-sm text-white m-2">
                                                <i class="fas fa-check"></i>  موافقة
                                            </a>
                                        @endcan
                                        @else
                                        @can('Edit Donor')
                                            <a href="{{ URL('/dashboard/donor/edit/'. $donor->id ) }}" type="button" data-value="{{ $donor->id }}" class="btn btn-primary btn-sm text-white m-2">
                                                <i class="fas fa-edit"></i>  تعديل
                                            </a>
                                        @endcan
                                    @endif
                                        @can('Reject Donor')
                                            @if($donor->status != 0)
                                            <a href="javascript:void(0)" type="button" data-value="{{ $donor->id }}" class="rejectbutton btn btn-danger btn-sm text-white m-2">
                                                <i class="fas fa-trash"></i>  رفض
                                            </a>
                                            @endif
                                        @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
    </>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>

  @push('js')
    <script>
        $(document).ready(function () {
            $('body').on('click', '.approvebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/donor/approve')}}";
                console.log(id);
                Approvebutton(url, id);
            });

            $('body').on('click', '.rejectbutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/donor/reject')}}";
                console.log(id);
                Rejectbutton(url, id);
            });
            
        });
    </script>
    
  @endpush

@stop