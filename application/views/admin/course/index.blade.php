@layout('admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Existing Courses</h3> <button type="button" class="btn btn-primary" onclick="location.href='/courses/add'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button>
    <p>
    <table class="table table-hover">
    <thead>
	<tr class="warning">
		<td>Id</td>
		<td>Course</td>
		<td>Full Form</td>
		<td>Type</td>
		<td>Semester</td>
		<td>Duration (Months)</td>
		<td>Updated at</td>
		<td>Action</td>
	</tr>
    </thead>
    <tbody>
    <?php
    	foreach($cours as $c){
    		?>
    		
    			<tr>
    			<td><?php echo $c->id;?></td>
    			<td><?php echo $c->course;?></td>
    			<td><?php echo $c->full_form;?></td>
    			<td><?php
    				$type = Types::find($c->type_id); 
    				echo $type->type;
    				?>
    			</td>
    			<td><?php echo $c->semester;?></td>
    			<td><?php echo $c->duration;?></td>
    			<td><?php echo $c->updated_at;?></td>
    			<td>
                <!-- Modal -->
          <div class="modal fade" id="myModal<?php echo $c->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Course Edit</h4>
                </div>
                <div class="modal-body">
                  
                    <form class="form-horizontal" action="/courses/update" method="POST">
                      <div class="form-group">
                        <label for="course" class="col-sm-2 control-label">Course</label>
                        <div class="col-sm-5">
                          <input type="text" name="course" value="<?php echo $c->course; ?>" class="form-control" id="course" placeholder="Course" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="full_form" class="col-sm-2 control-label">Full Form</label>
                        <div class="col-sm-5">
                          <input type="text" name="full_form" value="<?php echo $c->full_form; ?>" class="form-control" id="full_form" placeholder="Full form">
                        </div>
                      </div>
                    <?php 
                        $tt=Types::find($c->type_id);
                    ?>
                      <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-5">
                          <select class="form-control input-sm" name="type_id" required>
                            <option selected="selected" value="<?php echo $c->type_id; ?>">{{$tt->type}}</option>
                            <?php
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
                          <input type="text" name="semester" value="<?php echo $c->semester; ?>" class="form-control" id="semester" placeholder="Semester">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="duration" class="col-sm-2 control-label">Duration</label>
                        <div class="col-sm-5">
                          <input type="text" name="duration" value="<?php echo $c->duration; ?>" class="form-control" id="duration" placeholder="Duration">
                        </div>
                      </div>

                      <input type="hidden" value=<?php echo $c->id; ?> name="id"></input>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                          <button type="submit" class="btn btn-success">Save</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                      </div>
                    </form>
                  <?php
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;Close</button>
                </div>
              </div>
            </div>
          </div>
          <a href="#myModal<?php echo $c->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal"> Edit</a>
          <!-- Modal -->
          <!-- Delete Modal -->
          <div class="modal fade" id="Delete<?php echo $c->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  Course Delete Confirmation
                </div>
                <div class="modal-body">
                    Are you sure to Delete...
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="location.href='/courses/delete/<?php echo $c->id; ?>'" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Yes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;No</button>
                </div>
              </div>
            </div>
          </div>
          <a href="#Delete<?php echo $c->id; ?>"  role="button" class="icon-trash" data-toggle="modal"> Delete</a>
              <!-- End Delete Modal -->
                <!-- <span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
                <!-- Edit  -->
              &nbsp;&nbsp;
              <!-- <form class="form-horizontal" action="/courses/delete" method="POST">
                        <input type="hidden" value=<?php echo $c->id;?> name="id"></input>

                                      <button type="submit" class="glyphicon glyphicon-trash">Delete</button>
                              
                </form> -->

                <!-- <span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
                <!-- Trash -->
    				<!-- <button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
    				<button type="" onclick="location.href="#myModal<?php echo $c->id; ?>"" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button> -->
    			</td>
    			</tr>
    		
    		<?php
    	}

    ?>
    </tbody>
    </table>
    <?php echo $links; ?>
    </p>
 </div>
@endsection