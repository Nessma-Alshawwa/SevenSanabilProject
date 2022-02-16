@role('admin')
@extends('dashboard.layout.main')
@section('MainContent')
   <!-- Main content -->
   <section class="content">

    <!-- Table:المستخدمين -->
    <div class="card">
      <div class="card-header text-white bg-basic-light-color">
          <h6> بيانات المستخدمين </h6>
      </div>
      <div class="card-body px-5">
        <a type="button" class="btn btn-basic m-2" href="javascript:void(0)" id="createNewUser">إضافة مستخدم جديد</a>
        {!! $dataTable->table([
            'id' => 'dataTable',
            'class'=> 'dataTable table-bordered table-striped projects basic-dark-color w-100'
            ]) !!}
    </div>
    @include('dashboard.includes.modal')
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  @push('js')
    {!! $dataTable->Scripts() !!}
    <script>
        $(document).ready(function () {
    
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $('body').on('click', '#createNewUser', function () {
                console.log('إضافة مستخدم جديد');
                $('#FormModal').trigger("reset");
                $('#Modal #modalHeading').html("إضافة مستخدم جديد");
                $('#Modal #save-button').html("حفظ");
                $('#Modal').modal('show');
            });
            
            
    
        });
    </script>
    
  @endpush

@stop
@endrole
