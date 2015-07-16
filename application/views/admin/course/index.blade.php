@layout('admin')
@section('content1')

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
    				<button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
    				<button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
    			</td>
    			</tr>
    		
    		<?php
    	}

    ?>
    </tbody>
    </table>

    </p>
 </div>
@endsection