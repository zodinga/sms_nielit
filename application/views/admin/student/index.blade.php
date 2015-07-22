@layout('admin')
@section('content')


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h3 class="page-header">{{$heading}}</h3> 
<!-- <button type="button" class="btn btn-primary" onclick="location.href='/students/add'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button> -->
<?php 
?>
<p>

<table class="table table-hover">
<thead>
<tr class="warning">
<td>Id</td>
<td>Name</td>
<td>Course</td>
<td>Batch</td>
<td>Phone</td>
<td>Status</td>
<td>Photo</td>
<td>Action</td>
</tr>
</thead>
<tbody>

<?php
	foreach($students as $s){
		?>
		
	<tr>
			<td><?php echo $s->id;?>
      </td>
			<td><?php echo $s->name;?>
      </td>
			<td><?php 
            $course=Courses::find($s->course);
            if($course)
            echo $course->course;?>
      </td>
      <td><?php echo $s->batch;?>
      </td>
      <td><?php echo $s->phone;?>
      </td>
      <td>
          <?php
           $status=Statuses::find($s->status);
           if($status) {
          echo $status->status;  
          }
          
          ?>
      </td>
			<td><?php echo $s->photo;?>
      </td>
			<td>
            <!--Details Modal Start -->
            <?php include("./application/views/admin/student/details-modal.php"); ?>
            <!--Details Modal End -->

            <!--Edit Modal Start -->
            <?php include("./application/views/admin/student/edit-modal.php"); ?>
            <!--Edit Modal End -->

                
          <a href="/students/detail/<?php echo $s->id; ?>" role="button" class="icon-list-ol" data-toggle="modal" title="Display Details"> Details</a>
          &nbsp;
          <a href="/students/edit/<?php echo $s->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal" title="Edit Student"> Edit</a>

          <!-- Delete Modal -->
          <div class="modal fade" id="Delete<?php echo $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  Course Delete Confirmation
                </div>
                <div class="modal-body">
                    Are you sure to Delete... Mr {{$s->name}}?
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="location.href='/students/delete/<?php echo $s->id; ?>'" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Yes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;No</button>
                </div>
              </div>
            </div>
          </div>
          &nbsp;
          <a href="#Delete<?php echo $s->id; ?>"  role="button" class="icon-trash" data-toggle="modal" title="Delete Student"> Delete</a>
          <!-- End Delete Modal -->
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