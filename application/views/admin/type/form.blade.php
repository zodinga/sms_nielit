@layout('admin')
@section('content1')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Type Entry Form</h3>
    <p>
        <form class="form-horizontal" action="types/save" method="POST">
          <div class="form-group">
            <label for="type" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-5">
              <input type="text" name="type" class="form-control" id="type" placeholder="Type" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <button type="submit" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </form>
</p>
</div>
@endsection