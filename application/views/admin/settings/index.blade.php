@layout('admin')
@section('content')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header"><i class="icon-wrench"></i> Settings</h3>
    <p>
        <form class="form-horizontal" action="/settings/update" method="POST">
        <?php foreach($settings as $s){ ?>
          <!-- <div class="form-group">
            <label for="type" class="col-sm-2 control-label">Enable Update from Guest</label>
            <div class="col-sm-5">
              <input type="text" name="type" class="form-control" id="type" value="<?php echo $s->editstudent; ?>" placeholder="Type" required>
            </div>
          </div> -->

          <div class="control-group">
            <label class="control-label">Enable Update from Guest</label>
            <div class="controls">
              <label class="radio inline">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="Y" <?php if($s->editstudent=="Y") echo " checked"; ?>>
                YES
              </label> 
              <label class="radio inline">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="N" <?php if($s->editstudent=="N") echo " checked"; ?>>
                NO
              </label> 
            </div>
          </div>

           <input type="hidden" value=<?php echo $s->id; ?> name="id"></input>

          <?php } ?>
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