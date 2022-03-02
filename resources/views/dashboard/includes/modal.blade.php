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
