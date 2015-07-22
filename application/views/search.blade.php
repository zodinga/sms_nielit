@layout('home')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h3 class="page-header">{{$heading}}</h3> 
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
    	foreach($students as $s)
      {
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
                
              <a href="/students/searchdetail/<?php echo $s->id; ?>" role="button" class="icon-list-ol" data-toggle="modal" title="Display Details"> Details</a>
              &nbsp;
              <?php 
              if($editstudent=="Y"){
              ?>
                <a href="/students/searchedit/<?php echo $s->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal" title="Edit Student"> Edit</a>
              <?php
              }
              ?>
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