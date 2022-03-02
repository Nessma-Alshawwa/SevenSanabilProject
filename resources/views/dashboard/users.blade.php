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
                            البريد الإلكتروني 
                        </th>
                        <th style="width: 13%">
                            دور المستخدم 
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
                            @include('dashboard.includes.actionsButton')
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
    </div>
    @include('dashboard.includes.modal')
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  @push('js')
    {{-- {!! $dataTable->Scripts() !!} --}}
    <script>
        $(document).ready(function () {
        //     var table = $('#dataTable').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: "{{ URL('/dashboard/user/datatables') }}",
        //         columns: [
        //             {data: 'id', name: 'id'},
        //             {data: 'name', name: 'name'},
        //             {data: 'email', name: 'email'},
        //             {data: 'user_level_id', name: 'user_level_id'},
        //             {data: 'committee_id', name: 'committee_id'},
        //             {data: 'donor_id', name: 'donor_id'},
        //             {
        //                 data: 'action', 
        //                 name: 'action', 
        //                 orderable: true, 
        //                 searchable: true
        //             },
        //         ]
        //     });
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
                $("#id").val('');
                $("#user_level_id").val('');
                $('#committee').show();
                $('#donor').show();
                $('#FormModal').trigger("reset");
                $('#Modal #modalHeading').html("إضافة مستخدم جديدة");
                $("#FormModal #name").attr("placeholder", "اسم المستخدم");
                $("#FormModal #email").attr("placeholder", "البريد الالكتروني");
                $("#FormModal #password").attr("placeholder", "كلمة المرور");
                $('#Modal #add-button').show();
                $('#Modal #edit-button').hide();
                $('#Modal').modal('show');
            });


            $('#add-button').click(function (e) {
                e.preventDefault();
                // var data = {
                //     'name': $('#name').val(),
                //     'email': $('#email').val(),
                //     'password': $('#password').val(),
                //     'image': $('.image').val(),
                //     'user_level_id': $('#user_level_id').val(),
                //     'committee_id': $('#committee_id').val(),
                //     'donor_id': $('#donor_id').val(),
                // };
                var data = $('#FormModal');
                var formData = new FormData(data[0]);
                formData.append('image', $('.image').val());
                console.log(formData);
                
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
                        // $('#dataTable').dataTable().api().ajax.reload();
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


            $(document).on('click', '.edit', function () {
                var user_id = $(this).attr('data-value');

                $.get('{{ URL("/dashboard/user/edit", '')}}' + "/" + user_id, function (data) {
                    $('#FormModal').trigger("reset");
                    $('#Modal #modalHeading').html("تعديل المستخدم");
                    $('#Modal #edit-button').show();
                    $('#Modal #add-button').hide();
                    $("#id").val(user_id);
                    console.log(data);
                    $("#FormModal #lable_name").html("اسم المستخدم");
                    $("#FormModal #name").val(data.name);
                    $("#FormModal #lable_email").html("البريد الالكتروني");
                    $("#FormModal #email").val(data.email);
                    $("#FormModal #lable_password").html("كلمة المرور");
                    $("#FormModal #password").attr("placeholder", "كلمة المرور");
                    $("#FormModal #label_user_level").html("دور المستخدم");
                    $("#FormModal #user_level_id").val(data.user_level_id);
                    if (data.user_level_id == 1) {
                        $('#committee').hide();
                        $('#donor').hide();
                    }else if (data.user_level_id == 2){ 
                        $('#committee').show();
                        $('#donor').hide();
                        $("#FormModal #label_committee").html("تابع للجنة زكاة");
                        $("#committee_id").val(data.committee_id); 
                    }else if (data.user_level_id == 3){
                        $('#committee').show();
                        $("#FormModal #label_committee").html("تابع للجنة زكاة");
                        $("#committee_id").val(data.committee_id);
                        $('#donor').show();
                        $("#FormModal #label_donor").html("المتبرع");
                        $("#donor_id").val(data.donor_id);
                    }
                    $('#Modal').modal('show');
                    console.log('Edit');
                })
            });

            $('#edit-button').click(function (e) {
                e.preventDefault();
                var data = $('#FormModal');
                var formData = new FormData(data[0]);
                formData.append('image', $('.image').val());
                // console.log(data[0]);
                // var data = {
                //     'name': $('#name').val(),
                //     'email': $('#email').val(),
                //     'password': $('#password').val(),
                //     'image': $('.image').val(),
                //     'user_level_id': $('#user_level_id').val(),
                //     'committee_id': $('#committee_id').val(),
                //     'donor_id': $('#donor_id').val(),
                // };
                // console.log(data);
                $.ajax({
                    data: formData,
                    url: ('{{ url("/dashboard/user/update", '')}}' + "/" + data.id),
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
                        // $('#dataTable').dataTable().api().ajax.reload();
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