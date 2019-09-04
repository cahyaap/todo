<div id="addTodo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add To Do List</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form id="add-form" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-12">
                  <label class="label">What to do?</label>
                  <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" required="required">
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="label">Description</label>
                  <div class="form-group">
                    <textarea name="description" id="description" required="required" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div style="padding-right: 0;padding-left: 0;" class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                <button type="submit" value="submit" class="btn btn-success waves-effect waves-light">Submit</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>