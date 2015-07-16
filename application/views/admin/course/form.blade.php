@layout('admin')
@section('content1')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Course Entry Form</h3>
    <p>
        <form class="form-horizontal" action="/types/save" method="POST">
          <div class="form-group">
            <label for="course" class="col-sm-2 control-label">Course</label>
            <div class="col-sm-5">
              <input type="text" name="course" class="form-control" id="course" placeholder="Course" required>
            </div>
          </div>

          <div class="form-group">
            <label for="full_form" class="col-sm-2 control-label">Full Form</label>
            <div class="col-sm-5">
              <input type="text" name="full_form" class="form-control" id="full_form" placeholder="Full form">
            </div>
          </div>

          <div class="form-group">
            <label for="type" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-5">
              <select class="form-control input-sm" name="type_id" required>
                <option selected="selected" value="">---Select Type---</option>
                <?php
                //$type = Types::where('id','=',2)->get();
                $type = Types::all();
                foreach ($type as $t) {
                 ?> 
                 <option value="<?php echo $t->id; ?>"><?php echo $t->type; ?></option>
                <?php  
                }
                ?>
                
              </select>
            </div>
          </div>
               
          <div class="form-group">
            <label for="semester" class="col-sm-2 control-label">Semester</label>
            <div class="col-sm-5">
              <input type="text" name="semester" class="form-control" id="semester" placeholder="Semester">
            </div>
          </div>

          <div class="form-group">
            <label for="duration" class="col-sm-2 control-label">Duration</label>
            <div class="col-sm-5">
              <input type="text" name="duration" class="form-control" id="duration" placeholder="Duration">
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