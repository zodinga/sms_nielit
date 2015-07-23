@layout('home')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h4 class="page-header">Courses</h4> 
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