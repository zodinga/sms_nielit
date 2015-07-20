@layout('admin')
@section('content1')
<style>
li {
    display: inline-block;
    vertical-align: middle;
    list-style-position: inside;
    list-style-type: disc;
    margin-right: 1em;
    text-align: left;
    white-space: nowrap;
}
h3, p { display:inline }
</style>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">All Students</h3> 
    <button type="button" class="btn btn-primary" onclick="location.href='/students/add'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button>
    <?php 

    $students=DB::table('students')->paginate(8);
    
    //echo $students->previous().' '.$students->next();
    //$students=Students::get();
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
    	foreach($students->results as $s){
    		?>
    		
    			<tr>
    			<td><?php echo $s->id;?></td>
    			<td><?php echo $s->name;?></td>
    			<td><?php 
                $course=Courses::find($s->course);
                if($course)
                echo $course->course;?></td>
                <td><?php echo $s->batch;?></td>
                <td><?php echo $s->phone;?></td>
                <td>
                <?php 
                $status=Statuses::find($s->status);
                if($status)
                    if($status->status=="FIN"){
                        ?>
                        <button type="button" class="btn btn-success"><?php echo $status->status; ?></button>
                    <?php
                    } 
                    else if($status->status=="ON"){
                        ?>
                        <button type="button" class="btn btn-primary"><?php echo $status->status; ?></button>
                    <?php
                    }
                    else{
                        ?>
                        <button type="button" class="btn btn-danger"><?php echo $status->status; ?></button>
                    <?php 
                    } 
                ?>
                </td>
    			       <td><?php echo $s->photo;?></td>
    			<td>
                <!--Details Modal Start -->
                <?php include("./application/views/admin/student/details-modal.php"); ?>
                <!--Details Modal End -->

                <!--Edit Modal Start -->
                <?php include("./application/views/admin/student/edit-modal.php"); ?>
                <!--Edit Modal End -->

                    
                <a href="#myModal<?php echo $s->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Details
              </a>
              <a href="#myModalEdit<?php echo $s->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Edit
              </a>
              <a href="#myModalEdit<?php echo $s->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                Delete
              </a>
    			</td>    		
    		<?php

    	}
echo "dddd", $s->id;
    ?>
    </tbody>
    </table>
<?php echo $students->links(); ?>

    </p>
 </div>

 

  
@endsection