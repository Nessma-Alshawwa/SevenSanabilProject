@role('admin')
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
        <a type="button" class="btn btn-success m-2" href="javascript:void(0)" id="createNewPermission">إضافة صلاحية جديدة</a>
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
    
            $('body').on('click', '#createNewPermission', function () {
                console.log('إضافة مستخدم جديد');
                $('#FormModal').trigger("reset");
                $('#Modal #modalHeading').html("إضافة صلاحية جديدة");
                $('#Modal #save-button').html("حفظ");
                $('#Modal').modal('show');
            });
            
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('data-value');
                console.log(id);
                
                $.get('{{ url("/dashboard/user/edit", '')}}' + "/" + id, function (data) {
                    $('#modalHeading').html("تعديل بيانات المستخدم");
                    $('#save-button').html("تعديل");
                    $("#id").val(id);
                    $("#FormModal #name").val(data.name);
                    $("#FormModal #email").val(data.email);
                    
                    $('#Modal').modal('show');
                    console.log('تعديل بيانات المستخدم');
                })
            });

            $(".exit").click(function(e){
              e.preventDefault();
              $('#FormModal').trigger("reset");
              $('#Modal').modal('hide');
            })

            $('#save-button').click(function (e) {
                e.preventDefault();
                var data = $('#FormModal');
                var formData = new FormData(data[0]);
                $.ajax({
                    data: formData,
                    url: "{{ url('/dashboard/user/AddOrUpdate')}}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    responsive: true,
                    success: function (data) {
                        $('#FormModal').trigger("reset");
                        $('#Modal').modal('hide');
                        console.log(data);
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text('Success');
                        $('#dataTable').dataTable().api().ajax.reload();
                    },
                    error: function (response) {
                        var response = JSON.parse(response.responseText);
                        console.log(response);
                        var errorString = '<ul>';
                        $.each( response.errors, function( key, value) {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul>';
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $('#save_msgList').html(errorString);
                    }
                });
            });


            $('body').on('click', '.deletebutton', function () {
                var id = $(this).attr('data-value');
                var url = "{{url('/dashboard/user/destroy')}}";
                console.log(id);
                Deletebutton(url, id);
            });
    
        });
    </script>
    
  @endpush

@stop

@endrole