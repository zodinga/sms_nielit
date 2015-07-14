@layout('admin')
@section('content1')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">All Students</h3> <button type="button" class="btn btn-primary" onclick="location.href='/add_student'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button>
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
		<td>Updated at</td>
		<td>Action</td>
	</tr>
    </thead>
    <tbody>
    <?php
    	$student = Studentformats::all();
    	foreach($student as $s){
    		?>
    		
    			<tr>
    			<td><?php echo $s->id;?></td>
    			<td><?php echo $s->name;?></td>
    			<td><?php echo $s->course;?></td>
                <td><?php echo $s->batch;?></td>
                <td><?php echo $s->phone;?></td>
                <td><?php echo $s->status;?></td>
    			<td><?php echo $s->photo;?></td>
    			<td><?php echo $s->updated_at;?></td>
    			<td>
                    <button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-list" aria-hidden="true"></span></button>
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