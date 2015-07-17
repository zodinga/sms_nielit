@layout('admin')
@section('content1')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Course Types</h3> <button type="button" class="btn btn-primary" onclick="location.href='/types/add'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button>
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

    	foreach($types as $t){
    		?>
    		
    			<tr>
    			<td><?php echo $t->id;?></td>
    			<td><?php echo $t->type;?></td>
    			<td><?php echo $t->created_at;?></td>
    			<td><?php echo $t->updated_at;?></td>
    			<td>

                     <!-- Modal -->
              <div class="modal fade" id="myModal<?php echo $t->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Types</h4>
                    </div>
                    <div class="modal-body">
                      
                        <form class="form-horizontal" action="types/update/" method="POST">
                          <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-5">
                              <input type="text" name="type" value="<?php echo $tt->type; ?>" class="form-control" id="type" placeholder="Type" required>
                            </div>
                          </div>

                          <input type="hidden" value=<?php echo $t->id?> name="id"></input>

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                              <button type="submit" class="btn btn-success">Save</button>
                              <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                          </div>
                        </form>
                      <?php
                      ?>
                    </div
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;Close</button>
                    </div>
                  </div>
                </div>
              </div>
    <!-- Modal -->
<a href="#myModal<?php echo $t->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Edit
              </a>
    				<button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
    				<button type="" onclick="location.href='#myModal'" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
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