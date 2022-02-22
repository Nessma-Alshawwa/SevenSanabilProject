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
        <a type="button" class="btn btn-success m-2" href="javascript:void(0)" id="createNewUser">إضافة مستخدم جديدة</a>
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
            $(".exit").click(function(e){
              e.preventDefault();
              $('#FormModal').trigger("reset");
              $('#Modal').modal('hide');
            });
    
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $('body').on('click', '#createNewUser', function () {
                $('#FormModal').trigger("reset");
                $('#Modal #modalHeading').html("إضافة مستخدم جديدة");
                $("#FormModal #name").attr("placeholder", "اسم المستخدم");
                $("#FormModal #email").attr("placeholder", "البريد الالكتروني");
                $("#FormModal #password").attr("placeholder", "كلمة المرور");
                $('#Modal #edit-button').hide();
                $('#Modal').modal('show');
            });

            $('#add-button').click(function (e) {
                e.preventDefault();
                var data = $('#FormModal');
                var formData = new FormData(data[0]);
                $.ajax({
                    data: formData,
                    url: "{{ url('/dashboard/createUser')}}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    responsive: true,
                    success: function (data) {
                        $('#FormModal').trigger("reset");
                        $('#Modal').modal('hide');
                        console.log(data);
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert border-success text-success');
                        $('#success_message').text('تم بنجاح');
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

            
        });
    </script>
    
  @endpush

@stop