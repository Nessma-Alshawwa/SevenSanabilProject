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
                                            <a href="javascript:void(0)" type="button" data-value="{{ $donor->id }}" class="rejectbutton btn btn-danger btn-sm text-white m-2">
                                                <i class="fas fa-trash"></i>  رفض
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

            // $('body').on('click', '.deletebutton', function () {
            //     var id = $(this).attr('data-value');
            //     var url = "{{url('/dashboard/donor/destroy')}}";
            //     console.log(id);
            //     Deletebutton(url, id);
            // });
            // $('body').on('click', '.restorebutton', function () {
            //     var id = $(this).attr('data-value');
            //     var url = "{{url('/dashboard/donor/restore')}}";
            //     console.log(id);
            //     Restorebutton(url, id);
            // });
            
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