<div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-white bg-success">
        <h5 class="modal-title" id="modalHeading"></h5>
        <button type="button" class="close exit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="addOrUpdate">
          <form id="FormModal" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" id="id" value="">

              <div class="form-group">
                <label for="name" class="col-form-label" id="lable_name"></label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label" id="lable_email"></label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="password" class="col-form-label" id="lable_password"></label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group form-input row">
                <div class="col-2 img"><img class="img-circle elevation-2" width='40' hight='50'></div>
                <input type="file" name="image" class="form-control col-10 image"/>
            </div>
              <div class="form-group" id="role">
                <label for="message-text" class="col-form-label" id="label_user_level"></label>
                  <select class="form-control custom-select" name="user_level_id">
                    <option value="" class="text-secondary">دور المستخدم</option>
                    @foreach ($levels as $level)
                      <option value="{{ $level->id }}" @isset($data) @if($level->id == $data->user_level_id) selected @endif @endisset>
                            {{ $level->name }}</option>
                        @endforeach
                  </select>
                
              </div>
              <div class="form-group" id="committee">
                <label for="message-text" class="col-form-label" id="label_committee"></label>
                  <select class="form-control custom-select" name="committee_id">
                    <option value="" class="text-secondary">تابع للجنة زكاة</option>
                    @foreach ($committees as $committee)
                      <option value="{{ $committee->id }}" @isset($data) @if($committee->id == $data->committee_id) selected @endif @endisset>
                            {{ $committee->name }}</option>
                        @endforeach
                  </select>
                
              </div>
              <div class="form-group" id="donor">
                <label for="message-text" class="col-form-label" id="label_donor"></label>
                  <select class="form-control custom-select" name="donor_id">
                    <option value="" class="text-secondary">المتبرع</option>
                    @foreach ($donors as $donor)
                      <option value="{{ $donor->id }}" @isset($data) @if($donor->id == $data->donor_id) selected @endif @endisset>
                            {{ $donor->name }}</option>
                        @endforeach
                  </select>
                
              </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="add-button">إضافة</button>
        <button type="button" class="btn btn-success" id="edit-button">تعديل</button>
        <button type="button" class="btn btn-secondary exit" data-dismiss="modal" id="close">الغاء</button>
      </div>
    </div>
  </div>
</div>

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
  });
</script>
