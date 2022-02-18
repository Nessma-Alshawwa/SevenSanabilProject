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

            <div class="form-group" id="add">
              <label for="name" class="col-form-label" id="lable_name"></label>
              <br>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group" id="type">
              
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
