@layout('admin')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Users</h3> 
    <p>
    <table class="table table-hover">
    <thead>
    <tr class="warning">
        <td>Id</td>
        <td>UserName</td>
        <td>Type</td>
        <td>Updated at</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($users as $u){
            ?>
            
                <tr>
                <td><?php echo $u->id;?></td>
                <td><?php echo $u->username;?></td>
                <td><?php echo $u->type;?></td>
                <td><?php echo $u->updated_at;?></td>
                <td>
                <!-- Modal -->
          <div class="modal fade" id="myModal<?php echo $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">User Edit</h4>
                </div>
                <div class="modal-body">
                  
                    <form class="form-horizontal" action="/users/update" method="POST">
                      <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-5">
                          <input type="text" name="username" value="<?php echo $u->username; ?>" class="form-control" id="username" placeholder="Username" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-5">
                          <input type="text" name="type" value="<?php echo $u->type; ?>" class="form-control" id="type" placeholder="Type">
                        </div>
                      </div>
                    

                      <input type="hidden" value=<?php echo $u->id; ?> name="id"></input>

                      <div class="modal-footer">
                        <div class="col-sm-offset-2 col-sm-5">
                          <button type="submit" class="btn btn-success">Save</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                        </div>
                      </div>
                    </form>
                  <?php
                  ?>
                </div>
               
              </div>
            </div>
          </div>
          <a href="#myModal<?php echo $u->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal"> Edit</a>
          <!-- Modal -->
          <!-- Delete Modal -->
          <div class="modal fade" id="Delete<?php echo $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  User Delete Confirmation
                </div>
                <div class="modal-body">
                    Are you sure to Delete...
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="location.href='/users/delete/<?php echo $u->id; ?>'" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Yes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;No</button>
                </div>
              </div>
            </div>
          </div>
          <a href="#Delete<?php echo $u->id; ?>"  role="button" class="icon-trash" data-toggle="modal"> Delete</a>
              <!-- End Delete Modal -->
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