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
        <form id="FormModal" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id" value="">

            <div class="form-group">
              <label for="name" class="col-form-label" id="lable_name"></label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label" id="lable_email"></label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label" id="lable_password"></label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group" id="role">
              <label for="message-text" class="col-form-label text-muted"></label>
                <select class="form-control form-select" aria-label=".form-select-lg example" name="user_level_id">
                  <option value="" class="text-secondary">دور المستخدم</option>
                  @foreach ($levels as $level)
                    <option value="{{ $level->id  }}">
                          {{ $level->name }}</option>
                      @endforeach
                </select>
              
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="add-button">إضافة</button>
        <button type="button" class="btn btn-success" id="edit-button">تعديل</button>
        <button type="button" class="btn btn-secondary exit" data-dismiss="modal" id="close">الغاء</button>
      </div>
    </div>
  </div>
</div>
