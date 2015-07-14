@layout('admin')
@section('content1')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Course Types</h3> <button type="button" class="btn btn-primary" onclick="location.href='/add_type'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button>
    <p>
  
    <table class="table table-hover">
    <thead>
	<tr class="warning">
		<td>Id</td>
		<td>Type</td>
		<td>Created at</td>
		<td>Updated at</td>
		<td>Action</td>
	</tr>
    </thead>
    <tbody>
    <?php
    	$types = Types::all();
    	foreach($types as $t){
    		?>
    		
    			<tr>
    			<td><?php echo $t->id;?></td>
    			<td><?php echo $t->type;?></td>
    			<td><?php echo $t->created_at;?></td>
    			<td><?php echo $t->updated_at;?></td>
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