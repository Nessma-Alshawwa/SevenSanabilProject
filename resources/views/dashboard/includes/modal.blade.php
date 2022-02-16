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
              <label for="recipient-name" class="col-form-label">الاسم الأول</label>
              <input type="text" class="form-control" id="recipient-name">
              <label for="recipient-name" class="col-form-label">الاسم الاخير</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">نوع الصلاحية</label>
              <select class="col form-select form-select-lg p-2"
                aria-label=".form-select-lg example">
                <option selected>اختر من القائمة</option>
                <option value="1">مشرف عام</option>
                <option value="2">أدمن</option>
                <option value="3">لجنة</option>
              </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">اضافة</button>
        <button type="button" class="btn btn-secondary exit" data-dismiss="modal" id="close">الغاء</button>
      </div>
    </div>
  </div>
</div>
